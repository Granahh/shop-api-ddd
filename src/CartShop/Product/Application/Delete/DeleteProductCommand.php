<?php

namespace Granah\CartShop\Product\Application\Delete;

use Granah\Shared\Domain\Bus\Command\Command;

final class DeleteProductCommand implements Command
{

    public function __construct(private string $id)
    {
    }

    public function id(): string
    {
        return $this->id;
    }
}