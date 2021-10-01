@extends('admin/layout/master')

<?php 
    function gestPrestation($id){
        $prestation = \App\Fiche::where('id_user',$id)->first();
        return $prestation;
    }

    function gestCategorie($id){
        $categorie = \App\Prestation::where('id',$id)->first();
        return $categorie;
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
                        <h2>Liste des Prestataires <small></small></h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li style="color: #fff;"><a href="/utilisateurs/{{ $infoUser->id }}"
                                    class="btn btn-info">Utilisateurs</a></li>
                            <li><a href="/listPrestatiaire/{{ $infoUser->id }}" class="btn btn-danger">Prestataires</a>
                            </li>
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
                                        <table id="datatable" class="table table-striped jambo_table bulk_action"
                                            style="width:100%">
                                            <thead>
                                                <tr class="headings">
                                                    <th> Nom et prénoms </th>
                                                    <th> Adresse e-mail </th>
                                                    <th> Téléphone </th>
                                                    <th> Rôle </th>
                                                    <th> Profil </th>
                                                    <th> Date d'inscriptio </th>
                                                    <th> Fiche prestataire </th>
                                                    <th> Catégorie </th>
                                                    <th></th>
                                                </tr>
                                            </thead>
                                            @if($Prestataire)
                                            @foreach($Prestataire as $itmes)
                                            <tr>
                                                <td>{{ $itmes->name }}</td>
                                                <td>{{ $itmes->email }}</td>
                                                <td>{{ $itmes->phone }}</td>
                                                <td>
                                                    @if($itmes->role == 2 )
                                                    <span class="alert-succes"> Prestataire</span>
                                                    @elseif($itmes->role == 1)
                                                    Utilisateur
                                                    @elseif($itmes->role == 3)
                                                    Administrateur
                                                    @endif
                                                </td>
                                                <td>
                                                    @if($itmes->confirmation_token == NULL )
                                                    Profil activé
                                                    @else
                                                    Profil non activé
                                                    @endif
                                                </td>
                                                <td>{{ $itmes->created_at }}</td>
                                                <td>
                                                    @if( gestPrestation($itmes->id) )
                                                    {{ gestPrestation($itmes->id)->name }}
                                                    @else
                                                    Indisponible
                                                    @endif
                                                </td>
                                                <td>
                                                    @if( gestPrestation($itmes->id) )
                                                    {{ gestCategorie(gestPrestation($itmes->id)->id_prestations)->name }}
                                                    @else
                                                    Indisponible
                                                    @endif
                                                </td>
                                                <td>
                                                    @if( gestPrestation($itmes->id) )
                                                    <button href="" data-toggle="modal" data-target="#"
                                                        class="btn btn-sm btn-success btn-rounded"><i
                                                            class="fa fa-check"></i></button>
                                                    @else
                                                    <button href="" data-toggle="modal"
                                                        data-target="#exampleModalDeletImage{{$itmes->id}}"
                                                        class="btn btn-sm btn-danger btn-rounded"><i
                                                            class="fa fa-trash"></i></button>
                                                    @endif
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

@foreach($Prestataire as $items)
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