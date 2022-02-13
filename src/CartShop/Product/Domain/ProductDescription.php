<?php

namespace Granah\CartShop\Product\Domain;

class ProductDescription
{
    public function __construct(private string $value)
    {
    }

    public function value(): string
    {
        return $this->value;
    }

}