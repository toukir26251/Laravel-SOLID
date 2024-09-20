<?php

namespace App\Repositories;

use App\Interfaces\PaymentRepositoryInterface;
use App\Services\OrderService;
use App\Services\PaymentService;
use Brick\Math\BigInteger;
use PhpParser\Node\Expr\Array_;

class PaymentRepository implements PaymentRepositoryInterface
{
    private PaymentService $paymentService;
    private OrderService $orderService;

    public function __construct(PaymentService $paymentService, OrderService $orderService)
    {
        $this->paymentService = $paymentService;
        $this->orderService = $orderService;
    }
    public function getPaymentDetails(int $orderId) : array
    {
        // get all data about order by orderId
        $orderDetails = $this->orderService->getOrderDetails($orderId);
        $totalAmount = $this->paymentService->getOrderPaymentAmount($orderId);
        return [
            "order_id"=>$orderId,
            "order_item_details"=>$orderDetails,
            "order_total"=>$totalAmount
        ];
    }

    public function paymentVerification(int $orderId) : array
    {
        //verify order payment by orderId

        $orderFailedTransactions = $this->orderService->getOrderFailedTransactions($orderId);
        $verification = false;
        foreach ($orderFailedTransactions as $transaction){
            $verification = $this->paymentService->verifyTransaction($transaction);
            if($verification)
                break;
        }
        return [
            "order_id"=>$orderId,
            "verified"=>$verification
        ];
    }
}
