<?php

namespace Granah\CartShop\Tests\CartShop\Seller\Application\Delete;


use Granah\CartShop\Seller\Application\Delete\DeleteSeller;
use Granah\CartShop\Seller\Application\Delete\DeleteSellerCommandHandler;
use Granah\CartShop\Seller\Domain\FindSeller;
use Granah\CartShop\Seller\Domain\SellerNotFound;
use Granah\CartShop\Tests\CartShop\Seller\Domain\SellerMother;
use Granah\CartShop\Tests\CartShop\Seller\SellerModuleUnitTestCase;

final class DeleteSellerCommandHandlerTest extends SellerModuleUnitTestCase
{
    private DeleteSellerCommandHandler|null $handler;

    /**
     * @test
     */
    public function it_should_delete_an_existing_seller(): void
    {
        $this->shouldSearch(SellerMother::create());
        $this->shouldDelete();
        $command = DeleteSellerCommandMother::create();
        $this->dispatch($command, $this->handler);
    }

    /**
     * @test
     */
    public function it_should_fail_when_delete_non_existent_seller(): void
    {
        $this->shouldSearch(null);
        $command = DeleteSellerCommandMother::create();
        $this->expectException(SellerNotFound::class);
        $this->dispatch($command, $this->handler);
    }

    protected function setUp(): void
    {

        $this->handler = new DeleteSellerCommandHandler(new DeleteSeller($this->repository(), new FindSeller($this->repository())));
        parent::setUp();
    }
}