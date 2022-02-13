<?php

namespace Granah\CartShop\Seller\Application\Create;

use Granah\CartShop\Seller\Domain\SellerEmail;
use Granah\CartShop\Seller\Domain\SellerName;
use Granah\CartShop\Shared\Domain\SellerId;
use Granah\Shared\Domain\Bus\Command\CommandHandler;


final class CreateSellerCommandHandler implements CommandHandler
{
    public function __construct(private CreateSeller $creator)
    {
    }

    public function __invoke(CreateSellerCommand $command): void
    {
       $this->creator->__invoke(new SellerId($command->id()), new SellerName($command->name()), new SellerEmail($command->email()));
    }
}
