<?php

namespace Granah\CartShop\Tests\CartShop\Product\Domain;

use Granah\CartShop\Product\Domain\Product;
use Granah\CartShop\Product\Domain\ProductDescription;
use Granah\CartShop\Product\Domain\ProductName;
use Granah\CartShop\Product\Domain\ProductPrice;
use Granah\CartShop\Shared\Domain\ProductId;
use Granah\CartShop\Shared\Domain\SellerId;
use Granah\CartShop\Tests\CartShop\Shared\Domain\SellerIdMother;

final class ProductMother
{
    public static function create(
        ProductId          $id = null,
        ProductName        $name = null,
        ProductDescription $description = null,
        ProductPrice       $price = null,
        SellerId           $sellerId = null
    ): Product
    {
        return Product::create(
            $id ?? ProductIdMother::create(),
            $name ?? ProductNameMother::create(),
            $description ?? ProductDescriptionMother::create(),
            $price ?? ProductPriceMother::create(),
            $sellerId ?? SellerIdMother::create()
        );
    }
}