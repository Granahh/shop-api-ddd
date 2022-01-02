<?php
declare(strict_types=1);

namespace Granah\Shared\Infrastructure\Bus\Command;

use Granah\Shared\Domain\Bus\Command\Command;
use Granah\Shared\Domain\Bus\Command\CommandBus;
use Granah\Shared\Infrastructure\Bus\CallableFirstParameterExtractor;
use Symfony\Component\Messenger\Exception\HandlerFailedException;
use Symfony\Component\Messenger\Exception\NoHandlerForMessageException;
use Symfony\Component\Messenger\Handler\HandlersLocator;
use Symfony\Component\Messenger\MessageBus;
use Symfony\Component\Messenger\Middleware\HandleMessageMiddleware;

final class InMemorySymfonyCommandBus implements CommandBus
{
    private MessageBus $bus;

    public function __construct(iterable $commandHandlers)
    {
        $this->bus = new MessageBus(
            [
                new HandleMessageMiddleware(
                    new HandlersLocator(CallableFirstParameterExtractor::forCallables($commandHandlers))
                ),
            ]
        );
    }

    /**
     * @throws \Throwable
     */
    public function dispatch(Command $command): void
    {

        try {
            $this->bus->dispatch($command);
        } catch (NoHandlerForMessageException $error) {
            throw new CommandNotRegisteredError($command);
        } catch (HandlerFailedException $error) {
            throw $error->getPrevious() ?? $error;
        }

    }
}