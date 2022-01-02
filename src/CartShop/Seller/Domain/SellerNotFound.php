<?php

namespace Granah\CartShop\Seller\Domain;

use Granah\CartShop\Shared\Domain\SellerId;
use Granah\Shared\Domain\DomainError;

class SellerNotFound extends DomainError
{

    public function __construct(private SellerId $id)
    {
        parent::__construct();
    }

    public function errorCode(): string
    {
        return 'seller_not_found';
    }

    protected function errorMessage(): string
    {
        return sprintf('The seller with id %s was not found', $this->id->value());
    }


}