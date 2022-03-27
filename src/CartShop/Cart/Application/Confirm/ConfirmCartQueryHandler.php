<?php

namespace Granah\CartShop\Cart\Application\Confirm;

use Granah\CartShop\Cart\Domain\CartId;
use Granah\Shared\Domain\Bus\Command\CommandHandler;

final class ConfirmCartQueryHandler implements CommandHandler
{
    public function __construct(private ConfirmCart $confirmCart)
    {
    }

    public function __invoke(ConfirmCartCommand $command): void
    {
        $this->confirmCart->__invoke(new CartId($command->cartId()));
    }
}