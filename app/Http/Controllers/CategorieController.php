<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Categorie;
class CategorieController extends Controller
{
    public function index()
    {
        $categories = Categorie::all();
        return view('admin.categories',['categories'=>$categories]);
    }
    public function store(Request $request)
    {
        $categorie = new Categorie();
        $categorie->type = $request->input('type');
        $categorie->save();
      return   redirect('/categories');
    }
    public function edit($id)
    {
        $categorie = Categorie::find($id);
        return view('admin.editCategorie',['categorie'=> $categorie]);
    }
    public function update(Request $request,$id)
    {
        $categorie =  Categorie::find($id);
        $categorie->type = $request->input("type");
        $categorie->save();
        return redirect('/categories');
    }
    public function delete(Request $request,$id)
    {
        $categorie =  Categorie::find($id);
        $categorie->delete();
        return redirect('/categories');
    }
}
