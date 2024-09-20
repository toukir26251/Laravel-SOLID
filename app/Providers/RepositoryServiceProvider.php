<?php

namespace App\Providers;

use App\Interfaces\PaymentGatewayRepositoryInterface;
use App\Interfaces\PaymentRepositoryInterface;
use App\Repositories\PaymentRepository;
use App\Repositories\PaypalPaymentRepository;
use App\Repositories\StripePaymentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(PaymentRepositoryInterface::class, PaymentRepository::class);
        $this->app->bind(PaymentGatewayRepositoryInterface::class, StripePaymentRepository::class);
        $this->app->bind(PaymentGatewayRepositoryInterface::class, PaypalPaymentRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
