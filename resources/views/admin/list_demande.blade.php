@extends('admin/layout/master')

@section('content') 
<style>
.btn-modal{
    background-color: #ccc;
    color: gray;
    border-radius: 50%;
}
.form-check-input{

}
input:checked + .slider {
  background-color: #2196F3;
}
label{
    font-size: 18px;
    text-align: center;
}
.silde{
    margin: 0 190px;
}
.modal-title{
    
    color: #fff;
    
}
.modal-header{
    background-color: gray;
    text-align: right !important;
}
.modal-footer-btn{
    margin: 20px 38%;

}
.form-check-label{
  margin-left: 5px;
}
</style>
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
                    <h2>Liste des reservations <small></small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      
       
                      
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                      <div class="row">
                          <div class="col-sm-12">
                            <div class="card-box table-responsive">
                   
                    
                    <div class="table-responsive">
                      <table id="datatable" class="table table-striped jambo_table bulk_action"style="width:100%">
                      <thead>
                        <tr class="headings">
                            <th class="column-title"> Nom et prenom Client</th>
                            <th class="column-title"> Contact Client</th>
                            <th class="column-title"> Prestatire</th>
                            <th class="column-title"> Messagerie </th>
                            <th class="column-title">  </th>
                        </tr>
                      </thead>


                      <tbody>
                          @if($allDemande)
                          @foreach($allDemande as $items)
                          <tr>
                              <td>{{ $items->name }}</td>
                              <td>{{ $items->phone }} / {{ $items->email }}</td>
                              <td>{{ $items->prestation }} / <strong>{{ $items->prestataire }}</strong></td>
                              <td>{{ $items->message }} </td>
                              <td>
                              <a href="#" data-toggle="modal" data-target="#exampleModalDemande{{$items->id}}" class="btn btn-modal"><i class="fa fa-eye"></i></a>
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

<!-- Modal demande formulaire -->
@foreach($allDemande as $items)
<div class="modal fade" id="exampleModalDemande{{$items->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      
      <div class="modal-body">
        <strong>Client </strong>
        <h6>{{ $items->name }} / {{ $items->phone }}</h6>
        <hr>
        <strong>Prestataire </strong>
        <h6>{{ $items->prestation }} / {{ $items->prestataire }}</h6>
        <hr>
        <strong>Message</strong><h6>{{ $items->message }}</h6>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
      </div>
    </div>
  </div>
</div>
@endforeach


@section('extra-js')
    <script>
      $(document).ready(function(){
            var user_id = e.target.value;
            $('#myModal').modal('show')
            
            //ajax
            $.get('/ajax_souscategorie?cat_id='+ cat_id, function(data){
              //success data
              console.log(data);
              $('#souscategorie').empty();
              $.each(data, function(index, subcatObj){
                $('#souscategorie').append('<option value="'+subcatObj.id+'">'+subcatObj.name+'</option>');
              });
            });

      })

      $(".save-data").click(function(event){
        $('#myModal').modal('show')

      
      });
    </script>
@endsection



@endsection