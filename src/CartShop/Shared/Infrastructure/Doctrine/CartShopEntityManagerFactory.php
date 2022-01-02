<?php

namespace Granah\CartShop\Shared\Infrastructure\Doctrine;

use Doctrine\ORM\EntityManagerInterface;
use Granah\Shared\Infrastructure\Doctrine\DoctrineEntityManagerFactory;

class CartShopEntityManagerFactory
{
    private const SCHEMA_PATH = __DIR__ . '/../../../../../databases/cart_shop.sql';

    public static function create(array $parameters, string $environment): EntityManagerInterface
    {
        $isDevMode = 'prod' !== $environment;

        $prefixes = array_merge(
            DoctrinePrefixesSearcher::inPath(__DIR__ . '/../../../../CartShop', 'Granah\CartShop'),
        );

        $dbalCustomTypesClasses = DbalTypesSearcher::inPath(__DIR__ . '/../../../../CartShop', 'CartShop');

        return DoctrineEntityManagerFactory::create(
            $parameters,
            $prefixes,
            $isDevMode,
            self::SCHEMA_PATH,
            $dbalCustomTypesClasses
        );
    }
}