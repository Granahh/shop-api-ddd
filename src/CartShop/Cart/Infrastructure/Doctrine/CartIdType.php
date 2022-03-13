<?php

namespace Granah\CartShop\Cart\Infrastructure\Doctrine;

use Granah\CartShop\Cart\Domain\CartId;

use Granah\Shared\Infrastructure\Doctrine\Dbal\DoctrineCustomType;
use Granah\Shared\Infrastructure\Persistence\UuidType;

final class CartIdType extends UuidType implements DoctrineCustomType
{

    protected function typeClassName(): string
    {
        return CartId::class;
    }
}