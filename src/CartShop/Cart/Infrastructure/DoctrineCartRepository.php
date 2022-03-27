<?php

namespace Granah\CartShop\Cart\Infrastructure;

use Granah\CartShop\Cart\Domain\Cart;
use Granah\CartShop\Cart\Domain\CartConfirmed;
use Granah\CartShop\Cart\Domain\CartId;
use Granah\CartShop\Cart\Domain\CartQuantity;
use Granah\CartShop\Cart\Domain\CartRepository;
use Granah\CartShop\Cart\Domain\ProductsCart;
use Granah\CartShop\Product\Domain\ProductId;
use Granah\Shared\Infrastructure\Persistence\DoctrineRepository;
use function Lambdish\Phunctional\map;


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
        $sql = <<<SQL
            DELETE FROM cart WHERE id = :id            
SQL;
        $stmp = $this->getEntityManager()->getConnection()->prepare($sql);

        $stmp->executeStatement(
            [
                'id' => $id->value()
            ]
        );
    }

    public function get(CartId $cartId): ProductsCart
    {

        $productsCart = new ProductsCart([]);
        $sql = <<<SQL
            SELECT id, productId, qt, confirmed FROM cart where id = :id          
SQL;
        $stmp = $this->getEntityManager()->getConnection()->prepare($sql);
        $stmp->bindValue('id', $cartId->value());
        $stmp->execute();
        $result = $stmp->fetchAllAssociative();

        if (!empty($result)) {
            map(
                function ($cart) use ($productsCart) {
                    $productsCart->add(
                        Cart::Create(
                            new CartId($cart['id']),
                            new ProductId($cart['productId']),
                            new CartQuantity($cart['qt']),
                            new CartConfirmed(false)
                        )
                    );
                },
                $result
            );
        }

        return $productsCart;
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