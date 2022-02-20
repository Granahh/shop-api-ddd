<?php

namespace Granah\CartShop\Product\Application\Create;

use Granah\CartShop\Product\Domain\ProductDescription;
use Granah\CartShop\Product\Domain\ProductId;
use Granah\CartShop\Product\Domain\ProductName;
use Granah\CartShop\Product\Domain\ProductPrice;
use Granah\CartShop\Shared\Domain\SellerId;
use Granah\Shared\Domain\Bus\Command\CommandHandler;

final class CreateProductCommandHandler implements CommandHandler
{

    public function __construct(private CreateProduct $creator)
    {
    }

    public function __invoke(CreateProductCommand $command)
    {
        $this->creator->__invoke(
            new ProductId($command->id()),
            new ProductName($command->name()),
            new ProductDescription($command->description()),
            new ProductPrice($command->price()),
            new SellerId($command->sellerId())
        );
    }
}