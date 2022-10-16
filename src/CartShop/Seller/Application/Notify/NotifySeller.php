<?php

namespace Granah\CartShop\Seller\Application\Notify;

use Granah\CartShop\Seller\Domain\SellerRepository;
use Granah\CartShop\Shared\Domain\ProductId;
use Granah\CartShop\Shared\Domain\SellerId;
use Granah\CartShop\Tests\CartShop\Seller\Domain\SellerMother;

final class NotifySeller
{
    public function __construct(private SellerRepository $sellerRepository)
    {
    }

    public function __invoke(SellerId $sellerId, ProductId $productId): void
    {
        $this->sellerRepository->save(SellerMother::create());
    }
}