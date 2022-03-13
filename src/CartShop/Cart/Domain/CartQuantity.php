<?php

namespace Granah\CartShop\Cart\Domain;

final class CartQuantity
{
    public function __construct(private int $value)
    {
    }

    public function value(): int
    {
        return $this->value;
    }
}