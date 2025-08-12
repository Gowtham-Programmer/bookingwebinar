<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    protected $fillable = [
        'webinar_id', 'name', 'email', 'status',
        'amount_cents', 'currency', 'stripe_session_id', 'stripe_payment_intent'
    ];

    public function webinar()
    {
        return $this->belongsTo(Webinar::class);
    }
}
