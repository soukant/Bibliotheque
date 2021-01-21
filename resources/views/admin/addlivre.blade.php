@extends('layouts.master')

@section('title')
  About Us
@endsection


@section('content')

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ajouter Livre</h5>
        <button type="button" class="btn-close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true" style="color:white;">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="{{ url('/livres') }} " method="post">
          {{csrf_field() }}
          <div class="form-group">
            <label for="type" class="col-form-label">type</label>
            <input name="type" type="text" class="form-control" id="type">
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

<!--            ---------------------------------------------------------------------       -->



<div class="row">
          <div class="col-md-12">
            <div class="card">
              <div class="card-header  ">
                <h4 class="card-title "> Livres
                <button type="button" class="btn btn-primary m-5" data-toggle="modal" data-target="#exampleModal" > Ajouter Livre </button>
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
                        Type
                      </th>
                    </thead>
                    <tbody>
                    @foreach($livres as $livres)
                      <tr>
                      <td>
                          {{$livres->id_livre}}
                        </td>
                        <td>
                          {{$livres->titre}}
                        </td>
                        <td>
                          {{$livres->langue}}
                        </td>
                        <td>
                          {{$livres->qte}}
                        </td>
                        <td>
                          {{$livres->prix}}
                        </td>
                        <td>
                            <a href='/livres/{{$livres->id_livre}}/edit'  class="btn btn-success"> Edit </a>
                        </td>
                        <td>
                        <form action="{{ url('/livres/'.$livres->id_livre.'/delete') }}" method="post">
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