<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
use App\Examplaire;

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
        $categories= Categorie::all();
        $examplaires= Examplaire::all();
        return view('front.index')->with('categories',$categories)->with('examplaire',$examplaires);
    }
    public function admin()
    {
        return view('admin.dashboard');
    }
}
