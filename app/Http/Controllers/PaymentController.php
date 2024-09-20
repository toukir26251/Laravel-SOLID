<?php

namespace App\Http\Controllers;

use App\Interfaces\PaymentGatewayRepositoryInterface;
use App\Repositories\PaymentRepository;
use App\Repositories\PaypalPaymentRepository;
use App\Repositories\StripePaymentRepository;
use App\Services\OrderService;
use App\Services\PaymentService;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    private PaymentRepository $paymentRepository;
    private StripePaymentRepository $stripePaymentRepository;
    private PaypalPaymentRepository $paypalPaymentRepository;

    public function __construct(PaymentRepository $paymentRepository, StripePaymentRepository $stripePaymentRepository, PaypalPaymentRepository $paypalPaymentRepository)
    {
        $this->paymentRepository = $paymentRepository;
        $this->stripePaymentRepository = $stripePaymentRepository;
        $this->paypalPaymentRepository = $paypalPaymentRepository;
    }
    public function getPaymentAmount($orderId)
    {
        $data = $this->paymentRepository->getPaymentDetails($orderId);
        return response()->json(['success'=>true, 'data'=>$data]);
    }
    public function getPaymentGatewayLink(PaymentService $paymentService, $orderId, $gatewayId)
    {
        $gateway = $paymentService->getGatewayName($gatewayId);
        $repoName = $gateway."PaymentRepository";
        $amount = $paymentService->getOrderPaymentAmount($orderId);
        $data = $this->$repoName->getPaymentGatewayLink($amount);
        return response(['success'=>true, 'data'=>$data]);
    }
    public function paymentVerification($orderId)
    {
        $data = $this->paymentRepository->paymentVerification($orderId);
        return response()->json(['success'=>true, 'data'=>$data]);
    }
}
