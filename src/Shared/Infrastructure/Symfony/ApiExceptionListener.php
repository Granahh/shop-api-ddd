<?php

namespace Granah\Shared\Infrastructure\Symfony;

use Granah\Shared\Domain\DomainError;
use Granah\Shared\Domain\Utils;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Throwable;

final class ApiExceptionListener
{
    public function __construct(private ApiExceptionsHttpStatusCodeMapping $exceptionHandler)
    {
    }

    public function onException(ExceptionEvent $event): void
    {
        $exception = $event->getThrowable();

        $event->setResponse(
            new JsonResponse(
                [
                    'code' => $this->exceptionCodeFor($exception),
                    'message' => $exception->getMessage(),
                ],
                $this->exceptionHandler->statusCodeFor(get_class($exception))
            )
        );
    }

    private function exceptionCodeFor(Throwable $error): string
    {
        $domainErrorClass = DomainError::class;

        return $error instanceof $domainErrorClass
            ? $error->errorCode()
            : Utils::toSnakeCase(Utils::extractClassName($error));
    }
}
