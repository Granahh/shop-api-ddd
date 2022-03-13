<?php

namespace Granah\CartShop\Tests\CartShop\Cart\Domain;

use Granah\CartShop\Cart\Domain\CartId;
use Granah\CartShop\Tests\Shared\Domain\UuidMother;

final class CartIdMother
{
    public static function create($value = null): CartId
    {
        return new CartId($value ?? UuidMother::create());
    }
}