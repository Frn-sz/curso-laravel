<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Models\Serie;
use App\Repositories\SeriesRepository;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SeriesController extends Controller
{

    public function __construct(private SeriesRepository $repository)
    {
    }

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

    public function edit(Serie $series): View
    {
        return view('series.update')->with('serie', $series);
    }

    public function store(SeriesFormRequest $request): RedirectResponse
    {
        $series_data = ['name' => $request->name, 'seasons_qnt' => $request->seasons_qnt, 'episodes_per_season' => $request->episodes_per_season];

        $series = $this->repository->addSeries($series_data);

        return to_route("series.index")
            ->with('success.message', "Série '{$series->name}' cadastrada com sucesso");
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
