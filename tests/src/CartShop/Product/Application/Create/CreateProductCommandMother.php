<?php

namespace Granah\CartShop\Tests\CartShop\Product\Application\Create;

use Granah\CartShop\Product\Application\Create\CreateProductCommand;
use Granah\CartShop\Tests\CartShop\Product\Domain\ProductDescriptionMother;
use Granah\CartShop\Tests\CartShop\Product\Domain\ProductIdMother;
use Granah\CartShop\Tests\CartShop\Product\Domain\ProductNameMother;
use Granah\CartShop\Tests\CartShop\Product\Domain\ProductPriceMother;
use Granah\CartShop\Tests\CartShop\Shared\Domain\SellerIdMother;

final class CreateProductCommandMother {

    public static function create(): CreateProductCommand
    {
        return new CreateProductCommand(
            ProductIdMother::create()->value(),
            ProductNameMother::create()->value(),
            ProductDescriptionMother::create()->value(),
            ProductPriceMother::create()->value(),
            SellerIdMother::create()->value()
        );
    }
}
{

}