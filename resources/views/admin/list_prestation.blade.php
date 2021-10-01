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
                    <h2>Liste des prestations<small></small></h2>
                    <ul class="panel_toolbox">
                       <li data-toggle="modal" data-target="#exampleModalAdd" class="btn btn-info">Ajouter une prestation</li>
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
                            <th>  </th>
                            <th> Nom de la prestation </th>
                            <th> Statu </th>
                            
                            <th>  </th>
                        </tr>
                      </thead>
                      @if($prestations)
                      @foreach($prestations as $items)
                      <tr>
                        <td> <img src=""/></td>
                        <td> {{ $items->name }} </td>
                        <td>{{ $items->statu }} </td>
                        <td>  </td>
                      </tr>
                      @endforeach

                      @endif


                      <tbody>
                      
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

<!-- Modal -->
<div class="modal fade" id="exampleModalAdd" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Ajouter une nouvelle prestation<b></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
      <h4 class="text-center"></b></h4> 
      <div class="">
        <form method="POST" action="/save/prestation" enctype="multipart/form-data">
        @csrf
        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"
                for="first-name">Designation <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="text" name="name" class="form-control " required>
            </div>
        </div>

        <div class="item form-group">
            <label class="col-form-label col-md-3 col-sm-3 label-align"
                for="first-name">Icone <span class="required">*</span>
            </label>
            <div class="col-md-6 col-sm-6 ">
                <input type="file" name="image" class="form-control " required>
            </div>
        </div>

        <div class="item form-group">
            <label for="middle-name"
                class="col-form-label col-md-3 col-sm-3 label-align">Description</label>
            <div class="col-md-6 col-sm-6 ">
                <textarea rows="8" name="description" class="form-control" required></textarea>
            </div>
        </div>
        
        
        
        
      </div>
      </div>
      <div class="modal-footer-btn">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
        <button type="submit" class="btn btn-success">Valider</button>
        </form>
      </div>
    </div>
  </div>
</div>



@endsection