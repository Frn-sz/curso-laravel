<?php

namespace App\Listeners;

use App\Events\EventCreateSeries;
use App\Events\SeriesCreated;
use App\Repositories\SeriesRepository;

class SeriesCreateListener
{
    /**
     * Create the event listener.
     */
    public function __construct(private SeriesRepository $repository)
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(EventCreateSeries $event): void
    {
        $series_data = [
            'name' => $event->seriesName,
            'seasons_qnt' => $event->seasons_qnt,
            'episodes_per_season' => $event->episodes_per_season
        ];

        $series = $this->repository->addSeries($series_data);

        SeriesCreated::dispatch(
            $series->name,
            $series->id,
            $event->seasons_qnt,
            $event->episodes_per_season
        );


    }
}
