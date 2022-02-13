<?php

namespace Granah\CartShop\Product\Application\Create;

use Granah\CartShop\Product\Domain\Product;
use Granah\CartShop\Product\Domain\ProductDescription;
use Granah\CartShop\Product\Domain\ProductId;
use Granah\CartShop\Product\Domain\ProductName;
use Granah\CartShop\Product\Domain\ProductPrice;
use Granah\CartShop\Product\Domain\ProductRepository;
use Granah\CartShop\Shared\Domain\SellerId;

final class CreateProduct
{
    public function __construct(private ProductRepository $repository)
    {
    }

    public function __invoke(ProductId $id, ProductName $name, ProductDescription $description, ProductPrice $price, SellerId $sellerId)
    {
        $product = Product::create($id, $name, $description, $price, $sellerId);

        $this->repository->save($product);
    }
}