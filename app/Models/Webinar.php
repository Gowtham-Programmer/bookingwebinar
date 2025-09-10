<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Webinar extends Model
{
    protected $fillable = [
        'title',
        'description',
        'date',
        'time',
        'link',
        'image',
        'price',
    ];
    protected $dates = ['date'];
     // Get start datetime as Carbon instance
    public function getStartDateTimeAttribute()
    {
        return Carbon::parse("{$this->date} {$this->time}");
    }

    // Example: assume 1-hour webinars
    public function getEndDateTimeAttribute()
    {
        return $this->start_date_time->copy()->addHour();
    }

}
