<?php

namespace App\Http\Controllers;

use App\Events\EventCreateSeries;
use App\Events\SeriesDeleted;
use App\Http\Middleware\Authenticator;
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
        $this->middleware(Authenticator::class)->except('index');
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

        $request->validate([
            'cover' => 'nullable|image|mimes:jpeg,jpg,png,svg,gif'
        ]);

        $cover_path = $request->file('cover')->store('series_cover', 'public');

        EventCreateSeries::dispatch(
            $request->name,
            $request->seasons_qnt,
            $request->episodes_per_season,
            $cover_path
        );

        return to_route("series.index")
            ->with('success.message', "Série '{$request->name}' cadastrada com sucesso");
    }

    public function update(SeriesFormRequest $request, Serie $series): RedirectResponse
    {
        $series->update($request->all());

        return to_route("series.index")
            ->with('success.message', "Série '{$series->name}' atualizada com sucesso'");
    }

    public function destroy(Serie $series, Request $request): RedirectResponse
    {
        if ($series->cover)
            SeriesDeleted::dispatch($series->cover);

        $series->delete();

        return to_route('series.index')
            ->with('success.message', "Série '{$series->name}' removida com sucesso.");
    }
}
