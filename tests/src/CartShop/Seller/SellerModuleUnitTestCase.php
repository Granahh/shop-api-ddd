<?php

namespace Granah\CartShop\Tests\CartShop\Seller;

use Granah\CartShop\Seller\Domain\Seller;
use Granah\CartShop\Seller\Domain\SellerRepository;
use Granah\CartShop\Shared\Domain\SellerId;
use Granah\CartShop\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery\MockInterface;

abstract class SellerModuleUnitTestCase extends UnitTestCase
{
    private SellerRepository|MockInterface|null $repository;

    protected function shouldSave(): void
    {
        $this->repository()
            ->shouldReceive('save')
            ->with(\Mockery::type(Seller::class))
            ->once();
    }

    protected function repository(): SellerRepository|MockInterface
    {
        return $this->repository = $this->repository ?? $this->mock(SellerRepository::class);
    }

    protected function shouldSearch(?Seller $seller): void
    {
        $this->repository()
            ->shouldReceive('search')
            ->with(\Mockery::type(SellerId::class))
            ->andReturns($seller)
            ->once();
    }

    protected function shouldDelete(): void
    {
        $this->repository()
            ->shouldReceive('delete')
            ->with(\Mockery::type(Seller::class))
            ->once();
    }

    protected function shouldNotSave(): void
    {
        $this->repository()
            ->shouldNotReceive('save');
    }
}