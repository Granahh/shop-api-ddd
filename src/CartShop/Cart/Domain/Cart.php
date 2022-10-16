<?php

namespace Granah\CartShop\Cart\Domain;

use Granah\CartShop\Shared\Domain\ProductId;
use Granah\Shared\Domain\Aggregate\AggregateRoot;

class Cart extends AggregateRoot
{
    public function __construct(private CartId $cartId, private ProductId $productId, private CartQuantity $quantity, private CartConfirmed $confirmed)
    {
    }

    public static function Create(CartId $cartId, ProductId $productId, CartQuantity $quantity, CartConfirmed $confirmed): self
    {
        return new self($cartId, $productId, $quantity, $confirmed);
    }

    public function cartId(): CartId
    {
        return $this->cartId;
    }

    public function productId(): ProductId
    {
        return $this->productId;
    }

    public function quantity(): CartQuantity
    {
        return $this->quantity;
    }

    public function confirmed(): CartConfirmed
    {
        return $this->confirmed;
    }

}