<?php

namespace Granah\Apps\CartShop\Backend\Controller\Cart;

use Granah\CartShop\Cart\Application\Delete\DeleteCartCommand;
use Granah\Shared\Infrastructure\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class CartDeleteController extends ApiController
{

    public function __invoke(string $id, Request $request): Response
    {

        $command = new DeleteCartCommand(
            $id
        );

        $this->dispatch($command);

        return new Response(null, Response::HTTP_OK);
    }

    protected function exceptions(): array
    {
        return [];
    }
}