@extends('admin/layout/master')

<?php 

function dateDispo($matricule){
    $date = \App\Disponibilite::where('id_espace',$matricule)->get();
    return $date;
}

function jour($periode){
    $date = \App\Periode::where('jours',$periode)->first();
    return $date;
}

function typeEpace($id){
    $date = \App\Type::where('id',$id)->first();
    return $date;
}

function Agent($id){
    $date = \App\User::where('id',$id)->first();
    return $date;
}


?>


@section('content')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tableau de bord</h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5   form-group pull-right top_search">
                    <div class="input-group">

                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Liste des Hotels / Epaces <small></small></h2>
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
                                        <table id="datatable" class="table table-striped jambo_table bulk_action"
                                            style="width:100%">
                                            <thead>
                                                <tr class="headings">
                                                    <th>  </th>
                                                    <th> Hotel / espace </th>
                                                    <th> Agent </th>
                                                    <th> Telephone </th>                                                
                                                    <th></th>
                                                    
                                                </tr>
                                            </thead>
                                            @if($hotels)
                                            @foreach($hotels as $itmes)
                                            <tr>
                                                <td>
                                                    <div style="width: 40px;">
                                                      <img src="{{asset('/storage/'.$itmes->logo)}}" style="width: 40px;">
                                                    </div>
                                                </td>
                                                <td>{{ $itmes->hotel }}</td>
                                                <td>{{ $itmes->name }}</td>
                                                <td>{{ $itmes->phone }}</td>
                                                
                                                </td>
                                                <td>
                                                    <button href="" data-toggle="modal"
                                                        data-target="#exampleModalDeletImage{{$itmes->id}}"
                                                        class="btn btn-sm btn-danger btn-rounded"><i
                                                            class="fa fa-trash"></i></button>
                                                    <a href="/detail_hotel/{{ $itmes->id }}" class="btn btn-sm btn-primary btn-rounded"><i class="fa fa-eye"></i></a>
                                                </td>

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
<!-- /page content -->

@foreach($hotels as $items)
<!-- Modal suppression une image -->
<div class="modal fade" id="exampleModalDeletImage{{$items->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">

            <div class="modal-body">
                <form method="POST" action="/delet/user" enctype="">
                    @csrf
                    <div class="trash"><i class="fa fa-trash"></i></div>
                    <center>
                        <h4>Voulez-vous vraiment effectuer cette action !</h4>
                    </center>
                    <input type="text" hidden name="id" value="{{$items->id}}">

            </div>
            <div class="modal-footer-btn">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-danger">Valider</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach


@endsection