<?php

namespace App\Http\Controllers;

use App\Models\Serie;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SeriesController extends Controller
{
    public function index(): View
    {
        $series = Serie::all();

        return view('series.index')->with('series', $series);
    }

    public function create(): View
    {
        return view('series.create');
    }

    public function store(Request $request): RedirectResponse
    {
        $request->validate(["nome" => "required"]);

        $serieName = $request->input("nome");

        $serie = new Serie();

        $serie->nome = $serieName;
        $serie->save();
        return redirect("/series");

    }
}
