<?php

namespace Granah\Apps\CartShop\Backend\Controller\Cart;

use Granah\CartShop\Cart\Application\Get\GetCartQuery;
use Granah\Shared\Infrastructure\ApiController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CartGetController extends ApiController
{

    public function __invoke(string $id, Request $request): Response
    {
        $cart = $this->ask(new GetCartQuery($id));
        return new JsonResponse($cart->toArray(), Response::HTTP_OK);
    }

    protected function exceptions(): array
    {
        return [];
    }
}