@extends('layouts.master')

@section('title')
  About Us
@endsection


@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter Examplaire</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" style="color:white;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/examplaires') }} " method="post"  enctype="multipart/form-data">
          {{csrf_field() }}
          <div class="form-group">
            <label for="Titre" class="col-form-label">Titre</label>
            <input name="titre" type="text" class="form-control" id="Titre">
          </div>
          <div class="form-group">
            <label for="description" class="col-form-label">Description</label>
            <textarea  name ="description" class="form-control" id="description"></textarea>
          </div>
          <div class="form-group">
            <label for="Category" class="col-form-label">Category:</label> <br>
            <select class="form-control" name ="select" id="Category">
            @foreach($categories as $categorie)
              <option value='{{$categorie->id_categorie}}'> {{$categorie->type}}</option>
           @endforeach
           </select>
          </div>
          <div class="input-group">
            <input type="file" class="form-control" name="pdf" id="inputGroupFile04" aria-describedby="inputGroupFileAddon04" aria-label="Upload">
          </div>
          <div class="form-group">
            <label for="Genre" class="col-form-label">Genre:</label> <br>
            <select class="form-control" name ="genre" id="Genre">
            @foreach($genres as $genre)
              <option value='{{$genre->id_genre}}'> {{$genre->genre}}</option>
           @endforeach
           </select>
          </div>
          <div class="form-group">
            <label for="Auteur" class="col-form-label">Auteur:</label> <br>
            <select class="form-control" name ="auteur" id="Auteur">
            @foreach($auteurs as $auteur)
              <option value='{{$auteur->id_auteur}}'> {{$auteur->nom}}  {{$auteur->prenom}}</option>
           @endforeach
           </select>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <input type="submit" class="btn btn-primary bg-success" value="Ajouter">  
      </div>
      </form>
    </div>
  </div>
</div>



<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header  ">
                <h4 class="card-title "> EXAMPLAIRE
                <button type="button" class="btn btn-primary m-5" data-toggle="modal" data-target="#exampleModal" > Ajouter Examplaire </button>
                </h4>
              </div>
              <div class="card-body">
                <div class="table-responsive">
                  <table class="table">
                    <thead class=" text-primary">
                      <th>
                        Id
                      </th>
                      <th>
                        Titre
                      </th>
                      <th>
                      Description
                        </th>
                      <th >
                        Category
                      </th>
                      <th >
                        Disponibilite
                      </th>
                      <th >
                        Genre
                      </th>
                      <th >
                        Auteur
                      </th>
                      <th >
                        Quantité
                      </th>
                      <th >
                        Prix
                      </th>
                      <th >
                        Image
                      </th>
                      <th >
                        Modifier
                      </th>
                      <th >
                        Supprimer
                      </th>
                    </thead>
                    <tbody>
                    @foreach($examplaires as $examplaire)
                      <tr>
                      <td>
                          {{$examplaire->id}}
                        </td>
                        <td>
                          {{$examplaire->titre}}
                        </td>
                        <td>
                        {{$examplaire->description}}
                        </td>
                        <td>
                        @foreach($categories as $categorie)
                          @if  ($categorie->id_categorie === $examplaire->categorie_id)
                          {{$categorie->type}}
                          @endif
                        @endforeach
                        </td>
                        @if ( $examplaire->is_disponible === 1)
                        <td>
                            Disponible
                        </td>
                        @else
                        <td>
                            Indisponible
                        </td>
                        @endif
                        <td>
                        @foreach($genres as $genre)
                          @if  ($genre->id_genre === $examplaire->genre_id)
                          {{$genre->genre}}
                          @endif
                        @endforeach
                        </td>
                        <td>
                        @foreach($auteurs as $auteur)
                          @if  ($auteur->id_auteur === $examplaire->auteur_id)
                          {{$auteur->nom}} {{$auteur->prenom}}
                          
                          @endif
                        @endforeach
                        </td>
                        <td>
                          {{$examplaire->qte}}
                        </td>
                        <td>
                          {{$examplaire->prix}}
                        </td>
                        <td>
                          {{$examplaire->image}}
                        </td>
                        <td>
                            <a href='/examplaires/{{$examplaire->id}}/edit'  class="btn btn-success"> Edit </a>
                        </td>
                        <td>
                        <form action="{{ url('/examplaires/'.$examplaire->id.'/delete') }}" method="post">
                            {{ csrf_field()}}
                            {{ method_field('DELETE')}}
                            <input type="submit" class="btn btn-danger" value="Delete"> 
                            </form>
                        </td>
                      </tr>
                      @endforeach
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
         

@endsection


@section('scripts')

@endsection
