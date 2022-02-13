<?php

namespace Granah\CartShop\Product\Domain;

use Granah\CartShop\Shared\Domain\SellerId;
use Granah\Shared\Domain\Aggregate\AggregateRoot;

final class Product extends AggregateRoot
{
    private function __construct(private ProductId $id, private ProductName $name, private ProductDescription $description, private ProductPrice $price, private SellerId $sellerId)
    {
    }

    public static function create(ProductId $id, ProductName $name, ProductDescription $description, ProductPrice $price, SellerId $sellerId): Product
    {
        return new self($id, $name, $description, $price, $sellerId);
    }

    public function id(): ProductId
    {
        return $this->id;
    }

    public function name(): ProductName
    {
        return $this->name;
    }

    public function description(): ProductDescription
    {
        return $this->description;
    }

    public function price(): ProductPrice
    {
        return $this->price;
    }

    public function sellerId(): SellerId
    {
        return $this->sellerId;
    }
}