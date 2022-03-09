<?php

namespace App\Http\Controllers;

use App\Banque;
use Illuminate\Http\Request;

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
        $banques = Banque::orderBy('created_at', 'desc')->get();
        return view('home', compact('banques'));
    }
}
