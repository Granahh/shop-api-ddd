<?php

declare(strict_types = 1);

namespace Granah\Shared\Domain;

interface RandomNumberGenerator
{
    public function generate(): int;
}
