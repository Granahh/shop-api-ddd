<?php

namespace Granah\CartShop\Tests\CartShop\Product\Domain;

use Granah\CartShop\Product\Domain\ProductId;
use Granah\CartShop\Tests\Shared\Domain\UuidMother;

final class ProductIdMother
{

    public static function create($value = null): ProductId
    {
        return new ProductId($value ?? UuidMother::create());
    }
}