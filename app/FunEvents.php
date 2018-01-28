<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FunEvents extends Model
{
    protected $fillable = ['title', 'body', 'date', 'venue', 'price'];
}
