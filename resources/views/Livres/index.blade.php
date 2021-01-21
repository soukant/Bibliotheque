@extends('livres.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Liste Des Livres</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('livres.create') }}"> Create New Livre</a>
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
            <th>Id</th>
            <th>Titre</th>
            <th>Image</th>
            <th>Langue</th>
            <th>Quantité</th>
            <th>Prix</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($livres as $livre)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $livre->titre }}</td>
            <td>{{ $livre->image }}</td>
            <td>{{ $livre->langue }}</td>
            <td>{{ $livre->qte }}</td>
            <td>{{ $livre->prix }}</td>
            
            <td>
                <form action="{{ route('livres.destroy',$livre->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('livres.show',$livre->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('livres.edit',$livre->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $livres->links() !!}
      
@endsection