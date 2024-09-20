<?php

namespace App\Interfaces;

interface PaymentGatewayRepositoryInterface
{
    public function getPaymentGatewayLink(float $amount);
}
