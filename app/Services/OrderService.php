<?php

namespace App\Services;

class OrderService
{
    public function getOrderDetails(int $orderId) : array
    {
        // get order details by order id
        $orderDetails = [
            [
                "item_id"=>"XXX",
                "unit_price"=>"XXX",
                "quantity"=>"XXX"
            ]
        ];
        return $orderDetails;
    }

    public function getOrderFailedTransactions(int $orderId) : array
    {
        // get all failed transactions
        $failedTransactions = [];
        return $failedTransactions;
    }
}
