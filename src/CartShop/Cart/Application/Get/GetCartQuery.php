<?php

namespace Granah\CartShop\Cart\Application\Get;

use Granah\Shared\Domain\Bus\Query\Query;

final class GetCartQuery implements Query
{

    public function __construct(private string $cartId)
    {
    }

    public function cartId(): string
    {
        return $this->cartId;
    }
}