<?php

namespace Granah\CartShop\Tests\CartShop\Seller\Domain;

use Granah\CartShop\Seller\Domain\SellerName;
use Granah\CartShop\Tests\Shared\Domain\MotherCreator;

final class SellerNameMother
{
    public static function create(?string $value = null): SellerName
    {
        return new SellerName($value ?? MotherCreator::random()->name);
    }
}