<?php

namespace Granah\CartShop\Tests\CartShop\Cart\Application\Get;

use Granah\CartShop\Cart\Application\Get\GetCartQuery;
use Granah\CartShop\Cart\Domain\CartId;
use Granah\CartShop\Tests\CartShop\Cart\Domain\CartIdMother;

final class GetCartQueryMother
{
    public static function create(CartId $id = null): GetCartQuery
    {
        return new GetCartQuery(CartIdMother::create($id)->value());
    }
}