<?php

namespace App\Listeners;

use App\Events\VideoViewer;
use App\Models\Video;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class IncreaseCounter
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
     * @param  object  $event
     * @return void
     */
    public function handle(VideoViewer $event)
    {
        $this->updateviewr($event->video);
    }

    function updateviewr($video){

        $video->viewer = $video->viewer +1 ;
        $video->save();

    }
}
