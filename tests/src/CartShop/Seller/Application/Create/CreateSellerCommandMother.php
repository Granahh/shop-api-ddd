<?php

namespace Granah\CartShop\Tests\CartShop\Seller\Application\Create;
use Granah\CartShop\Seller\Application\Create\CreateSellerCommand;
use Granah\CartShop\Seller\Domain\SellerEmail;
use Granah\CartShop\Seller\Domain\SellerName;
use Granah\CartShop\Shared\Domain\SellerId;
use Granah\CartShop\Tests\CartShop\Seller\Domain\SellerEmailMother;
use Granah\CartShop\Tests\CartShop\Seller\Domain\SellerIdMother;
use Granah\CartShop\Tests\CartShop\Seller\Domain\SellerNameMother;


final class CreateSellerCommandMother
{
    public static function create(
        ?SellerId $id = null,
        ?SellerName $name = null,
        ?SellerEmail $email = null
    ): CreateSellerCommand {
        return new CreateSellerCommand(
            $id ?? SellerIdMother::create(),
            $name ?? SellerNameMother::create()->value(),
            $email ?? SellerEmailMother::create()->value()
        );
    }
}