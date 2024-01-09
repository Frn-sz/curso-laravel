<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SeriesController extends Controller
{
    public function index(request $request): View
    {
        $series = Serie::all();

        $success_message = $request->session()->get('success.message');

        return view('series.index')->with('series', $series)->with('success_message', $success_message);
    }

    public function create(): View
    {
        return view('series.create');
    }

    public function edit(Request $request, Serie $series)
    {
        return view('series.update')->with('serie', $series);
    }

    public function store(Request $request): RedirectResponse
    {
        $serie = Serie::create($request->all());


        return to_route("series.index")
            ->with('success.message', "Série '{$serie->name}' cadastrada com sucesso");;
    }

    public function update(Request $request, Serie $series): RedirectResponse
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
