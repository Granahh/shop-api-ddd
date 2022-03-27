<?php

namespace Granah\CartShop\Seller\Application\Find;

use Granah\CartShop\Seller\Domain\FindSeller;
use Granah\CartShop\Shared\Domain\SellerId;
use Granah\Shared\Domain\Bus\Query\QueryHandler;


final class FindSellerQueryHandler implements QueryHandler
{

    public function __construct(private FindSeller $find)
    {
    }

    public function __invoke(FindSellerQuery $query): FindSellerReponse
    {
        return FindSellerReponse::build($this->find->__invoke(new SellerId($query->id())));
    }

}