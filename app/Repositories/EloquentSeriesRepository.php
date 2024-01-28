<?php

namespace App\Repositories;

use App\Models\Episode;
use App\Models\Season;
use App\Models\Serie;
use Illuminate\Support\Facades\DB;

class EloquentSeriesRepository implements SeriesRepository
{
    public function addSeries(array $series_data): Serie
    {
        return DB::transaction(function () use ($series_data) {
            $series = Serie::create($series_data);
            $seasons = [];

            for ($i = 1; $i <= $series_data['seasons_qnt']; $i++) {
                $seasons[] = ['series_id' => $series->id, 'number' => $i];
            }

            Season::insert($seasons);

            $episodes = [];

            foreach ($series->seasons as $season)
                for ($j = 1; $j <= $series_data['episodes_per_season']; $j++)
                    $episodes[] = ['season_id' => $season->id, 'number' => $j];

            Episode::insert($episodes);

            return $series;
        }, 5);


    }
}
