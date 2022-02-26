<?php

namespace Granah\CartShop\Product\Domain;

interface ProductRepository
{
    public function save(Product $product): void;

    public function search(ProductId $productId): ?Product;

    public function delete(Product $product): void;

}