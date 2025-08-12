<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentController extends Controller
{
    public function showPaymentForm($webinarId)
    {
        return view('payment', ['webinarId' => $webinarId]);
    }

    public function processPayment(Request $request, $webinarId)
    {
        return "Processing payment for Webinar ID: " . $webinarId;
    }
}
