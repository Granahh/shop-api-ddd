<?php

namespace Granah\CartShop\Tests\CartShop\Cart\Domain;

use Granah\CartShop\Cart\Domain\CartConfirmed;
use Granah\CartShop\Cart\Domain\CartQuantity;
use Granah\CartShop\Tests\Shared\Domain\MotherCreator;

final class CartConfirmedMother
{
    public static function create(int $value = null): CartConfirmed
    {
        return new CartConfirmed($value ?? false);
    }

}