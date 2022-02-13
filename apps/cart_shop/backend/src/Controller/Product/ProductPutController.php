<?php

namespace Granah\Apps\CartShop\Backend\Controller\Product;

use Granah\CartShop\Product\Application\Create\CreateProductCommand;
use Granah\CartShop\Seller\Domain\SellerNotFound;
use Granah\Shared\Infrastructure\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class ProductPutController extends ApiController
{

    public function __invoke(string $id, Request $request): Response
    {
        $this->dispatch(
            new CreateProductCommand(
                $id,
                $request->get('name'),
                $request->get('description'),
                $request->get('price'),
                $request->get('sellerId')
            )
        );
        return new Response(null, Response::HTTP_CREATED);
    }

    protected function exceptions(): array
    {
        return [SellerNotFound::class => Response::HTTP_NOT_FOUND];
    }
}