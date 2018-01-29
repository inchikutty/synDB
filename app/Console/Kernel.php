<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Http\Request;
use App\FunEvents;
use App\ExtAppController;
use Log;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
      $schedule->call(function () {
        Log::info("cron called");
        $funevents = FunEvents::all();
        $request = new Request();
        foreach ($funevents as $funevent ) {
          if($funevent->exteventapp == -1){
            $request->replace($funevent->toArray());
            $res = app('App\Http\Controllers\ExtAppController')->store($request);
            $res = json_decode($res->content());
            Log::info("External Event Created Event Fire: ".$res->id);
            $request->merge(['exteventapp' => $res->id]);
            Log::info($request);
            $response = app('App\Http\Controllers\FunEventsController')->update($request, $request->id);
            Log::info($response);
          }
        }
      })->hourly();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
