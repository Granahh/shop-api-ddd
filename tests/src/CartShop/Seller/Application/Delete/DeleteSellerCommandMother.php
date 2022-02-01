<?php

namespace Granah\CartShop\Tests\CartShop\Seller\Application\Delete;

use Granah\CartShop\Seller\Application\Delete\DeleteSellerCommand;
use Granah\CartShop\Tests\CartShop\Seller\Domain\SellerIdMother;

final class DeleteSellerCommandMother
{
    public static function create(?string $id = null): DeleteSellerCommand
    {
        return new DeleteSellerCommand($id ?? SellerIdMother::create());
    }
}