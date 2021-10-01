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
                            <th class="column-title"> Nom et prenom </th>
                            <th class="column-title"> Nom de la structure </th>
                            <th class="column-title"> Localisations </th>
                            <th class="column-title"> Services clients </th>
                            <th class="column-title"> Statu </th>
                            <th class="column-title"> Messagerie </th>
                            <th class="column-title"> A la une </th>
                            <th class="column-title"> Actions </th>
                        </tr>
                      </thead>


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



@endsection