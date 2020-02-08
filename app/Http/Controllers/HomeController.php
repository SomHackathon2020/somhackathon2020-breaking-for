<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

use App\{
    Http\Requests\CreateHomeRequest, Home,
};

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $homes = Home::all();
        $title = 'Listado de casas';
        return view('home', compact('title', 'homes'));
    }

    public function create()
    {
        return view('create');
    }

    public function store(CreateHomeRequest $request)
    {
        $request->createHome();

        return redirect()->route('home');
    }

    
}
