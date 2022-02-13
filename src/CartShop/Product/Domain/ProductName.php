<?php

namespace Granah\CartShop\Product\Domain;

final class ProductName
{
    public function __construct(private string $value)
    {
    }

    public function value(): string
    {
        return $this->value;
    }
}