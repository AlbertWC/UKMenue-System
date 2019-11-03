<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    //table
    protected $table = 'events';
    //  
    public $primaryKey = 'id';

    protected $fillable = ['eventname', 'eventdescription', 'eventorganizer', 'venue_id', 'created_at', 'updated_at'];
}
