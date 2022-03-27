<?php

namespace Granah\CartShop\Cart\Application\Confirm;

use Granah\Shared\Domain\Bus\Command\Command;

final class ConfirmCartCommand implements Command
{
    public function __construct(private string $cartId)
    {
    }

    public function cartId(): string
    {
        return $this->cartId;
    }
}