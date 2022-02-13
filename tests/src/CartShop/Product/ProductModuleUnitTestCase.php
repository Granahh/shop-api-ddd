<?php

namespace Granah\CartShop\Tests\CartShop\Product;

use Granah\CartShop\Product\Domain\Product;
use Granah\CartShop\Product\Domain\ProductRepository;
use Granah\CartShop\Tests\Shared\Infrastructure\PhpUnit\UnitTestCase;
use Mockery;
use Mockery\MockInterface;


class ProductModuleUnitTestCase extends UnitTestCase
{
    private ProductRepository|MockInterface|null $repository;

    protected function shouldSave()
    {
        $this->repository()
            ->shouldReceive('save')
            ->with(\Mockery::type(Product::class))
            ->once();
    }

    protected function repository(): ProductRepository|MockInterface
    {
        return $this->repository = $this->repository ?? Mockery::mock(ProductRepository::class);
    }
}