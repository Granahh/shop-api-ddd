<?php

namespace Granah\CartShop\Cart\Domain;

final class CartConfirmed
{
    public function __construct(private bool $value)
    {
    }

    public function value(): bool
    {
        return $this->value;
    }

    public function transformToInt(): int
    {
        return $this->value ? 1 : 0;
    }
}