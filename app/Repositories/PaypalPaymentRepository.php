<?php

namespace App\Repositories;

use App\Interfaces\PaymentGatewayRepositoryInterface;

class PaypalPaymentRepository implements PaymentGatewayRepositoryInterface
{
    public function getPaymentGatewayLink(float $amount) : string
    {
        // get payment link by amount, config data
        $paymentLink = "paypal_some_payment_url";
        return $paymentLink;
    }
}
