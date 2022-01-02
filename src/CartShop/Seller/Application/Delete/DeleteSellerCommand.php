<?php
declare(strict_types=1);

namespace Granah\CartShop\Seller\Application\Delete;

use Granah\Shared\Domain\Bus\Command\Command;

final class DeleteSellerCommand implements Command
{
    public function __construct(private string $id)
    {
    }

    public function id(): string
    {
        return $this->id;
    }


}