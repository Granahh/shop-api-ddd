<?php

declare(strict_types=1);

namespace Granah\Apps\CartShop\Backend\Controller\Seller;

use Granah\CartShop\Seller\Application\Delete\DeleteSellerCommand;
use Granah\CartShop\Seller\Domain\SellerNotFound;
use Granah\Shared\Infrastructure\ApiController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class SellerDeleteController extends ApiController
{
    public function __invoke(string $id, Request $request)
    {
        $this->dispatch(
            new DeleteSellerCommand(
                $id
            )
        );

        return new Response(null,Response::HTTP_OK);
    }

    protected function exceptions(): array
    {
        return [SellerNotFound::class => Response::HTTP_NOT_FOUND];
    }
}
{

}