<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use App\Models\WebinarBooking;

class WebinarRegistered extends Mailable
{
    use Queueable, SerializesModels;

    public $booking;

    public function __construct(WebinarBooking $booking)
    {
        $this->booking = $booking;
    }

    public function build()
    {
        $ics = $this->generateIcs($this->booking);

        return $this->subject("Webinar Registration: {$this->booking->webinar->title}")
            ->markdown('emails.webinars.registered')
            ->with(['booking' => $this->booking])
            ->attachData($ics, 'webinar.ics', [
                'mime' => 'text/calendar; charset=utf-8; method=REQUEST'
            ]);
    }

    protected function generateIcs(WebinarBooking $booking)
    {
        $webinar = $booking->webinar;
        $user = $booking->user;

        $start = $webinar->start_date_time->copy()->timezone('UTC')->format('Ymd\THis\Z');
        $end   = $webinar->end_date_time->copy()->timezone('UTC')->format('Ymd\THis\Z');
        $dtstamp = now()->timezone('UTC')->format('Ymd\THis\Z');

        $uid = uniqid() . "@yourapp.com";

        $lines = [];
        $lines[] = 'BEGIN:VCALENDAR';
        $lines[] = 'VERSION:2.0';
        $lines[] = 'PRODID:-//YourApp//Webinar//EN';
        $lines[] = 'METHOD:REQUEST';
        $lines[] = 'BEGIN:VEVENT';
        $lines[] = "UID:$uid";
        $lines[] = "DTSTAMP:$dtstamp";
        $lines[] = "DTSTART:$start";
        $lines[] = "DTEND:$end";
        $lines[] = 'SUMMARY:' . $webinar->title;
        if ($webinar->description) {
            $lines[] = 'DESCRIPTION:' . str_replace("\n", "\\n", $webinar->description);
        }
        if ($webinar->link) {
            $lines[] = 'LOCATION:' . $webinar->link;
        }
        $lines[] = 'ATTENDEE;CN=' . $user->first_name . ':MAILTO:' . $user->email;
        $lines[] = 'END:VEVENT';
        $lines[] = 'END:VCALENDAR';

        return implode("\r\n", $lines) . "\r\n";
    }
}
