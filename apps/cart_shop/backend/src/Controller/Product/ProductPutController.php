<?php

namespace Granah\Apps\CartShop\Backend\Controller\Product;

use Granah\Shared\Infrastructure\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class ProductPutController extends ApiController
{

    public function __invoke(string $id, Request $request)
    {
        return new Response(null, Response::HTTP_CREATED);
    }

    protected function exceptions(): array
    {
        return [];
    }
}