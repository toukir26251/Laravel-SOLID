<?php

namespace App\Services;

class PaymentService
{
    public function getOrderPaymentAmount(int $orderId) : float
    {
        // get total amount by order id
        $amount = 4522.00;
        return $amount;
    }

    public function getPaymentGatewayLink(float $amount, int $gatewayId) : string
    {
        // get make payment link by payment amount and gateway id
        $paymentLink = 'some_url';
        return $paymentLink;
    }

    public function verifyTransaction(object $transaction) : bool
    {
        // verify transaction
        $flag = true;
        return $flag;
    }

    public function getGatewayName(int $gatewayId) : string
    {
        //get payment gateway name by gatewayId
        $gateway = ($gatewayId ==  1) ? 'stripe' : 'paypal';
        return $gateway;
    }
}
