<?php

namespace Granah\CartShop\Product\Domain;

final class ProductPrice
{

    public function __construct(private float $value)
    {
    }

    public function value(): float
    {
        return $this->value;
    }
}