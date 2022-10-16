<?php
declare(strict_types=1);

namespace Granah\Apps\CartShop\Backend\Controller\Seller;

use Granah\CartShop\Seller\Application\Create\CreateSellerCommand;
use Granah\CartShop\Seller\Domain\SellerAlreadyExists;
use Granah\Shared\Infrastructure\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class SellerPutController extends ApiController
{
    public function __invoke(string $id, Request $request): Response
    {
        $this->dispatch(
            new CreateSellerCommand(
                $id,
                $request->request->get('name'),
                $request->request->get('email')));

        return new Response(null, Response::HTTP_CREATED);
    }

    protected function exceptions(): array
    {
        return [SellerAlreadyExists::class => Response::HTTP_CONFLICT];
    }
}