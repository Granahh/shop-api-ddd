<?php

namespace Granah\CartShop\Seller\Application\Notify;

use Granah\CartShop\Product\Domain\ProductCreatedDomainEvent;
use Granah\CartShop\Shared\Domain\ProductId;
use Granah\CartShop\Shared\Domain\SellerId;
use Granah\Shared\Domain\Bus\Event\DomainEventSubscriber;

final class NotifySellerOnProductCreated implements DomainEventSubscriber
{

    private function __construct(private NotifySeller $notifySeller)
    {
    }

    public static function subscribedTo(): array
    {
        return [ProductCreatedDomainEvent::class];
    }

    public function __invoke(ProductCreatedDomainEvent $event): void
    {
        $this->notifySeller->__invoke(new SellerId($event->sellerId()), new ProductId($event->aggregateId()));
    }

}