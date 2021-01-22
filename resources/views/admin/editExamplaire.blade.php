@extends('layouts.master')




@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                <h3>Edit Role</h3>
                </div>

                    <div class="card-body">
                   <div class="row">

                   <div class="col-md-6">

                   <form action="/examplaires/{{ $examplaire->id }}" method="POST">
                       {{ csrf_field()}}
                       {{ method_field('PUT')}}
                    <div class="form-group">

                    <label> Titre </label>
                    <input type="text" name="titre" value="{{$examplaire->titre}}" class="form-control">
                    <label> Description </label>
                    <input type="textarea" name="description" value="{{$examplaire->description}}" class="form-control">
                    

</div>      
    <label > Category </label>
<select name="select" class="form-control">
@foreach($categories as $categorie)
        @if($categorie->id_categorie === $examplaire->categorie_id)
        <option value="{{$categorie->id_categorie}}" selected="selected"> {{$categorie->type}} </option>
        @else
        <option value="{{$categorie->id_categorie}}"> {{$categorie->type}} </option>
        @endif
   
@endforeach
</select>
<label > Genre </label>
<select name="genre" class="form-control">
@foreach($genres as $genre)
        @if($genre->id_genre === $examplaire->genre_id)
        <option value="{{$categorie->id_categorie}}" selected="selected"> {{$genre->genre}} </option>
        @else
        <option value="{{$genre->id_genre}}"> {{$genre->genre}} </option>
        @endif
   
@endforeach
</select>
</select>
<label > Auteur </label>
<select name="auteur" class="form-control">
@foreach($auteurs as $auteur)
        @if($auteur->id_auteur === $examplaire->auteur_id)
        <option value="{{$categorie->id_auteur}}" selected="selected"> {{$auteur->nom." " }}{{$auteur->prenom}} </option>
        @else
        <option value="{{$auteur->id_auteur}}">{{$auteur->nom." " }}{{$auteur->prenom}}</option>
        @endif
   
@endforeach
</select>
<label> QTE </label>
<input type="textarea" name="qte" value="{{$examplaire->qte}}" class="form-control">
<label> Prix </label>
<input type="textarea" name="prix" value="{{$examplaire->prix}}" class="form-control">
  <button type="submit" class="btn btn-success" style="width=50px;">Modifier</button>
  <a href="/examplaires" class="btn btn-danger">Cancel</a>
  </div>

</form>
                   </div>
                   </div>
                </div>
</div>
</div>
</div>


@endsection


@section('scripts')

@endsection