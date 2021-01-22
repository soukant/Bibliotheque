<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Examplaire;
use App\Categorie;
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
        $examplaire =  Examplaire::all();
        $categories = Categorie::all();
        return view('front.index',['examplaire'=> $examplaire])->with('categories',$categories);
    }
    public function admin()
    {
        return view('admin.dashboard');
    }
}
