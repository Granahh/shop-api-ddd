<?php

namespace Granah\CartShop\Cart\Application\Get;

use Granah\CartShop\Cart\Domain\CartId;
use Granah\CartShop\Cart\Domain\CartRepository;
use Granah\CartShop\Cart\Domain\ProductsCart;

final class GetCart
{
    public function __construct(private CartRepository $repository)
    {
    }

    public function __invoke(CartId $cartId): ProductsCart
    {
        return $this->repository->get($cartId);
    }
}