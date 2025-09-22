<?php

namespace App\Listeners;

use App\Events\PostAction;
use App\Jobs\SendPostEmail;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;

class SendPostEmailListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\PostAction  $event
     * @return void
     */
    public function handle(PostAction $event)
    {
        Log::info("Event listener called for {$event->subject}");
        SendPostEmail::dispatch($event->subject, $event->message);
    }
}
