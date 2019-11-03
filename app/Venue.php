<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Venue extends Model
{
    //Table Name
    protected $table = 'venues';
    //primary key
    public $primaryKey = 'venue_id';
    
    public function calendar()
    {
        return $this->hasMany('App\Calendar', 'venue_id', 'venue_id');
    }

}
