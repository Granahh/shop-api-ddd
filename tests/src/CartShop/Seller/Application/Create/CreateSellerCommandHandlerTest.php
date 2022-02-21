<?php

namespace Granah\CartShop\Tests\CartShop\Seller\Application\Create;

use Granah\CartShop\Seller\Application\Create\CreateSeller;
use Granah\CartShop\Seller\Application\Create\CreateSellerCommandHandler;
use Granah\CartShop\Seller\Domain\SellerAlreadyExists;
use Granah\CartShop\Shared\Domain\SellerId;
use Granah\CartShop\Tests\CartShop\Seller\Domain\SellerMother;
use Granah\CartShop\Tests\CartShop\Seller\SellerModuleUnitTestCase;
use Granah\CartShop\Tests\CartShop\Shared\Domain\SellerIdMother;


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
        $this->shouldSearch(null);
        $this->shouldSave();
        $this->dispatch($command, $this->handler);
    }

    /**
     * @test
     */
    public function it_should_throw_an_exception_if_seller_already_exists(): void
    {
        $command = CreateSellerCommandMother::create();
        $this->shouldSearch(SellerMother::fromRequest($command));
        $this->shouldNotSave();
        $this->expectException(SellerAlreadyExists::class);
        $this->dispatch($command, $this->handler);
    }



}