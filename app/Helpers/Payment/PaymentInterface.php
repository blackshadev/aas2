<?php
namespace App\Helpers\Payment;

interface PaymentInterface
{
    public function getTotalAmount(): float;
    public function getDescription(): string;
    public function getCurrency(): string;
    public function getMetadata();
    public function getKeys(): array;
}
