<?php

namespace Granah\CartShop\Cart\Application\Get;

use Granah\CartShop\Cart\Domain\CartId;
use Granah\Shared\Domain\Bus\Query\QueryHandler;
use Granah\Shared\Domain\Bus\Query\Response;

final class GetCartQueryHandler implements QueryHandler
{
    public function __construct(private GetCart $getCart)
    {
    }

    public function __invoke(GetCartQuery $query): Response
    {
        $cartProducts = $this->getCart->__invoke(new CartId($query->cartId()));
        if (empty($cartProducts->value())) {
            return new GetCartResponseEmpty();
        }
        return GetCartResponse::build($cartProducts);
    }
}