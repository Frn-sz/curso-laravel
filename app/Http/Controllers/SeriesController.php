<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Episode;
use App\Models\Season;
use App\Models\Serie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SeriesController extends Controller
{
    public function index(request $request): View
    {
        $series = Serie::with('seasons')->get();

        $success_message = $request->session()->get('success.message');

        return view('series.index')->with('series', $series)->with('success_message', $success_message);
    }

    public function create(): View
    {
        return view('series.create');
    }

    public function edit(Serie $series)
    {
        return view('series.update')->with('serie', $series);
    }

    public function store(SeriesFormRequest $request): RedirectResponse
    {

        $series = Serie::create($request->all());
        $seasons = [];

        for ($i = 1; $i <= $request->seasons_qnt; $i++) {
            $season[] = ['series_id' => $series->id, 'number' => $i];
        }

        Season::insert($season);

        $episodes = [];

        foreach ($series->seasons as $season)
            for ($j = 1; $j <= $request->episodes_per_season; $j++)
                $episodes[] = ['season_id' => $season->id, 'number' => $j];

        Episode::insert($episodes);

        return to_route("series.index")
            ->with('success.message', "Série '{$series->name}' cadastrada com sucesso");;
    }

    public function update(SeriesFormRequest $request, Serie $series): RedirectResponse
    {
        $series->update($request->all());

        return to_route("series.index")
            ->with('success.message', "Série '{$series->name}' atualizada com sucesso'");
    }

    public function destroy(Serie $series, Request $request): RedirectResponse
    {
        $series->delete();

        return to_route('series.index')
            ->with('success.message', "Série '{$series->name}' removida com sucesso.");
    }
}
