@extends('auteurs.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Auteur</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('auteurs.create') }}"> Create New Auteur</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>Nom</th>
            <th>Prenom</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($auteurs as $auteur)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $auteur->nom }}</td>
            <td>{{ $auteur->prenom }}</td>
            <td>
                <form action="{{ route('auteurs.destroy',$auteur->id_auteur) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('auteurs.show',$auteur->id_auteur) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('auteurs.edit',$auteur->id_auteur) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $auteurs->links() !!}
      
@endsection