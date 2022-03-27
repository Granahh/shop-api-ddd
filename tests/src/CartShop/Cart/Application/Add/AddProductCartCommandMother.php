<?php

namespace Granah\CartShop\Tests\CartShop\Cart\Application\Add;

use Granah\CartShop\Cart\Application\Add\AddProductCartCommand;
use Granah\CartShop\Tests\CartShop\Cart\Domain\CartIdMother;
use Granah\CartShop\Tests\CartShop\Cart\Domain\CartQuantityMother;
use Granah\CartShop\Tests\CartShop\Product\Domain\ProductIdMother;

final class AddProductCartCommandMother
{
    public static function create(
        string $id = null,
        string $productId = null,
        int $quantity = null
    ): AddProductCartCommand {
        return new AddProductCartCommand(
            CartIdMother::create($id)->value(),
            ProductIdMother::create($productId)->value(),
            CartQuantityMother::create($quantity)->value()
        );
    }
}