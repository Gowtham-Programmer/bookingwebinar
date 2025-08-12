<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SMSController extends Controller
{
    // public function sendSms(request $request)
    // {
    //     $sid = env('TWILIO_SID');
    //     $token = env('TWILIO_AUTH_TOKEN');
    //     $from = env('TWILIO_PHONE_NUMBER');
    //     $client = new Client($sid, $token);

    //      $client->messages->create(
    //         $request->input('to'), // Recipient phone number
    //         [
    //             'from' => $from,
    //             'body' => $request->input('message')
    //         ]
    //     );
    //     return response()->json(['message' => 'SMS sent successfully']);
    // }

// public function makeCall(Request $request)
// {
//     try {
//         $to = $request->input('to', '+916382788518');

//         $sid    = config('services.twilio.sid');
//         $token  = config('services.twilio.token');
//         $from   = config('services.twilio.from');

//         if(!$sid || !$token || !$from){
//             return response()->json(['success' => false, 'error' => 'Twilio config missing'], 500);
//         }

//         $client = new \Twilio\Rest\Client($sid, $token);
//         $call = $client->calls->create(
//             $to,
//             $from,
//             ["url" => "http://demo.twilio.com/docs/voice.xml"]
//         );

//         return response()->json(['success' => true, 'message' => 'Call initiated', 'call_sid' => $call->sid]);

//     } catch (\Exception $e) {
//         return response()->json(['success' => false, 'error' => $e->getMessage()], 500);
//     }

// }

    public function makeCall(Request $request)
{
    try {
        $to    = $request->input('to', '+121212121212');
        $sid   = config('services.twilio.sid');
        $token = config('services.twilio.token');
        $from  = config('services.twilio.from');


        $client = new \Twilio\Rest\Client($sid, $token);
        $call = $client->calls->create(
            $to,
            $from,
            ["url" => "http://demo.twilio.com/docs/voice.xml"]
        );

        return response()->json([
            'success' => true,
            'message' => 'Call initiated',
            'call_sid' => $call->sid
        ]);

    } catch (\Exception $e) {
        return response()->json([
            'success' => false,
            'error' => $e->getMessage()
        ], 500);
    }
}
}
