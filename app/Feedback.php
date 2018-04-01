<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feedback extends Model
{
    protected $fillable = [
        'email', 'platform', 'appversion', 'deviceversion', 
        'feedback', 'score',
    ];
}
