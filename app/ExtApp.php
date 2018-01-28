<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ExtApp extends Model
{
    //
    protected $table = 'exteventapp';
    protected $fillable = ['title', 'body', 'date', 'venue', 'price'];
}
