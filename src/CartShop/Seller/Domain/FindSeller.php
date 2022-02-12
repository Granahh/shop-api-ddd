<?php

namespace Granah\CartShop\Seller\Domain;
use Granah\CartShop\Shared\Domain\SellerId;

final class FindSeller
{
    public function __construct(private SellerRepository $repository)
    {
    }

    public function __invoke(SellerId $id): Seller
    {
        $seller = $this->repository->search($id);

        if ($seller === null) {
            throw new SellerNotFound($id);
        }

        return $seller;
    }
}