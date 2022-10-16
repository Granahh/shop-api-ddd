<?php

namespace Granah\CartShop\Cart\Domain;

interface CartRepository
{
    public function delete(CartId $id): void;

    public function save(Cart $cart): void;

    public function get(CartId $cartId): ProductsCart;

    public function deleteProductCart(Cart $cart): void;

    public function confirm(CartId $id);
}