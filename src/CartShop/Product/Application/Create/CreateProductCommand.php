<?php

namespace Granah\CartShop\Product\Application\Create;

use Granah\Shared\Domain\Bus\Command\Command;

final class CreateProductCommand implements Command
{
    public function __construct(private string $id, private string $name, private string $description, private float $price, private string $sellerId)
    {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function name(): string
    {
        return $this->name;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function price(): float
    {
        return $this->price;
    }

    public function sellerId(): string
    {
        return $this->sellerId;
    }
}