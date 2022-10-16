<?php

namespace Granah\CartShop\Tests\CartShop\Cart\Application\Delete;

use Granah\CartShop\Cart\Application\Delete\DeleteCart;
use Granah\CartShop\Cart\Application\Delete\DeleteCartCommandHandler;
use Granah\CartShop\Tests\CartShop\Cart\CartModuleUnitTestCase;

final class DeleteCartCommandHandlerTest extends CartModuleUnitTestCase
{
    private DeleteCartCommandHandler|null $handler;

    /**
     * @test
     */
    public function it_should_delete_cart(): void
    {
        $command = DeleteCartCommandMother::create();
        $this->shouldDelete();
        $this->dispatch($command, $this->handler);
    }

    protected function setUp(): void
    {
        parent::setUp();

        $this->handler = new DeleteCartCommandHandler(new DeleteCart($this->repository()));
    }

}