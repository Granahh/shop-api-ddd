<?php

namespace Granah\CartShop\Tests\CartShop\Seller\Application\Find;

use Granah\CartShop\Seller\Application\Find\FindSellerQueryHandler;
use Granah\CartShop\Seller\Application\Find\FindSellerReponse;
use Granah\CartShop\Seller\Domain\FindSeller;
use Granah\CartShop\Seller\Domain\SellerNotFound;
use Granah\CartShop\Shared\Domain\SellerId;
use Granah\CartShop\Tests\CartShop\Seller\Domain\SellerMother;
use Granah\CartShop\Tests\CartShop\Seller\SellerModuleUnitTestCase;

final class FindSellerQueryHandlerTest extends SellerModuleUnitTestCase
{
    private FindSellerQueryHandler|null $handler;

    protected function setUp(): void
    {
        parent::setUp();
        $this->handler = new FindSellerQueryHandler(new FindSeller($this->repository()));
    }

    /**
     * @test
     */
    public function it_should_search_a_valid_seller(): void
    {
        $query = FindSellerQueryMother::create();

        $this->shouldSearch(
            SellerMother::create(
                new SellerId('deb3863c-e988-3ac4-bb74-bf150c51787c')
            ));

        $findSellerReponseExpect = FindSellerReponse::build(SellerMother::create(new SellerId('deb3863c-e988-3ac4-bb74-bf150c51787c')));
        $this->assertAskResponse($findSellerReponseExpect, $query, $this->handler);
    }


    /**
     * @test
     */
    public function it_should_search_an_error_seller(): void
    {
        $query = FindSellerQueryMother::create();
        $this->shouldSearch(null);
        $this->assertAskThrowsException(SellerNotFound::class, $query, $this->handler);
    }
}