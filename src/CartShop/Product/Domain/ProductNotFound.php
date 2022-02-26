<?php

namespace Granah\CartShop\Product\Domain;

use Granah\Shared\Domain\DomainError;

final class ProductNotFound extends DomainError
{

    public function __construct(private string $productId)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'product_not_found';
    }

    protected function errorMessage(): string
    {
        return sprintf('Product with id %s not found', $this->productId);
    }
}