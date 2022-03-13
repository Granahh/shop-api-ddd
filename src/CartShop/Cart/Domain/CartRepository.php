<?php

namespace Granah\CartShop\Cart\Domain;

interface CartRepository
{
    public function save(Cart $cart): void;
}