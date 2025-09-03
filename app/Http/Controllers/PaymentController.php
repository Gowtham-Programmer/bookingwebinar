<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stripe\Stripe;
use Stripe\Checkout\Session;

class PaymentController extends Controller
{
    public function showPaymentForm($webinarId)
    {
        return view('payment', ['webinarId' => $webinarId]);
    }

    // public function processPayment(Request $request, $webinarId)
    // {
    //     return "Processing payment for Webinar ID: " . $webinarId;
    // }

    public function processPayment(Request $request, $webinarId)
    {
        Stripe::setApiKey(config('services.stripe.secret'));

        // 💰 Example price = 1000 = ₹1000 / $10 (depends on currency)
        $session = Session::create([
            'payment_method_types' => ['card'],
            'line_items' => [[
                'price_data' => [
                    'currency'     => 'usd',
                    'product_data' => [
                        'name' => 'Webinar Registration #'.$webinarId,
                    ],
                    'unit_amount'  => 1000, // amount in cents (10.00 USD)
                ],
                'quantity' => 1,
            ]],
            'mode' => 'payment',
            'success_url' => route('payment.success', ['webinar' => $webinarId]),
            'cancel_url'  => route('payment.form', ['webinar' => $webinarId]),
        ]);

        return redirect($session->url);
    }

    public function paymentSuccess($webinarId)
    {
        return redirect()->route('my.webinars')
                         ->with('success', 'Payment successful! Webinar registered.');
    }

}
