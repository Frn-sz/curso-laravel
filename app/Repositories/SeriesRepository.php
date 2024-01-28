<?php

namespace App\Repositories;

use App\Models\Serie;

interface SeriesRepository
{
    public function addSeries(array $data): Serie;
}
