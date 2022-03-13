<?php

namespace Granah\CartShop\Cart\Application\Add;

use Granah\Shared\Domain\Bus\Command\Command;

final class AddProductCartCommand implements Command
{

    public function __construct(private string $id, private string $productId, private int $quantity, private bool $confirmed)
    {
    }

    public function id(): string
    {
        return $this->id;
    }

    public function productId(): string
    {
        return $this->productId;
    }

    public function quantity(): int
    {
        return $this->quantity;
    }

    public function confirmed(): bool
    {
        return $this->confirmed;
    }

}