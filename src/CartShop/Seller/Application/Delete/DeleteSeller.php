<?php
declare(strict_types=1);
namespace Granah\CartShop\Seller\Application\Delete;

use Granah\CartShop\Seller\Domain\SellerNotFound;
use Granah\CartShop\Seller\Domain\SellerRepository;
use Granah\CartShop\Shared\Domain\SellerId;

final class DeleteSeller
{
    public function __construct(private SellerRepository $repository)
    {
    }

    public function __invoke(SellerId $id): void
    {
        $seller = $this->repository->search($id);

        if ($seller === null) {
            throw new SellerNotFound($id);
        }


        $this->repository->delete($seller);
    }

}