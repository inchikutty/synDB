<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Event;

class FunEvents extends Model
{
    protected $table = 'fun_events';
    protected $fillable = ['title', 'body', 'date', 'venue', 'price'];
    public static function boot() {



	    parent::boot();



	    static::created(function($funevent) {

	        Event::fire('funevent.created', $funevent);

	    });



	    static::updated(function($funevent) {

	        Event::fire('funevent.updated', $funevent);

	    });



	    static::deleted(function($funevent) {

	        Event::fire('funevent.deleted', $funevent);

	    });

	}
}
