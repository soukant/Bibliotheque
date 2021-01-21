@extends('livres.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Livre</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('livres.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('livres.store') }}" method="POST">
    @csrf
  
     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Titre:</strong>
                <input type="text" name="titre" class="form-control" placeholder="Titre">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
    <div class="row "> 
         <label class="col-md-6 mx-auto"> 
         <strong>Select Image: </strong> 
         <input type="file" name="image" class="form-control" required>
        </label> 
    </div>
</form>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Langue:</strong>
                <select class="form-control" name="langue" id="langue" placeholder="Langue">
                                            <option value="FR">Francais</option>
                                            <option value="AR">Arabe</option>
                                            <option value="EN">English</option>
                                            <option value="ES">Espagnol</option>
                                          </select>
                
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Quantité:</strong>
                <input type="text" name="qte" class="form-control" placeholder="Quantité">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Prix:</strong>
                <input type="text" name="prix" class="form-control" placeholder="Prix">
            </div>
        </div>
        
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection