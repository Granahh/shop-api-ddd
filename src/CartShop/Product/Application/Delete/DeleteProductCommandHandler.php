<?php

namespace Granah\CartShop\Product\Application\Delete;

use Granah\CartShop\Product\Domain\ProductId;
use Granah\Shared\Domain\Bus\Command\CommandHandler;

final class DeleteProductCommandHandler implements CommandHandler
{

    public function __construct(private DeleteProduct $deleteProduct)
    {
    }

    public function __invoke(DeleteProductCommand $command): void
    {
        $productId = new ProductId($command->id());
        $this->deleteProduct->__invoke($productId);
    }
}