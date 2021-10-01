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

function Hotel($id){
    $date = \App\Hotel::where('id_user',$id)->first();
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
                        <h2>Liste des Agents <small></small></h2>
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
                                                    <th> Designation </th>
                                                    <th> Agent </th>
                                                    <th> Localisation </th>
                                                    <th> Categorie </th>
                                                    <th> Montant </th>
                                                    <th> Jour de disponibilite </th>
                                                
                                                    <th></th>
                                                    
                                                </tr>
                                            </thead>
                                            @if($espaces)
                                            @foreach($espaces as $itmes)
                                            <tr>
                                                <td>
                                                    <div style="width: 40px;">
                                                      <img src="{{asset('/storage/'.$itmes->path_un)}}" style="width: 40px;">
                                                    </div>
                                                </td>
                                                <td>{{ $itmes->designation }} / <b>{{ Hotel($itmes->id_user)['name'] }} </b></td>
                                                <td>{{ Agent($itmes->id_user)->name }}</td>
                                                <td>{{ $itmes->localisation }}</td>
                                                <td>{{ typeEpace($itmes->type)['libelle'] }}</td>
                                                <td>{{ $itmes->montant }} XOF</td>
                                                <td>
                                                @foreach(dateDispo($itmes->matricule) as $date)
                                                    {{ jour($date->periode)['libelle'] }},
                                                @endforeach
                                                
                                                </td>
                                                <td>
                                                    <button href="" data-toggle="modal"
                                                        data-target="#exampleModalDeletImage{{$itmes->id}}"
                                                        class="btn btn-sm btn-danger btn-rounded"><i
                                                            class="fa fa-trash"></i></button>
                                                    <a href="/detail_espace/{{ $itmes->id }}" class="btn btn-sm btn-primary btn-rounded"><i class="fa fa-eye"></i></a>
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

@foreach($espaces as $items)
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