<?php

namespace Granah\CartShop\Product\Application\Delete;

use Granah\CartShop\Product\Domain\ProductNotFound;
use Granah\CartShop\Product\Domain\ProductRepository;
use Granah\CartShop\Shared\Domain\ProductId;

final class DeleteProduct
{
    public function __construct(private ProductRepository $repository)
    {
    }

    public function __invoke(ProductId $id): void
    {
        $product = $this->repository->search($id);

        if ($product === null) {
            throw new ProductNotFound($id->value());
        }

        $this->repository->delete($product);
    }
}