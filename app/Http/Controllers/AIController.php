<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Webinar;
use App\Models\WebinarBooking;

class AIController extends Controller
{
    public function chat(Request $request)
    {
        $question = $request->input('question');

        // Fetch some DB data (example: users & webinars)
        $users = User::pluck('name')->toArray();
        $webinars = Webinar::pluck('title')->toArray();
        $webinarBooking = WebinarBooking::pluck('first_name')->toArray();
        $booking = Booking::pluck('name')->toArray();
        // Combine context + user question
        $context = "Database Info:\nUsers: " . implode(', ', $users) .
                   "\nWebinars: " . implode(', ', $webinars) .
                   "\nWebinarBookings: " . implode(', ', $webinarBooking) .
                   "\nBookings: " . implode(', ', $booking) .
                   "\nQuestion: " . $question;

        // Call Perplexity API
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . env('PERPLEXITY_API_KEY'),
            'Content-Type'  => 'application/json',
        ])->post('https://api.perplexity.ai/chat/completions', [
            'model' => 'sonar-pro', 
            'messages' => [
                ['role' => 'system', 'content' => 'You are a helpful assistant that answers based on provided database info.'],
                ['role' => 'user', 'content' => $context],
            ],
            'temperature' => 0.7
        ]);

        return response()->json([
            'answer' => $response->json()['choices'][0]['message']['content'] ?? 'No answer received.'
        ]);
    }
}
