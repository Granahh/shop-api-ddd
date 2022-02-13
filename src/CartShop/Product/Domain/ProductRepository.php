<?php

namespace Granah\CartShop\Product\Domain;

interface ProductRepository
{
    public function save(Product $product): void;
}