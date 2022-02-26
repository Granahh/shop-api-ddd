<?php

namespace Granah\Apps\CartShop\Backend\Controller\Product;


use Granah\CartShop\Product\Application\Delete\DeleteProductCommand;
use Granah\CartShop\Product\Domain\ProductNotFound;
use Granah\Shared\Infrastructure\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class ProductDeleteController extends ApiController
{

    public function __invoke(string $id, Request $request): Response
    {
        $this->dispatch(
            new DeleteProductCommand($id)
        );
        return new Response(null, Response::HTTP_OK);
    }

    protected function exceptions(): array
    {
        return [ProductNotFound::class => Response::HTTP_NOT_FOUND];
    }
}