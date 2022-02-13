<?php

namespace Granah\CartShop\Tests\CartShop\Product\Application\Create;
use Granah\CartShop\Product\Application\Create\CreateProduct;
use Granah\CartShop\Product\Application\Create\CreateProductCommandHandler;
use Granah\CartShop\Tests\CartShop\Product\ProductModuleUnitTestCase;

final class CreateProductCommandHandlerTest extends ProductModuleUnitTestCase
{
    private CreateProductCommandHandler|null $handler;

    protected function setUp(): void
    {
        $this->handler = new CreateProductCommandHandler(new CreateProduct($this->repository()));
    }

    /**
     * @test
     */
    public function it_should_create_product(): void
    {
        $command = CreateProductCommandMother::create();
        $this->shouldSave();
        $this->dispatch($command, $this->handler);
    }
}