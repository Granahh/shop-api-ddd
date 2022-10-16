<?php

namespace Granah\Shared\Infrastructure\Persistence;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;
use Granah\Shared\Domain\Utils;
use Granah\Shared\Domain\ValueObject\Uuid;
use function Lambdish\Phunctional\last;


abstract class UuidType extends StringType
{
    public function getName(): string
    {
        return self::customTypeName();
    }

    public static function customTypeName(): string
    {
        return Utils::toSnakeCase(str_replace('Type', '', last(explode('\\', static::class))));
    }

    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        $className = $this->typeClassName();

        return new $className($value);
    }

    abstract protected function typeClassName(): string;

    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        /** @var Uuid $value */
        return $value->value();
    }
}
