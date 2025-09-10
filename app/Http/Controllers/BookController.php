<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Webinar;
use App\Models\WebinarBooking;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Spatie\IcalendarGenerator\Components\Calendar;
use Spatie\IcalendarGenerator\Components\Event;
use Carbon\Carbon;

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

        // Validate request
        $validated = $request->validate([
            'first_name' => 'required|string|max:100',
            'surname' => 'required|string|max:100',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
        ]);

        // Check if already booked
        $alreadyBooked = WebinarBooking::where('webinar_id', $webinar->id)
            ->where(function ($query) use ($user, $validated) {
                if ($user) {
                    $query->where('user_id', $user->id);
                } else {
                    $query->where('email', $validated['email']);
                }
            })->exists();

        if ($alreadyBooked) {
            return back()->with('info', 'You have already booked this webinar.');
        }

        // Save booking
        WebinarBooking::create([
            'user_id' => $user ? $user->id : null,
            'webinar_id' => $webinar->id,
            'first_name' => $validated['first_name'],
            'surname' => $validated['surname'],
            'email' => $validated['email'],
            'phone' => $validated['phone'],
        ]);

        // -------------------------
        // Generate ICS Calendar Invite
        // -------------------------
        $event = Event::create()
            ->name($webinar->title)
            ->description($webinar->description ?? 'Webinar Session')
            ->uniqueIdentifier("webinar-{$webinar->id}")
            ->startsAt(Carbon::parse($webinar->date . ' ' . $webinar->time))
            ->endsAt(Carbon::parse($webinar->date . ' ' . $webinar->time)->addHour())
            ->address($webinar->link)
            ->organizer('gowram156@gmail.com', $webinar->created_by_name ?? 'Webinar Host');


        $calendar = Calendar::create()->event($event);

        $icsFileName = "webinar-{$webinar->id}.ics";
        $icsPath = storage_path("app/{$icsFileName}");
        file_put_contents($icsPath, $calendar->get());

        // Optional: log for debugging
        if (file_exists($icsPath)) {
            \Log::info("✅ ICS file created: " . $icsPath);
        } else {
            \Log::error("❌ Failed to create ICS file: " . $icsPath);
        }

        // -------------------------
        // Send Email with ICS
        // -------------------------
        Mail::send([], [], function ($message) use ($validated, $webinar, $icsPath) {
            $message->to($validated['email'])
                ->subject('Your Webinar Booking Confirmation')
                ->html("
            Hi {$validated['first_name']},<br><br>
            🎉 You have successfully booked the webinar <b>{$webinar->title}</b>.<br><br>
            📅 Date: {$webinar->date} at " . date('h:i A', strtotime($webinar->time)) . "<br>
            🔗 Join: <a href='{$webinar->link}'>{$webinar->link}</a><br><br>
            Please find the attached calendar invite.
        ")
                ->attach($icsPath, [
                    'as' => 'webinar.ics',
                    'mime' => 'text/calendar; charset=utf-8; method=REQUEST',
                ]);
        });

        // -------------------------
        // Redirect with success
        // -------------------------
        return redirect()->route('my.webinars')
            ->with('success', '✅ You have successfully booked this webinar! Check your email for the calendar invite.');
    }

    public function downloadIcs(Webinar $webinar)
    {
        $icsFileName = "webinar-{$webinar->id}.ics";
        $icsPath = storage_path("app/{$icsFileName}");

        if (!file_exists($icsPath)) {
            return back()->with('error', 'ICS file not found. Please check your booking.');
        }

        return response()->download($icsPath, 'webinar.ics', [
            'Content-Type' => 'text/calendar; charset=utf-8; method=REQUEST',
        ]);
    }
}
