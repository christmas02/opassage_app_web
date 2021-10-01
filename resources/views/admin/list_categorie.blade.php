@extends('admin/layout/master')

@section('content') 
<!-- page content -->
<div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><small></small></h3>
              </div>

            </div>

            <div class="clearfix"></div>

            <div class="row">
              <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                  <div class="x_title">
                    <h2>Liste des categories <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li><a href="#" data-toggle="modal" data-target="#nouvelleCategorie" class="btn btn-md btn-primary"> Nouvelle categorie </a></li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @elseif(Session::has('danger'))
                        <div class="alert alert-danger">{{ Session::get('danger') }}</div>
                        @endif
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                   
                    <div class="table-responsive">
                      <table id="datatable" class="table table-striped jambo_table bulk_action"style="width:100%">
                      <thead>
                        <tr class="headings">
                            <th></th>
                            <th> Icones </th>
                            <th> Designation </th>
                            <th> Description </th>
                            
                            
                            <th> Actions </th>
                        </tr>
                      </thead>


                      <tbody>
                      @if($categories)
                            @foreach($categories as $items)
                                <tr>
                                    <td> </td>
                                    
                                    
                                    <td><img src="{{asset('spotevent/public/storage/'.$items->path_icone) }}" width="30"> </td>
                                    <td> {{ $items->name }}</td>
                                    <td> {{ $items->description }}</td>
                                    

                                    
                                    <td>
                                        <div class="">
                                            <a href="#" data-toggle="modal" data-target="#edite{{$items->id}}" class="btn btn-modal"><i class="fa fa-pencil"></i></a>
                                        </div> 
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                      </tbody>

                    </table>
                  </div>
                  </div>
              </div>
            </div>
            
          </div>
        </div>

              

              

              

                </div>
              </div>
            </div>
    </div>
</div>
<!-- /page content -->

@foreach($categories as $items)
<!-- Modal -->
<div class="modal fade" id="edite{{$items->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
      <h4 class="text-center"></b></h4> 
      <center><h3>Mise a jour de la categorie <b>{{ $items->name }}</b></h3></center>
      <hr>
      <div class="silde">
      
        <form method="POST" action="/update/categorie">
        @csrf
        
            <input type="text" hidden name="id" value="{{$items->id}}">
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                   Titre <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 ">
                    <input type="text" name="name" class="form-control" value="{{$items->name}}">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                   Description <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 ">
                    <textarea rows="10" name="description" class="form-control">
                      {{$items->description}}
                    </textarea>
                </div>
            </div>
            
        
   

        
      </div>
      </div>
      <div class="modal-footer-btn">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-success">Valider</button>
      </div>
      </form>
    </div>
  </div>
</div>
@endforeach


@foreach($categories as $items)
<!-- Modal -->
<div class="modal fade" id="exampleModalDelet{{$items->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Suppression du compte</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h5 class="text-center">Etre vous sur de vouloir supprimer le compte de {{ $items->name }}</h5>
      </div>
      <div class="modal-footer-btn">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">fermer</button>
        <button type="button" class="btn btn-danger">Supprimer</button>
      </div>
    </div>
  </div>
</div>
@endforeach

<!-- NOUVELLE CATEGORIE -->
<div class="modal fade" id="nouvelleCategorie" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-body">
      <h4 class="text-center"></b></h4> 
      <center><h3>Ajouter une nouvelle categorie</b></h3></center>
      <hr>
      <div class="silde">
      
        <form method="POST" action="/save/categorie" enctype="multipart/form-data">
        @csrf
        
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                   Titre <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 ">
                    <input type="text" name="name" class="form-control" value="">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                   Icone <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 ">
                    <input type="file" name="file" class="form-control" value="">
                </div>
            </div>
            <div class="item form-group">
                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                   Description <span class="required">*</span>
                </label>
                <div class="col-md-9 col-sm-9 ">
                    <textarea rows="10" name="description" class="form-control">
                      
                    </textarea>
                </div>
            </div>
            
        
   

        
      </div>
      </div>
      <div class="modal-footer-btn">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-success">Valider</button>
      </div>
      </form>
    </div>
  </div>
</div>




@endsection