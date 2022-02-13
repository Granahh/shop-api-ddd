<?php
declare(strict_types=1);
namespace Granah\CartShop\Seller\Application\Delete;

use Granah\CartShop\Seller\Domain\FindSeller;
use Granah\CartShop\Seller\Domain\SellerRepository;
use Granah\CartShop\Shared\Domain\SellerId;


final class DeleteSeller
{
    public function __construct(private SellerRepository $repository,private FindSeller $findSeller)
    {
    }

    public function __invoke(SellerId $id): void
    {
        $seller = $this->findSeller->__invoke($id);
        $this->repository->delete($seller);
    }

}