<?php

namespace Granah\CartShop\Tests\CartShop\Cart\Application\Confirm;

use Granah\CartShop\Cart\Application\Confirm\ConfirmCartCommand;
use Granah\CartShop\Cart\Domain\CartId;
use Granah\CartShop\Tests\CartShop\Cart\Domain\CartIdMother;

final class ConfirmCartCommandMother
{
    public static function create(CartId $id = null): ConfirmCartCommand
    {
        return new ConfirmCartCommand(CartIdMother::create($id)->value());
    }
}