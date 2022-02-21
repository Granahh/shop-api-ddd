<?php
declare(strict_types=1);
namespace Granah\CartShop\Seller\Application\Create;

use Granah\CartShop\Seller\Domain\FindSeller;
use Granah\CartShop\Seller\Domain\Seller;
use Granah\CartShop\Seller\Domain\SellerAlreadyExists;
use Granah\CartShop\Seller\Domain\SellerEmail;
use Granah\CartShop\Seller\Domain\SellerName;
use Granah\CartShop\Seller\Domain\SellerRepository;
use Granah\CartShop\Shared\Domain\SellerId;

final class CreateSeller
{

    public function __construct(private SellerRepository $repository)
    {
    }

    public function __invoke(SellerId $id, SellerName $name, SellerEmail $email)
    {
        if ($this->repository->search($id) !== null)
        {
            throw new SellerAlreadyExists($id);
        }

        $seller = Seller::Create($id, $name, $email);
        $this->repository->save($seller);
    }
}

