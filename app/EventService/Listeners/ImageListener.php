<?php

namespace App\EventService\Listeners;

use App\EventService\Events\ImageEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Cache;
use Log;

class ImageListener
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
     * @param  ImageEvent  $event
     * @return void
     */
    public function handle(ImageEvent $event)
    {
        // $request = $event->request;
        Log::alert('新增照片成功！',["123"]);

    }
}
