<?php

namespace Granah\CartShop\Tests\CartShop\Seller\Application\Find;
use Granah\CartShop\Seller\Application\Find\FindSellerQuery;
use Granah\CartShop\Shared\Domain\SellerId;
use Granah\CartShop\Tests\CartShop\Seller\Domain\SellerIdMother;

final class FindSellerQueryMother
{
    public static function create(
        ?SellerId $id = null
    ): FindSellerQuery{
        return new FindSellerQuery(
            $id ?? SellerIdMother::create()
        );
    }
}