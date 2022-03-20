<?php

namespace Granah\CartShop\Tests\CartShop\Cart\Application\Delete;

use Granah\CartShop\Cart\Application\Delete\DeleteCartCommand;
use Granah\CartShop\Tests\CartShop\Cart\Domain\CartIdMother;

final class DeleteCartCommandMother
{
    public static function create(string $id = null): DeleteCartCommand
    {
        return new DeleteCartCommand(CartIdMother::create($id)->value());
    }
}