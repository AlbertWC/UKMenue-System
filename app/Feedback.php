<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $table = 'feedback';

    public $primaryKey = 'id';

    protected $fillable =['firstname','lastname','email','contact','comment'];
    

}
