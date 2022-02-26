<?php

namespace Granah\CartShop\Tests\CartShop\Product\Application\Delete;


use Granah\CartShop\Product\Application\Delete\DeleteProduct;
use Granah\CartShop\Product\Application\Delete\DeleteProductCommandHandler;
use Granah\CartShop\Product\Domain\ProductId;
use Granah\CartShop\Tests\CartShop\Product\Domain\ProductMother;
use Granah\CartShop\Tests\CartShop\Product\ProductModuleUnitTestCase;

final class DeleteProductCommandHandlerTest extends ProductModuleUnitTestCase
{
    private DeleteProductCommandHandler|null $handler;

    protected function setUp(): void
    {
        $this->handler = new DeleteProductCommandHandler(new DeleteProduct($this->repository()));
    }

    /**
     * @test
     */
    public function it_should_delete_product(): void
    {
        $command = DeleteProductCommandMother::create();
        $product = ProductMother::create(new ProductId($command->id()));
        $this->shouldSearch($product);
        $this->shouldDelete();

        $this->dispatch($command, $this->handler);
    }
}