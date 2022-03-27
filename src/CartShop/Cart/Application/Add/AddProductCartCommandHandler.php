<?php

namespace Granah\CartShop\Cart\Application\Add;

use Granah\CartShop\Cart\Domain\CartId;
use Granah\CartShop\Cart\Domain\CartQuantity;
use Granah\CartShop\Shared\Domain\ProductId;
use Granah\Shared\Domain\Bus\Command\CommandHandler;

final class AddProductCartCommandHandler implements CommandHandler
{

    public function __construct(private AddProductCart $addProductCart)
    {
    }

    public function __invoke(AddProductCartCommand $command): void
    {
        $this->addProductCart->__invoke(
            new CartId($command->id()),
            new ProductId($command->productId()),
            new CartQuantity($command->quantity())
        );
    }

}