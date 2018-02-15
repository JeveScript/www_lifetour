<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SemSenke extends Model
{
    protected $fillable = [
        'name', 
        'phone', 
        'hmsr', 
        'date', 
        'time', 
        'ip', 
        'type',
        'refferrer', 
        'location', 
        'content'
    ];
}


