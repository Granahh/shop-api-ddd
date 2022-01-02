<?php
declare(strict_types=1);
namespace Granah\CartShop\Seller\Domain;

final class SellerEmail
{
    private string $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function value(): string
    {
        return $this->value;
    }
}