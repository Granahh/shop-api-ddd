<?php

declare(strict_types=1);

namespace Granah\Apps\CartShop\Backend\Controller\HealthCheck;


use Granah\Shared\Domain\RandomNumberGenerator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class HealthCheckGetController
{
    private $generator;

    public function __construct(RandomNumberGenerator $generator)
    {
        $this->generator = $generator;
    }

    public function __invoke(Request $request): Response
    {
        return new JsonResponse(
            [
                'cart_shop-backend' => 'ok',
                'rand' => $this->generator->generate(),
            ]
        );
    }
}
