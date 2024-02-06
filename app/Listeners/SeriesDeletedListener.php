<?php

namespace App\Listeners;

use App\Events\SeriesDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Storage;

class SeriesDeletedListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(SeriesDeleted $event): void
    {
        Storage::disk('public')->delete($event->series_cover);
    }
}
