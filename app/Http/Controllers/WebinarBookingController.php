<?php

namespace App\Http\Controllers;

use App\Models\Webinar;
use App\Models\WebinarBooking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\WebinarBookingMail;



class WebinarBookingController extends Controller
{
    public function book(Request $request, Webinar $webinar)
{
    $user = Auth::check() ? Auth::user() : null;

    // Validate form fields
    $request->validate([
        'first_name' => 'required|string|max:100',
        'surname'    => 'required|string|max:100',
        'email'      => 'required|email',
        'phone'      => 'required|string|max:15',
    ]);

    // Check if already booked (by user_id OR email)
    $alreadyBooked = WebinarBooking::where('webinar_id', $webinar->id)
        ->where(function ($query) use ($user, $request) {
            if ($user) {
                $query->where('user_id', $user->id);
            } else {
                $query->where('email', $request->email);
            }
        })->exists();

    if ($alreadyBooked) {
        return back()->with('info', 'You have already booked this webinar.');
    }

    // Save booking
    WebinarBooking::create([
        'user_id'    => $user ? $user->id : null,
        'webinar_id' => $webinar->id,
        'first_name' => $request->first_name,
        'surname'    => $request->surname,
        'email'      => $request->email,
        'phone'      => $request->phone,
    ]);

    // Send Email with Webinar Link
    Mail::raw(
        "Hi {$request->first_name},\n\nYou have successfully booked the webinar \"{$webinar->title}\".\n\nJoin Webinar: {$webinar->link}\n\nDate: {$webinar->date} at " . date('h:i A', strtotime($webinar->time)),
        function ($message) use ($request) {
            $message->to($request->email)
                    ->subject('Your Webinar Booking Confirmation');
        }
    );

    return redirect()->route('my-webinars')->with('success', 'Webinar booked successfully! Check your email for the join link.');
}

    public function myWebinars()
    {
        $bookings = WebinarBooking::with('webinar')
            ->where('user_id', auth()->id())
            ->latest()
            ->get();

        return view('webinars.my-webinars', compact('bookings'));
    }
    public function show($id)
    {
    // Fetch the webinar by ID
    // $webinar = Webinar::findOrFail($id);

    // Pass it to the Blade view
    return view('webinar.show', compact('webinar'));
    }

   public function store(Request $request, Webinar $webinar)
{
    $validated = $request->validate([
        'first_name' => 'required|string|max:255',
        'surname' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:20',
    ]);

    WebinarBooking::create([
        'user_id'    => auth()->check() ? auth()->id() : null,
        'webinar_id' => $webinar->id,
        'first_name' => $validated['first_name'],
        'surname'    => $validated['surname'],
        'email'      => $validated['email'],
        'phone'      => $validated['phone'],
    ]);

    return redirect()->route('webinars.show', $webinar->id)
                     ->with('success', '✅ Successfully registered for the webinar!');
}



}