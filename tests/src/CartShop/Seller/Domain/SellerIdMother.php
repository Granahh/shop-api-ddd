<?php

namespace Granah\CartShop\Tests\CartShop\Seller\Domain;

use Granah\CartShop\Shared\Domain\SellerId;
use Granah\CartShop\Tests\Shared\Domain\UuidMother;

class SellerIdMother
{
    public static function create(?string $value = null): SellerId
    {
        return new SellerId($value ?? UuidMother::create());
    }
}