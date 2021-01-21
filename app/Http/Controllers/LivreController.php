<?php

namespace App\Http\Controllers;

use App\Livre;
use Illuminate\Http\Request;

class LivreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $livres = Livre::latest()->paginate(5);
  
        return view('livres.index',compact('livres'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('livres.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->image->getClientOriginalName()){
            $ext = $request->image->getClientOriginalExtension();
            $file = date('YmdHis').rand(1,99999).'.'.$ext;
            $request->image->move(public_path("livres"),$file);
        }else{
            $file='';
        }
        $livre->image = $file;
        $request->validate([
            'titre' => 'required',
            'image' => 'required',
            'langue' => 'required',
            'qte' => 'required',
            'prix' => 'required',
            
        ]);
  
        Livre::create($request->all());
   
        return redirect()->route('livres.index')
                        ->with('success','Livre created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Livre  $livre
     * @return \Illuminate\Http\Response
     */
    public function show(Livre $livre)
    {
        return view('livres.show',compact('livre'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Livre  $livre
     * @return \Illuminate\Http\Response
     */
    public function edit(Livre $livre)
    {
        return view('livres.edit',compact('livre'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Livre  $livre
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Livre $livre)
    {
        $request->validate([
            'titre' => 'required',
            'image' => 'required',
            'langue' => 'required',
            'qte' => 'required',
            'prix' => 'required',
        ]);
  
        $livre->update($request->all());
  
        return redirect()->route('livres.index')
                        ->with('success','Livre updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Livre  $livre
     * @return \Illuminate\Http\Response
     */
    public function destroy(Livre $livre)
    {
        $livre->delete();
  
        return redirect()->route('livres.index')
                        ->with('success','Livre deleted successfully');
    }
}
