<?php
declare(strict_types=1);

namespace Granah\CartShop\Seller\Domain;

use Granah\CartShop\Shared\Domain\SellerId;
use Granah\Shared\Domain\Aggregate\AggregateRoot;

final class Seller extends AggregateRoot
{
    public function __construct(private SellerId $id, private SellerName $name, private SellerEmail $email)
    {
    }

    public static function Create(SellerId $id, SellerName $name, SellerEmail $email): Seller
    {
        return new self($id, $name, $email);
    }

    public function id(): SellerId
    {
        return $this->id;
    }

    public function name(): SellerName
    {
        return $this->name;
    }

    public function email(): SellerEmail
    {
        return $this->email;
    }

}