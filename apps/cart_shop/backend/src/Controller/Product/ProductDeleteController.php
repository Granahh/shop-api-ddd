<?php

namespace Granah\Apps\CartShop\Backend\Controller\Product;


use Granah\CartShop\Seller\Domain\SellerNotFound;
use Granah\Shared\Infrastructure\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class ProductDeleteController extends ApiController
{

    public function __invoke(string $id, Request $request): Response
    {

        return new Response(null, Response::HTTP_OK);
    }

    protected function exceptions(): array
    {
        return [SellerNotFound::class => Response::HTTP_NOT_FOUND];
    }
}