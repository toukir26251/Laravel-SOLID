<?php

namespace App\Interfaces;

interface PaymentRepositoryInterface
{
    public function getPaymentDetails(int $orderId);
    public function paymentVerification(int $orderId);
}
