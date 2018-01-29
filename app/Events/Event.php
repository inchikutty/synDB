<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Http\Request;
use App\FunEvents;
use App\ExtAppController;
use GuzzleHttp\Client;
use Log;

class Event
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
     public function funEventCreated(FunEvents $funevent)

    {
        Log::info("Fun Event Created Event Fire: ".$funevent);
        $request = new Request();
        $request->replace($funevent->toArray());
        $res = app('App\Http\Controllers\ExtAppController')->store($request);
        $res = json_decode($res->content());
        Log::info("External Event Created Event Fire: ".$res->id);
        $request->merge(['exteventapp' => $res->id]);
        Log::info($request);
        $response = app('App\Http\Controllers\FunEventsController')->update($request, $request->id);
        Log::info($response);


    }



    /**

     * Get the channels the event should broadcast on.

     *

     * @return \Illuminate\Broadcasting\Channel|array

     */

    public function funEventUpdated(FunEvents $funevent)

    {

        Log::info("Fun event Updated Event Fire: ".$funevent);
        $request = new Request();
        $request->replace($funevent->toArray());
        $response = app('App\Http\Controllers\ExtAppController')->update($request, $request->exteventapp);
        Log::info("Associated External event deleted.".$response);

    }



    /**

     * Get the channels the event should broadcast on.

     *

     * @return \Illuminate\Broadcasting\Channel|array

     */

    public function funEventDeleted(FunEvents $funevent)

    {

        Log::info("Fun event Deleted Event Fire: ".$funevent);
        $request = new Request();
        $request->replace($funevent->toArray());
        $response = app('App\Http\Controllers\ExtAppController')->delete($request, $request->exteventapp);
        Log::info("Associated External event deleted.".$response);

    }
}
