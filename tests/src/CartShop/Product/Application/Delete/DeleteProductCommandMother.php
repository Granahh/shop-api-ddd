<?php

namespace Granah\CartShop\Tests\CartShop\Product\Application\Delete;

use Granah\CartShop\Product\Application\Delete\DeleteProductCommand;
use Granah\CartShop\Tests\CartShop\Product\Domain\ProductIdMother;

final class DeleteProductCommandMother
{
    public static function create(string $id = null): DeleteProductCommand
    {
        return new DeleteProductCommand(
            $id ?? ProductIdMother::create()->value()
        );
    }

}