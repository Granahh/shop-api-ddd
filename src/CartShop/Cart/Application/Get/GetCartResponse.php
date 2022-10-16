<?php

namespace Granah\CartShop\Cart\Application\Get;

use Granah\CartShop\Cart\Domain\ProductsCart;
use Granah\Shared\Domain\Bus\Query\Response;


final class GetCartResponse implements Response
{
    public function __construct(private string $cartId, private array $products)
    {
    }

    public static function build(ProductsCart $productsCart): self
    {
        $cartId = null;
        $products = [];

        foreach ($productsCart->value() as $cart) {
            $cartId = $cart->cartId();
            $products[$cart->productId()->value()]['id'] = $cart->productId()->value();
            $products[$cart->productId()->value()]['qt'] = $cart->quantity()->value();
        }

        return new self($cartId, $products);
    }

    public function toArray(): array
    {
        return [
            'cartId' => $this->cartId,
            'products' => $this->products
        ];
    }


}