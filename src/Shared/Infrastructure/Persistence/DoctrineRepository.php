<?php

namespace Granah\Shared\Infrastructure\Persistence;

use Doctrine\ORM\EntityManager;
use Doctrine\ORM\EntityRepository;
use Granah\Shared\Domain\Aggregate\AggregateRoot;

abstract class DoctrineRepository
{
    public function __construct(private EntityManager $entityManager)
    {
    }

    protected function persist(AggregateRoot $entity): void
    {
        $this->entityManager->persist($entity);
        $this->entityManager->flush();
    }

    protected function remove(AggregateRoot $entity): void
    {
        $this->entityManager->remove($entity);
        $this->entityManager->flush();
    }

    protected function repository(string $entityClass): EntityRepository
    {
        return $this->entityManager->getRepository($entityClass);
    }

    protected function getEntityManager(): EntityManager
    {
        return $this->entityManager;
    }

}