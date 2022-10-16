<?php

namespace Granah\CartShop\Cart\Application\Get;

use Granah\Shared\Domain\Bus\Query\Response;


final class GetCartResponseEmpty implements Response
{
    public function toArray(): array
    {
        return [];
    }
}