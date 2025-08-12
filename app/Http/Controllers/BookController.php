<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Webinar;
use App\Models\WebinarBooking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class BookController extends Controller
{
    // Show booking form
    public function create(Webinar $webinar)
    {
        return view('webinars.book', compact('webinar'));
    }

    // Handle form submission
    public function store(Request $request, Webinar $webinar)
    {
        $user = Auth::check() ? Auth::user() : null;

        $request->validate([
            'first_name' => 'required|string|max:100',
            'surname' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
        ]);

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

        WebinarBooking::create([
            'user_id' => $user ? $user->id : null,
            'webinar_id' => $webinar->id,
            'first_name' => $request->first_name,
            'surname' => $request->surname,
            'email' => $request->email,
            'phone' => $request->phone,
        ]);

        Mail::raw(
            "Hi {$request->first_name},\n\nYou have successfully booked the webinar \"{$webinar->title}\".\n\nJoin Webinar: {$webinar->link}\n\nDate: {$webinar->date} at " . date('h:i A', strtotime($webinar->time)),
            function ($message) use ($request) {
                $message->to($request->email)
                    ->subject('Your Webinar Booking Confirmation');
            }
        );

        return redirect()->route('my.webinars')->with('success', 'Webinar booked successfully!');
    }
}
