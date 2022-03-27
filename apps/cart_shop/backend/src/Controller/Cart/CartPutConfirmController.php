<?php

namespace Granah\Apps\CartShop\Backend\Controller\Cart;

use Granah\CartShop\Cart\Application\Add\AddProductCartCommand;
use Granah\CartShop\Cart\Application\Confirm\ConfirmCartCommand;
use Granah\Shared\Infrastructure\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CartPutConfirmController extends ApiController
{

    public function __invoke(string $id, Request $request): Response
    {
        $command = new ConfirmCartCommand($id);
        $this->dispatch($command);
        return new Response(null, Response::HTTP_CREATED);
    }

    protected function exceptions(): array
    {
        return [];
    }
}