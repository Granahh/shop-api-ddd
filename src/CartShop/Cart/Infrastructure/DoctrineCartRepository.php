<?php

namespace Granah\CartShop\Cart\Infrastructure;

use Granah\CartShop\Cart\Domain\Cart;
use Granah\CartShop\Cart\Domain\CartId;
use Granah\CartShop\Cart\Domain\CartRepository;
use Granah\CartShop\Product\Domain\ProductId;
use Granah\Shared\Infrastructure\Persistence\DoctrineRepository;

final class DoctrineCartRepository extends DoctrineRepository implements CartRepository
{

    public function save(Cart $cart): void
    {
        $sql = <<<SQL
            INSERT INTO cart (id, productId, qt, confirmed)
            VALUES (:id, :product_id, :quantity, :confirmed)
            ON DUPLICATE KEY UPDATE qt = :quantity 
SQL;
        $stmp = $this->getEntityManager()->getConnection()->prepare($sql);

        $stmp->executeStatement(
            [
                'id' => $cart->cartId()->value(),
                'product_id' => $cart->productId()->value(),
                'quantity' => $cart->quantity()->value(),
                'confirmed' => $cart->confirmed()->transformToInt(),
            ]
        );
    }

    public function delete(CartId $id): void
    {
        $cart = $this->getEntityManager()->getReference(Cart::class, $id);
        $this->remove($cart);
    }

    public function get(CartId $cartId): array
    {
        return $this->repository(Cart::class)->find($cartId);
    }


    public function deleteProductCart(Cart $cart): void
    {
        $sql = <<<SQL
            DELETE FROM cart WHERE id = :id AND productId = :product_id            
SQL;
        $stmp = $this->getEntityManager()->getConnection()->prepare($sql);

        $stmp->executeStatement(
            [
                'id' => $cart->cartId()->value(),
                'product_id' => $cart->productId()->value(),
            ]
        );
    }
}