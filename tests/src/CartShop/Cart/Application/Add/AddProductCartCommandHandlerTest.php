<?php

namespace Granah\CartShop\Tests\CartShop\Cart\Application\Add;

use Granah\CartShop\Cart\Application\Add\AddProductCart;
use Granah\CartShop\Cart\Application\Add\AddProductCartCommandHandler;
use Granah\CartShop\Tests\CartShop\Cart\CartModuleUnitTestCase;

final class AddProductCartCommandHandlerTest extends CartModuleUnitTestCase
{
    private AddProductCartCommandHandler | null $handler;

    protected function setUp(): void
    {
        parent::setUp();
        $this->handler = new AddProductCartCommandHandler(new AddProductCart($this->repository()));
    }

    /**
     * @test
     */
    public function it_should_add_product_to_cart(): void
    {
        $command = AddProductCartCommandMother::create();
        $this->shouldSave();
        $this->dispatch($command, $this->handler);
    }

}