<?php
declare(strict_types=1);

namespace Granah\CartShop\Seller\Infrastructure\Doctrine;

use Granah\CartShop\Shared\Domain\SellerId;
use Granah\Shared\Infrastructure\Doctrine\Dbal\DoctrineCustomType;
use Granah\Shared\Infrastructure\Persistence\UuidType;

final class SellerIdType extends UuidType implements DoctrineCustomType
{

    protected function typeClassName(): string
    {
        return SellerId::class;
    }
}