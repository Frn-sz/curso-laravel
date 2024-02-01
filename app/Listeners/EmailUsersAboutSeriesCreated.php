<?php

namespace App\Listeners;

use App\Models\User;
use App\Events\SeriesCreated as EventsSeriesCreated;
use App\Mail\SeriesCreated;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EmailUsersAboutSeriesCreated implements ShouldQueue
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
    public function handle(EventsSeriesCreated $event): void
    {
        $users_to_send = User::all();

        foreach ($users_to_send as $index => $user) {

            $email = new SeriesCreated(
                $event->seriesName,
                $event->seriesId,
                $event->seasons_qnt,
                $event->episodes_per_season
            );

            $now = now()->addSeconds($index * 2);

            Mail::to($user)->later($now,$email);
        }

    }
}
