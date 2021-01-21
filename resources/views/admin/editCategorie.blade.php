@extends('layouts.master')




@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">

                <div class="card-header">
                <h3>Edit Categories</h3>
                </div>

                    <div class="card-body">
                   <div class="row">

                   <div class="col-md-6">

                   <form action="/categories/{{ $categorie->id_categorie }}" method="POST">
                       {{ csrf_field()}}
                       {{ method_field('PUT')}}
                    <div class="form-group">

                    <label> Type </label>
                    <input type="text" name="type" value="{{$categorie->type}}" class="form-control">
                    </div>      
    
  
  <button type="submit" class="btn btn-success" style="width=50px;">Modifier</button>
  <a href="/categories" class="btn btn-danger">Cancel</a>
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