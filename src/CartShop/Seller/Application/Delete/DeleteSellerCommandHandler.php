<?php
declare(strict_types=1);

namespace Granah\CartShop\Seller\Application\Delete;

use Granah\CartShop\Shared\Domain\SellerId;
use Granah\Shared\Domain\Bus\Command\CommandHandler;

final class DeleteSellerCommandHandler implements CommandHandler
{
    public function __construct(private DeleteSeller $delete)
    {
    }

    public function __invoke(DeleteSellerCommand $command): void
    {
        $id = new SellerId($command->id());
        $this->delete->__invoke($id);
    }

}