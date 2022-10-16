<?php
declare(strict_types=1);

namespace Granah\Shared\Infrastructure;

use Granah\Shared\Domain\Bus\Command\Command;
use Granah\Shared\Domain\Bus\Command\CommandBus;
use Granah\Shared\Domain\Bus\Query\Query;
use Granah\Shared\Domain\Bus\Query\QueryBus;
use Granah\Shared\Domain\Bus\Query\Response;
use Granah\Shared\Infrastructure\Symfony\ApiExceptionsHttpStatusCodeMapping;


abstract class ApiController
{


    public function __construct(
        private QueryBus                   $queryBus,
        private CommandBus                 $commandBus,
        ApiExceptionsHttpStatusCodeMapping $exceptionHandler
    )
    {
        foreach ($this->exceptions() as $exceptionClass => $httpStatusCode) {
            $exceptionHandler->register($exceptionClass, $httpStatusCode);
        }
    }

    abstract protected function exceptions(): array;

    protected function ask(Query $query): ?Response
    {
        return $this->queryBus->ask($query);
    }

    protected function dispatch(Command $command): void
    {

        $this->commandBus->dispatch($command);
    }
}