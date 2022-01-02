<?php

namespace Granah\CartShop\Seller\Domain;

use Granah\CartShop\Shared\Domain\SellerId;

interface SellerRepository
{
    public function save(Seller $seller): void;
    public function delete(Seller $seller): void;
    public function search(SellerId $id): ?Seller;
}