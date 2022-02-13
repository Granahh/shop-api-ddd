<?php

namespace Granah\CartShop\Tests\CartShop\Product\Domain;

use Granah\CartShop\Product\Domain\ProductPrice;
use Granah\CartShop\Tests\Shared\Domain\MotherCreator;

class ProductPriceMother
{
    public static function create(float $value = null): ProductPrice
    {
        return new ProductPrice($value ?? MotherCreator::random()->randomFloat(2, 0, 650));
    }
}