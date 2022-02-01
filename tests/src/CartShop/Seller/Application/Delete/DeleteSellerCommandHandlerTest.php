<?php

namespace Granah\CartShop\Tests\CartShop\Seller\Application\Delete;

use Granah\CartShop\Seller\Application\Delete\DeleteSeller;
use Granah\CartShop\Seller\Application\Delete\DeleteSellerCommandHandler;
use Granah\CartShop\Seller\Domain\Seller;
use Granah\CartShop\Seller\Domain\SellerNotFound;
use Granah\CartShop\Shared\Domain\SellerId;

use Granah\CartShop\Tests\CartShop\Seller\Domain\SellerMother;
use Granah\CartShop\Tests\CartShop\Seller\SellerModuleUnitTestCase;

final class DeleteSellerCommandHandlerTest extends SellerModuleUnitTestCase
{
    private DeleteSellerCommandHandler|null $handler;
    protected function setUp(): void
    {
        $this->handler = new DeleteSellerCommandHandler(new DeleteSeller($this->repository()));
        parent::setUp();
    }

    /**
     * @test
     */
    public function it_should_delete_an_existing_seller(): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with(\Mockery::type(SellerId::class))
            ->andReturns(SellerMother::create())
            ->once();

        $this->repository()
            ->shouldReceive('delete')
            ->with(\Mockery::type(Seller::class))
            ->once();

        $command = DeleteSellerCommandMother::create();

        $this->dispatch($command,$this->handler);
    }

    /**
     * @test
     */
    public function it_should_fail_when_delete_non_existent_seller(): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with(\Mockery::type(SellerId::class))
            ->andReturns(null)
            ->once();

        $command = DeleteSellerCommandMother::create();

        $this->expectException(SellerNotFound::class);

        $this->dispatch($command,$this->handler);
    }
}