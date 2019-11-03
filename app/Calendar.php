<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Calendar extends Model
{
    protected $table = 'calendars';
    protected $fillable  = ['venue_id','user_id','title', 'color', 'start_date', 'end_date'];
    public function venue()
    {
        return $this->belongsTo('App\Venue', 'venue_id', 'venue_id');
    }
    public function user()
    {
        return $this->belongsTo('App\User', 'id', 'user_id');
    }
}

