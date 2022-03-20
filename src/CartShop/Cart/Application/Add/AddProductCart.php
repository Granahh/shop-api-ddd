<?php

namespace Granah\CartShop\Cart\Application\Add;

use Granah\CartShop\Cart\Domain\Cart;
use Granah\CartShop\Cart\Domain\CartConfirmed;
use Granah\CartShop\Cart\Domain\CartId;
use Granah\CartShop\Cart\Domain\CartQuantity;
use Granah\CartShop\Cart\Domain\CartRepository;
use Granah\CartShop\Product\Domain\ProductId;

final class AddProductCart
{
    public function __construct(private CartRepository $repository)
    {
    }

    public function __invoke(CartId $id, ProductId $productId, CartQuantity $quantity, CartConfirmed $confirmed): void
    {
        $cart = Cart::Create($id, $productId, $quantity, $confirmed);

        if ($cart->quantity()->value() <= 0) {
            $this->repository->deleteProductCart($cart);
            return;
        }
        $this->repository->save($cart);
    }

}