@extends('genres.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Liste Des Genres</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('genres.create') }}"> Create New Genre</a>
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
            <th>Genre</th>
            
            <th width="280px">Action</th>
        </tr>
        @foreach ($genres as $genre)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $genre->genre }}</td>
           
            <td>
                <form action="{{ route('genres.destroy',$genre->id_genre) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('genres.show',$genre->id_genre) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('genres.edit',$genre->id_genre) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $genres->links() !!}
      
@endsection