<?php

namespace Granah\CartShop\Product\Domain;

use Granah\CartShop\Shared\Domain\ProductId;

interface ProductRepository
{
    public function save(Product $product): void;

    public function search(ProductId $productId): ?Product;

    public function delete(Product $product): void;

}