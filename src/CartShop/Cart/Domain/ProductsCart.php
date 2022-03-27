<?php

namespace Granah\CartShop\Cart\Domain;

final class ProductsCart
{
    public function __construct(private array $value)
    {
    }

    public function value(): array
    {
        return $this->value;
    }

    public function add(Cart $cart): void
    {
        $this->value[] = $cart;
    }
}
