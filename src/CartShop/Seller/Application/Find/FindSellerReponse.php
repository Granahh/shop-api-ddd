<?php

namespace Granah\CartShop\Seller\Application\Find;

use Granah\CartShop\Seller\Domain\Seller;
use Granah\Shared\Domain\Bus\Query\Response;

final class FindSellerReponse implements Response
{

    private function __construct(private string $id)
    {
    }

    public static function from(Seller $seller): self
    {
        return new self($seller->id()->value());
    }

    public function id(): string
    {
        return $this->id;
    }
}