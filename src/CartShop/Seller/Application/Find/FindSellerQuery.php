<?php

namespace Granah\CartShop\Seller\Application\Find;

use Granah\Shared\Domain\Bus\Query\Query;

final class FindSellerQuery implements Query
{
    public function __construct(private string $id)
    {
    }

    public function id(): string
    {
        return $this->id;
    }
}