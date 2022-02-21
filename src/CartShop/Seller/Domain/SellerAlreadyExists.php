<?php

namespace Granah\CartShop\Seller\Domain;

use Granah\CartShop\Shared\Domain\SellerId;
use Granah\Shared\Domain\DomainError;

final class SellerAlreadyExists extends DomainError
{
    public function __construct(private SellerId $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'seller_already_exists';
    }

    protected function errorMessage(): string
    {
        return sprintf('The seller with id %s alredy exists', $this->id->value());
    }
}