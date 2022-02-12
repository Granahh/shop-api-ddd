<?php

namespace Granah\CartShop\Tests\CartShop\Seller\Application\Create;

use Granah\CartShop\Seller\Application\Create\CreateSeller;
use Granah\CartShop\Seller\Application\Create\CreateSellerCommandHandler;
use Granah\CartShop\Tests\CartShop\Seller\SellerModuleUnitTestCase;


final class CreateSellerCommandHandlerTest extends SellerModuleUnitTestCase
{
    private CreateSellerCommandHandler|null $handler;

    protected function setUp(): void
    {
        parent::setUp();
        $this->handler = new CreateSellerCommandHandler(new CreateSeller($this->repository()));
    }

    /**
     * @test
     */
    public function it_should_create_a_valid_seller(): void
    {
        $command = CreateSellerCommandMother::create();
        $this->shouldSave();
        $this->dispatch($command, $this->handler);
    }
}