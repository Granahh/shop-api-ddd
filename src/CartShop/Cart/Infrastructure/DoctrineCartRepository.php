<?php

namespace Granah\CartShop\Cart\Infrastructure;

use Granah\CartShop\Cart\Domain\Cart;
use Granah\CartShop\Cart\Domain\CartRepository;
use Granah\Shared\Infrastructure\Persistence\DoctrineRepository;

final class DoctrineCartRepository extends DoctrineRepository implements CartRepository
{


    public function save(Cart $cart): void
    {
        $this->persist($cart);
    }
}