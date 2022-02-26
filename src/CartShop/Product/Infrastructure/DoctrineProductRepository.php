<?php

namespace Granah\CartShop\Product\Infrastructure;

use Granah\CartShop\Product\Domain\Product;
use Granah\CartShop\Product\Domain\ProductId;
use Granah\CartShop\Product\Domain\ProductRepository;
use Granah\Shared\Infrastructure\Persistence\DoctrineRepository;

final class DoctrineProductRepository extends DoctrineRepository implements ProductRepository
{
    public function save(Product $product): void
    {
        $this->persist($product);
    }

    public function delete(Product $product): void
    {
        $this->remove($product);
    }

    public function search(ProductId $productId): ?Product
    {
        return $this->repository(Product::class)->find($productId);
    }

}