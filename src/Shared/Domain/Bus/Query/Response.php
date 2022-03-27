<?php

namespace Granah\Shared\Domain\Bus\Query;

interface Response
{
    public function toArray(): array;
}