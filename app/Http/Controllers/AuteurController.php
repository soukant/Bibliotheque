<?php

namespace App\Http\Controllers;

use App\Auteur;
use Illuminate\Http\Request;

class AuteurController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $auteurs = Auteur::latest()->paginate(5);
  
        return view('auteurs.index',compact('auteurs'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auteurs.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
        ]);
  
        Auteur::create($request->all());
   
        return redirect()->route('auteurs.index')
                        ->with('success','Auteur created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Auteur  $auteur
     * @return \Illuminate\Http\Response
     */
    public function show(Auteur $auteur)
    {
        return view('auteurs.show',compact('auteur'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Auteur  $auteur
     * @return \Illuminate\Http\Response
     */
    public function edit(Auteur $auteur)
    {
        return view('auteurs.edit',compact('auteur'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Auteur  $auteur
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Auteur $auteur)
    {
        $request->validate([
            'nom' => 'required',
            'prenom' => 'required',
        ]);
  
        $auteur->update($request->all());
  
        return redirect()->route('auteurs.index')
                        ->with('success','Auteur updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Auteur  $auteur
     * @return \Illuminate\Http\Response
     */
    public function destroy(Auteur $auteur)
    {
        $auteur->delete();
  
        return redirect()->route('auteurs.index')
                        ->with('success','Auteur deleted successfully');
    }
}
