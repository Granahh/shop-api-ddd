<?php

namespace Granah\CartShop\Cart\Application\Delete;

use Granah\CartShop\Cart\Domain\CartId;
use Granah\Shared\Domain\Bus\Command\CommandHandler;

final class DeleteCartCommandHandler implements CommandHandler
{

    public function __construct(private DeleteCart $deleteCart)
    {
    }

    public function __invoke(DeleteCartCommand $command)
    {
        $this->deleteCart->__invoke(new CartId($command->id()));
    }
}