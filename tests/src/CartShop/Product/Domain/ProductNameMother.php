<?php

namespace Granah\CartShop\Tests\CartShop\Product\Domain;

use Granah\CartShop\Product\Domain\ProductName;
use Granah\CartShop\Tests\Shared\Domain\MotherCreator;

final class ProductNameMother
{
    public static function create($value = null): ProductName
    {
        return new ProductName($value ?? MotherCreator::random()->name);
    }
}