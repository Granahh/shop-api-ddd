<?php

namespace Granah\CartShop\Cart\Application\Confirm;

use Granah\CartShop\Cart\Domain\CartId;
use Granah\CartShop\Cart\Domain\CartRepository;

final class ConfirmCart
{

    public function __construct(private CartRepository $repository)
    {
    }

    public function __invoke(CartId $id)
    {
        $this->repository->confirm($id);
    }
}