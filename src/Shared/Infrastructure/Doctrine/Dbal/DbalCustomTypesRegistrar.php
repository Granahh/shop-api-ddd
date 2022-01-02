<?php

namespace Granah\Shared\Infrastructure\Doctrine\Dbal;
use Doctrine\DBAL\Types\Type;
use function Lambdish\Phunctional\each;

class DbalCustomTypesRegistrar
{
    private static bool $initialized = false;

    public static function register(array $dbalCustomTypesClasses): void
    {
        if (!self::$initialized) {
            each(self::registerType(), $dbalCustomTypesClasses);

            self::$initialized = true;
        }
    }

    private static function registerType(): callable
    {
        return static function ($dbalCustomTypesClasses): void {
            Type::addType($dbalCustomTypesClasses::customTypeName(), $dbalCustomTypesClasses);
        };
    }
}