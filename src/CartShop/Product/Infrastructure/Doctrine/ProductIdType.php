<?php

namespace Granah\CartShop\Product\Infrastructure\Doctrine;

use Granah\CartShop\Shared\Domain\ProductId;
use Granah\Shared\Infrastructure\Doctrine\Dbal\DoctrineCustomType;
use Granah\Shared\Infrastructure\Persistence\UuidType;

final class ProductIdType extends UuidType implements DoctrineCustomType
{

    protected function typeClassName(): string
    {
        return ProductId::class;
    }
}