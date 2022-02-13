<?php

namespace Granah\CartShop\Tests\CartShop\Product\Domain;

use Granah\CartShop\Product\Domain\ProductDescription;
use Granah\CartShop\Tests\Shared\Domain\MotherCreator;

final class ProductDescriptionMother
{
    public static function create($value = null): ProductDescription
    {
        return new ProductDescription($value ?? MotherCreator::random()->name);
    }
}