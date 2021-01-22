<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use App\Examplaire;
use App\Categorie;
use App\Auteur;
use App\Genre;
class ExamplaireController extends Controller
{
    public function index()
    {
        $examplaires =  Examplaire::all();
        $categories = Categorie::all();
        $auteurs = Auteur::all();
        $genres = Genre::all();
        return view('admin.examplaires',['examplaires'=>$examplaires])->with("categories",$categories)->with("auteurs",$auteurs)->with("genres",$genres);
    }
    public function store(Request $request)
    {
        $examplaire = new Examplaire();
        $examplaire->titre = $request->input('titre');
        $examplaire->description = $request->input('description');
        $examplaire->categorie_id = $request->input('select');  
        if($request->hasFile('pdf'))
            $examplaire->pdf = $request->pdf->store('pdfs');
        $examplaire->is_disponible = 1;
        $examplaire->genre_id = $request->input('genre');
        $examplaire->auteur_id = $request->input('auteur');
        $examplaire->qte = $request->input('qte');
        $examplaire->prix = $request->input('prix');
        if($request->hasFile('image'))
            $examplaire->image = $request->image->store('imgs');
        
        $examplaire->save();
        //return $request->all();
           return   redirect('/examplaires');
    }
    public function edit($id)
    {
        $examplaire =  Examplaire::find($id);
        $categories = Categorie::all();
        $auteurs = Auteur::all();
        $genres = Genre::all();
        return view('admin.editExamplaire',['examplaire'=> $examplaire])->with('categories',$categories)->with("auteurs",$auteurs)->with("genres",$genres);
    }
    public function update(Request $request,$id)
    {
        $examplaire =  Examplaire::find($id);
        $examplaire->titre = $request->input("titre");
        $examplaire->description = $request->input("description");
        $examplaire->categorie_id = $request->input("select");
        $examplaire->genre_id = $request->input("genre");
        $examplaire->auteur_id = $request->input("auteur");
        $examplaire->qte = $request->input("qte");
        $examplaire->prix= $request->input("prix");
        $examplaire->is_disponible = 1;
        $examplaire->save();
        return redirect('/examplaires');
    }
    public function delete(Request $request,$id)
    {
        $examplaire =  Examplaire::find($id);
        $examplaire->delete();
        return redirect('/examplaires');
    }
}