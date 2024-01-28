<?php

namespace App\Http\Controllers;

use App\Models\Episode;
use App\Models\Season;
use http\Env\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class EpisodesController extends Controller
{
    public function index(Season $season): View
    {
        return view('episodes.index',
            ['season' => $season,
                'success_message' => session('success_message')]);
    }

    public function update(Request $request, Season $season)
    {
        $watchedEpisodes = $request->getForm('episodes');

        if (!$watchedEpisodes) {
            $watchedEpisodes = array();
        }

        DB::transaction(function () use ($request, $season, $watchedEpisodes) {

            Episode::whereIn('id', $watchedEpisodes)->where('season_id', '=', $season->id)->update(['watched' => true]);
            Episode::whereNotIn('id', $watchedEpisodes)->where('season_id', '=', $season->id)->update(['watched' => false]);
        }, 5);


        return to_route('episodes.index', $season->id)->with('success_message', 'Episódios atualizados!');
    }
}
