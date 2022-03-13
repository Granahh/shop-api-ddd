<?php

namespace Granah\CartShop\Tests\CartShop\Cart;

use Granah\CartShop\Cart\Domain\Cart;
use Granah\CartShop\Cart\Domain\CartId;
use Granah\CartShop\Cart\Domain\CartRepository;
use Granah\CartShop\Product\Domain\Product;
use Granah\CartShop\Product\Domain\ProductId;
use Granah\CartShop\Product\Domain\ProductRepository;
use Granah\CartShop\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery;
use Mockery\MockInterface;


class CartModuleUnitTestCase extends UnitTestCase
{
    private ProductRepository|MockInterface|null $repository;

    protected function shouldSave()
    {
        $this->repository()
            ->shouldReceive('save')
            ->with(\Mockery::type(Cart::class))
            ->once();
    }

    protected function shouldDelete()
    {
        $this->repository()
            ->shouldReceive('delete')
            ->with(\Mockery::type(Cart::class))
            ->once();
    }

    protected function shouldSearch(?Product $product)
    {
        $this->repository()
            ->shouldReceive('search')
            ->with(\Mockery::type(CartId::class))
            ->andReturn($product)
            ->once();
    }

    protected function repository(): CartRepository|MockInterface
    {
        return $this->repository = $this->repository ?? Mockery::mock(CartRepository::class);
    }
}