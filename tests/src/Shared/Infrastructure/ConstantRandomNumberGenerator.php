<?php

declare(strict_types=1);

namespace Granah\CartShop\Tests\Shared\Infrastructure;


use Granah\Shared\Domain\RandomNumberGenerator;

final class ConstantRandomNumberGenerator implements RandomNumberGenerator
{
    public function generate(): int
    {
        return 1;
    }
}
