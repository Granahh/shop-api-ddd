<?php

namespace Granah\CartShop\Tests\CartShop\Cart;

use Granah\CartShop\Cart\Domain\Cart;
use Granah\CartShop\Cart\Domain\CartId;
use Granah\CartShop\Cart\Domain\CartRepository;
use Granah\CartShop\Cart\Domain\ProductsCart;
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

    protected function repository(): CartRepository|MockInterface
    {
        return $this->repository = $this->repository ?? Mockery::mock(CartRepository::class);
    }

    protected function shouldDelete()
    {
        $this->repository()
            ->shouldReceive('delete')
            ->with(\Mockery::type(CartId::class))
            ->once();
    }

    protected function shouldSearch(ProductsCart $productsCart)
    {
        $this->repository()
            ->shouldReceive('get')
            ->with(\Mockery::type(CartId::class))
            ->andReturn($productsCart)
            ->once();
    }

    protected function shouldConfirm()
    {
        $this->repository()
            ->shouldReceive('confirm')
            ->with(\Mockery::type(CartId::class))
            ->once();
    }
}