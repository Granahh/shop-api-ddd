<?php

namespace Granah\CartShop\Tests\CartShop\Seller\Domain;

use Granah\CartShop\Seller\Domain\SellerEmail;
use Granah\CartShop\Tests\Shared\Domain\MotherCreator;

class SellerEmailMother
{
    public static function create(?string $value = null): SellerEmail
    {
        return new SellerEmail($value ?? MotherCreator::random()->email);
    }
}