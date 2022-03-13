<?php

namespace Granah\CartShop\Tests\CartShop\Cart\Domain;

use Granah\CartShop\Cart\Domain\Cart;
use Granah\CartShop\Cart\Domain\CartId;
use Granah\CartShop\Cart\Domain\CartQuantity;
use Granah\CartShop\Product\Domain\ProductId;
use Granah\CartShop\Tests\CartShop\Product\Domain\ProductIdMother;

final class CartMother
{
    public static function create(
        CartId $id = null,
        ProductId $productId = null,
        CartQuantity $quantity = null
    ): Cart {
        return Cart::create(
            $id ?? CartIdMother::create(),
            $productId ?? ProductIdMother::create(),
            $quantity ?? CartQuantityMother::create(),
        );
    }
}