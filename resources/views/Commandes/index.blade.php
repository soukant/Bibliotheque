@extends('commandes.layout')
 
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Commande</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('commandes.create') }}"> Create New Product</a>
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
            <th>Date</th>
            
            <th width="280px">Action</th>
        </tr>
        @foreach ($commandes as $commande)
        <tr>
            <td>{{ ++$i }}</td>
            <td>{{ $commande->date }}</td>
            
            <td>
                <form action="{{ route('commandes.destroy',$commande->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('commandes.show',$commande->id) }}">Show</a>
    
                    <a class="btn btn-primary" href="{{ route('commandes.edit',$commande->id) }}">Edit</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </table>
  
    {!! $commandes->links() !!}
      
@endsection