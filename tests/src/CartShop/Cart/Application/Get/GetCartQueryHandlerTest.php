<?php

namespace Granah\CartShop\Tests\CartShop\Cart\Application\Get;

use Granah\CartShop\Cart\Application\Get\GetCart;
use Granah\CartShop\Cart\Application\Get\GetCartQueryHandler;
use Granah\CartShop\Cart\Application\Get\GetCartResponse;
use Granah\CartShop\Cart\Application\Get\GetCartResponseEmpty;
use Granah\CartShop\Cart\Domain\CartId;
use Granah\CartShop\Cart\Domain\ProductsCart;
use Granah\CartShop\Tests\CartShop\Cart\CartModuleUnitTestCase;
use Granah\CartShop\Tests\CartShop\Cart\Domain\CartMother;


final class GetCartQueryHandlerTest extends CartModuleUnitTestCase
{
    private GetCartQueryHandler|null $handler;

    protected function setUp(): void
    {
        parent::setUp();
        $this->handler = new GetCartQueryHandler(new GetCart($this->repository()));
    }

    /**
     * @test
     */
    public function it_should_return_cart_by_id(): void
    {
        $cartId = new CartId('7be90081-21c7-46fe-9053-b4b56c24c158');
        $query = GetCartQueryMother::create($cartId);
        $productsCart = $this->buildProductsCart($cartId);

        $this->shouldSearch($productsCart);
        $responseExpected = GetCartResponse::build($productsCart);
        $this->assertAskResponse($responseExpected, $query,$this->handler);
    }

    /**
     * @test
     */
    public function it_should_return_empty_cart_when_cart_not_found(): void
    {
        $cartId = new CartId('7be90081-21c7-46fe-9053-b4b56c24c158');
        $query = GetCartQueryMother::create($cartId);
        $productsCart = new ProductsCart([]);
        $this->shouldSearch($productsCart);
        $responseExpected = new GetCartResponseEmpty();
        $this->assertAskResponse($responseExpected, $query,$this->handler);
    }

    private function buildProductsCart(CartId $id): ProductsCart
    {
        $productsCart = new ProductsCart([]);
        $productsCart->add(CartMother::create($id));
        return $productsCart;
    }
}