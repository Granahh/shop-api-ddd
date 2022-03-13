<?php

namespace Granah\CartShop\Tests\CartShop\Cart\Domain;

use Granah\CartShop\Cart\Domain\CartQuantity;
use Granah\CartShop\Tests\Shared\Domain\MotherCreator;

final class CartQuantityMother
{
    public static function create(int $value = null): CartQuantity
    {
        return new CartQuantity($value ?? self::getNumberBetween());
    }

    private static function getNumberBetween(): int
    {
        return MotherCreator::random()->numberBetween(1, 10);
    }
}