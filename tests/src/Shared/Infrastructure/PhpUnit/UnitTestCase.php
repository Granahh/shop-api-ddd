<?php

namespace Granah\CartShop\Tests\Shared\Infrastructure\PhpUnit;

use Doctrine\ORM\Id\UuidGenerator;
use Granah\Shared\Domain\Bus\Command\Command;
use Granah\Shared\Domain\Bus\Event\DomainEvent;
use Granah\Shared\Domain\Bus\Event\EventBus;
use Granah\Shared\Domain\Bus\Query\Query;
use Granah\Shared\Domain\Bus\Query\Response;
use Mockery;
use Mockery\Adapter\Phpunit\MockeryTestCase;
use Mockery\MockInterface;

class UnitTestCase extends MockeryTestCase
{
    private EventBus|MockInterface|null      $eventBus;
    private UuidGenerator|MockInterface|null $uuidGenerator;

    protected function mock(string $className): MockInterface
    {
        return Mockery::mock($className);
    }


    protected function eventBus(): EventBus|MockInterface
    {
        return $this->eventBus = $this->eventBus ?? $this->mock(EventBus::class);
    }

    protected function shouldGenerateUuid(string $uuid): void
    {
        $this->uuidGenerator()
            ->shouldReceive('generate')
            ->once()
            ->withNoArgs()
            ->andReturn($uuid);
    }

    protected function uuidGenerator(): UuidGenerator|MockInterface
    {
        return $this->uuidGenerator = $this->uuidGenerator ?? $this->mock(UuidGenerator::class);
    }

    protected function notify(DomainEvent $event, callable $subscriber): void
    {
        $subscriber($event);
    }

    protected function dispatch(Command $command, callable $commandHandler): void
    {
        $commandHandler($command);
    }

    protected function assertAskResponse(Response $expected, Query $query, callable $queryHandler): void
    {
        $actual = $queryHandler($query);

        $this->assertEquals($expected, $actual);
    }

    protected function assertAskThrowsException(string $expectedErrorClass, Query $query, callable $queryHandler): void
    {
        $this->expectException($expectedErrorClass);

        $queryHandler($query);
    }


}