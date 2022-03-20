<?php

namespace Granah\CartShop\Cart\Application\Delete;

use Granah\CartShop\Cart\Domain\CartId;
use Granah\CartShop\Cart\Domain\CartRepository;

final class DeleteCart
{

    public function __construct(private CartRepository $repository)
    {
    }

    public function __invoke(CartId $id): void
    {
      $this->repository->delete($id);
    }
}