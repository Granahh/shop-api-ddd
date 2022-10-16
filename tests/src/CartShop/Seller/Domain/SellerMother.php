<?php

namespace Granah\CartShop\Tests\CartShop\Seller\Domain;

use Granah\CartShop\Seller\Application\Create\CreateSellerCommand;
use Granah\CartShop\Seller\Domain\Seller;
use Granah\CartShop\Seller\Domain\SellerEmail;
use Granah\CartShop\Seller\Domain\SellerName;
use Granah\CartShop\Shared\Domain\SellerId;
use Granah\CartShop\Tests\CartShop\Shared\Domain\SellerIdMother;

final class SellerMother
{
    public static function fromRequest(CreateSellerCommand $request): Seller
    {
        return new Seller(
            SellerIdMother::create($request->id()),
            SellerNameMother::create($request->name()),
            SellerEmailMother::create($request->email())
        );
    }

    public static function create(?SellerId $id = null, ?SellerName $name = null, ?SellerEmail $email = null): Seller
    {
        return new Seller(
            $id ?? SellerIdMother::create(),
            $name ?? SellerNameMother::create(),
            $email ?? SellerEmailMother::create()
        );
    }
}