<?php
declare(strict_types=1);

namespace Granah\Shared\Infrastructure\Doctrine;

use Doctrine\ORM\EntityManager;
use Granah\CartShop\Tests\Shared\Infrastructure\Doctrine\DatabaseCleaner;
use function Lambdish\Phunctional\apply;
use function Lambdish\Phunctional\each;

final class DatabaseConnections
{
    private $connections = [];

    public function __construct(iterable $connections)
    {
        $this->connections = iterator_to_array($connections);
    }

    public function allConnectionsClearer(): callable
    {
        return function (): void {
            $this->clear();
        };
    }

    public function clear(): void
    {
        each($this->clearer(), $this->connections);
    }

    private function clearer(): callable
    {
        return static function (EntityManager $entityManager) {
            $entityManager->clear();
        };
    }

    public function truncate(): void
    {
        apply(new DatabaseCleaner(), array_values($this->connections));
    }
}
