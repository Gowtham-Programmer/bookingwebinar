<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class WebinarBooking extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'webinar_id','first_name', 'surname', 'email', 'phone',];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function webinar() {
        return $this->belongsTo(Webinar::class);
    }
    
}
