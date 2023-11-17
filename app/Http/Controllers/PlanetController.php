<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PlanetController extends Controller
{
    public function index()
    {
        $planets = DB::table('planets')->get();
        return view('planets.index', ['planets' => $planets]);
    }

    public function show($planet)
    {
        $planetData = DB::table('planets')->where('name', $planet)->first();

        if (!$planetData) {
            return redirect('/planets');
        }

        return view('planets.show', ['planet' => $planetData]);
    }
}
