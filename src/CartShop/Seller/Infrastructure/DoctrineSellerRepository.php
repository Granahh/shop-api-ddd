<?php
declare(strict_types=1);

namespace Granah\CartShop\Seller\Infrastructure;

use Granah\CartShop\Seller\Domain\Seller;
use Granah\CartShop\Seller\Domain\SellerRepository;
use Granah\CartShop\Shared\Domain\SellerId;
use Granah\Shared\Infrastructure\Persistence\DoctrineRepository;

final class DoctrineSellerRepository extends DoctrineRepository implements SellerRepository
{

    public function save(Seller $seller): void
    {
        $this->persist($seller);
    }

    public function delete(Seller $seller): void
    {
        $this->remove($seller);
    }

    public function search(SellerId $id): ?Seller
    {
        return $this->repository(Seller::class)->find($id);
    }
}

{

}