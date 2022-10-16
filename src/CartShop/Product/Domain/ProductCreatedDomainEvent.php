<?php

namespace Granah\CartShop\Product\Domain;

use Granah\Shared\Domain\Bus\Event\DomainEvent;

final class ProductCreatedDomainEvent extends DomainEvent
{
    public function __construct(string $id, private string $name, private string $description, private float $price, private string $sellerId, string $eventId = null, string $occurredOn = null)
    {
        parent::__construct($id, $eventId, $occurredOn);
    }


    public static function fromPrimitives(string $aggregateId, array $body, string $eventId, string $occurredOn): DomainEvent
    {
        return new self($aggregateId, $body['name'], $body['description'], $body['price'], $body['sellerId'], $eventId, $occurredOn);
    }

    public static function eventName(): string
    {
        return 'product_created';
    }

    public function toPrimitives(): array
    {
        return [
            'name' => $this->name,
            'description' => $this->description,
            'price' => $this->price,
            'sellerId' => $this->sellerId,
        ];
    }

    public function name(): string
    {
        return $this->name;
    }

    public function description(): string
    {
        return $this->description;
    }

    public function price(): float
    {
        return $this->price;
    }

    public function sellerId(): string
    {
        return $this->sellerId;
    }

}