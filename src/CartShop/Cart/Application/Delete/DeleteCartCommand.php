<?php

namespace Granah\CartShop\Cart\Application\Delete;


use Granah\Shared\Domain\Bus\Command\Command;

final class DeleteCartCommand implements Command
{
    public function __construct(private string $id)
    {
    }

    public function id(): string
    {
        return $this->id;
    }
}