<?php

namespace Granah\CartShop\Tests\CartShop\Cart\Application\Confirm;

use Granah\CartShop\Cart\Application\Confirm\ConfirmCart;
use Granah\CartShop\Cart\Application\Confirm\ConfirmCartQueryHandler;
use Granah\CartShop\Tests\CartShop\Cart\CartModuleUnitTestCase;

final class ConfirmCartQueryHandlerTest extends CartModuleUnitTestCase
{
    private ConfirmCartQueryHandler|null $handler;

    protected function setUp(): void
    {
        parent::setUp();
        $this->handler = new ConfirmCartQueryHandler(new ConfirmCart($this->repository()));
    }

    /**
     * @test
     */
    public function it_should_confirm_cart()
    {
        $command = ConfirmCartCommandMother::create();
        $this->shouldConfirm();
        $this->dispatch($command,$this->handler);
    }

}