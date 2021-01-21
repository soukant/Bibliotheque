<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LivreController extends Controller
{  
    public function index()
    {
    $livres = Livre::all();
    $auteur = Auteur::all();
    $genre = Genres::all();
    return view('admin.livre',['livres'=>$livres]);
    }

    public function store(Request $request)
    {
        $livres = new Livre();
        $livres->titre = $request->input('titre');
        $livres->langue = $request->input('langue');
        $livres->qte = $request->input('qte');
        $livres->prix = $request->input('prix');
        $livres->save();
      return   redirect('/livres');
    }
}
