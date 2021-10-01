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
                        <h2>Liste des prestataires <small></small></h2>
                        <ul class="nav navbar-right panel_toolbox">



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
                                                    <th> Nom de la structure </th>
                                                    <th> Localisation </th>
                                                    <th> Service client </th>
                                                    <th> Statut </th>
                                                    <th> A la une </th>


                                                    <th> Actions </th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                @if($listePrestation)
                                                @foreach($listePrestation as $items)
                                                <tr>
                                                    <td> {{ $items->nom }} / {{ $items->numero }}</td>


                                                    <td> {{ $items->name }}</td>
                                                    <td> {{ $items->commune }}</td>
                                                    <td> {{ $items->phone_service }}</td>


                                                    <td>
                                                        @if($items->statu_fiche == 0 )
                                                        <span class="text-warning"> En cours</span>
                                                        @elseif($items->statu_fiche == 1 )
                                                        <span class="text-succes"> Actif</span>
                                                        @elseif($items->statu_fiche == 2 )
                                                        <span class="text-danger"> Inactif</span>
                                                        @endif
                                                    </td>

                                                    {{--<td>
                                    @if($items->messagerie == 0 )
                                    <span class="text-warning"> En cours </span>
                                    @elseif($items->statu_fiche == 1 )
                                    <span class="text-succes"> Actif</span>
                                    @elseif($items->statu_fiche == 2 )
                                    <span class="text-danger"> Inactif</span>
                                    @endif
                                    </td>--}}

                                                    <td>
                                                        @if($items->position == 0 )
                                                        <span class="text-warning"> En cours</span>
                                                        @elseif($items->statu_fiche == 1 )
                                                        <span class="text-succes"> Actif</span>
                                                        @elseif($items->statu_fiche == 2 )
                                                        <span class="text-danger"> Inactif</span>
                                                        @endif
                                                    </td>

                                                    <td>
                                                        <div class="">
                                                            <a href="/fiche/prestataires/{{ $items->id }}/{{ $infoUser->id }}"
                                                                class="btn btn-modal"><i class="fa fa-eye"></i></a>
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#exampleModalSetting{{$items->id}}"
                                                                class="btn btn-modal"><i class="fa fa-cog"></i></a>
                                                            <a href="javascript:void(0)" id="chat"
                                                                data-id_recepteur="{{ $items->id_user }}"
                                                                data-id_user="{{ $infoUser->id }}"
                                                                class="btn btn-modal"><i class="fa fa-envelope"></i></a>
                                                            {{--<a href="#" data-toggle="modal" data-target="#exampleModalDelet{{$items->id}}"
                                                            class="btn btn-modal"><i class="fa fa-trash"></i></a>--}}
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

@foreach($listePrestation as $items)
<!-- Modal -->
<div class="modal fade" id="exampleModalSetting{{$items->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="text-center"></b></h4>
                <center>
                    <h3>Parametre du prestataire <b>{{ $items->name }}</b></h3>
                </center>
                <hr>
                <div class="silde">

                    <form method="POST" action="/save/parametre">
                        @csrf

                        <input type="text" hidden name="id_fiche" value="{{$items->id}}">

                        <div class="form-check form-switch">
                            <div class="row">
                                <div class="col-md-8">
                                    <label class="form-check-label" for="flexSwitchCheckDefault">Activation du
                                        compte</label>
                                </div>
                                <div class="col-md-4">
                                    <span style="margin-left: 10px;">
                                        @if($items->statu_fiche != 0)
                                        <b>Oui</b> <input class="flat" type="radio" name="activation" value="1" checked
                                            id="flexSwitchCheckDefault">
                                        <b>Non</b> <input class="flat" type="radio" name="activation" value="0"
                                            id="flexSwitchCheckDefault">
                                        @else
                                        <b>Oui</b> <input class="flat" type="radio" name="activation" value="1"
                                            id="flexSwitchCheckDefault">
                                        <b>Non</b> <input class="flat" type="radio" name="activation" value="0" checked
                                            id="flexSwitchCheckDefault">
                                        @endif
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="form-check form-switch"">
              <div class=" row">
                            <div class="col-md-8">
                                <label class="form-check-label" for="flexSwitchCheckDefault">Mettre à la une</label>
                            </div>
                            <div class="col-md-4">
                                <span style="margin-left: 10px;">
                                    @if($items->position != 0)
                                    <b>Oui</b> <input class="flat" type="radio" name="position" value="1" checked
                                        id="flexSwitchCheckDefault">
                                    <b>Non</b> <input class="flat" type="radio" name="position" value="0"
                                        id="flexSwitchCheckDefault">
                                    @else
                                    <b>Oui</b> <input class="flat" type="radio" name="position" value="1"
                                        id="flexSwitchCheckDefault">
                                    <b>Non</b> <input class="flat" type="radio" name="position" value="0" checked
                                        id="flexSwitchCheckDefault">
                                    @endif
                                </span>
                            </div>
                        </div>
                </div>


                <div class="form-check form-switch">
                    <div class="row">
                        <div class="col-md-8">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Activation de la
                                messagerie</label>
                        </div>
                        <div class="col-md-4">
                            <span style="margin-left: 10px;">
                                @if($items->messagerie != 0)
                                <b>Oui</b> <input class="flat" type="radio" name="messagerie" value="1" checked
                                    id="flexSwitchCheckDefault">
                                <b>Non</b> <input class="flat" type="radio" name="messagerie" value="0"
                                    id="flexSwitchCheckDefault">
                                @else
                                <b>Oui</b> <input class="flat" type="radio" name="messagerie" value="1"
                                    id="flexSwitchCheckDefault">
                                <b>Non</b> <input class="flat" type="radio" name="messagerie" value="0" checked
                                    id="flexSwitchCheckDefault">
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-check form-switch">
                    <div class="row">
                        <div class="col-md-8">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Activation de l'option
                                favori</label>
                        </div>
                        <div class="col-md-4">
                            <span style="margin-left: 10px;">
                                @if($items->favoris != 0)
                                <b>Oui</b> <input class="flat" type="radio" name="favoris" value="1" checked
                                    id="flexSwitchCheckDefault">
                                <b>Non</b> <input class="flat" type="radio" name="favoris" value="0"
                                    id="flexSwitchCheckDefault">
                                @else
                                <b>Oui</b> <input class="flat" type="radio" name="favoris" value="1"
                                    id="flexSwitchCheckDefault">
                                <b>Non</b> <input class="flat" type="radio" name="favoris" value="0" checked
                                    id="flexSwitchCheckDefault">
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-check form-switch">
                    <div class="row">
                        <div class="col-md-8">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Activation de l'option
                                téléphone</label>
                        </div>
                        <div class="col-md-4">
                            <span style="margin-left: 10px;">
                                @if($items->actif_phone != 0)
                                <b>Oui</b> <input class="flat" type="radio" name="telephone" value="1" checked
                                    id="flexSwitchCheckDefault">
                                <b>Non</b> <input class="flat" type="radio" name="telephone" value="0"
                                    id="flexSwitchCheckDefault">
                                @else
                                <b>Oui</b> <input class="flat" type="radio" name="telephone" value="1"
                                    id="flexSwitchCheckDefault">
                                <b>Non</b> <input class="flat" type="radio" name="telephone" value="0" checked
                                    id="flexSwitchCheckDefault">
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-check form-switch">
                    <div class="row">
                        <div class="col-md-8">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Activation de l'option
                                whatsapp</label>
                        </div>
                        <div class="col-md-4">
                            <span style="margin-left: 10px;">
                                @if($items->actif_whatsapp != 0)
                                <b>Oui</b> <input class="flat" type="radio" name="whatsapp" value="1" checked
                                    id="flexSwitchCheckDefault">
                                <b>Non</b> <input class="flat" type="radio" name="whatsapp" value="0"
                                    id="flexSwitchCheckDefault">
                                @else
                                <b>Oui</b> <input class="flat" type="radio" name="whatsapp" value="1"
                                    id="flexSwitchCheckDefault">
                                <b>Non</b> <input class="flat" type="radio" name="whatsapp" value="0" checked
                                    id="flexSwitchCheckDefault">
                                @endif
                            </span>
                        </div>
                    </div>
                </div>

                <div class="form-check form-switch">
                    <div class="row">
                        <div class="col-md-8">
                            <label class="form-check-label" for="flexSwitchCheckDefault">Accès au nombre
                                d'images</label>
                        </div>
                        <div class="col-md-4">
                            <span style="margin-left: 0px;">
                                @if($items->nbre_image == 3)
                                <b>3 img</b> <input class="flat" type="radio" name="cotaimage" value="3" checked
                                    id="flexSwitchCheckDefault">
                                <b>6 img</b> <input class="flat" type="radio" name="cotaimage" value="6"
                                    id="flexSwitchCheckDefault">
                                @elseif($items->nbre_image == 6)
                                <b>6 img</b> <input class="flat" type="radio" name="cotaimage" checked value="6"
                                    id="flexSwitchCheckDefault">
                                <b>3 img</b> <input class="flat" type="radio" name="cotaimage" value="3"
                                    id="flexSwitchCheckDefault">
                                @endif
                            </span>
                        </div>
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


@foreach($listePrestation as $items)
<!-- Modal -->
<div class="modal fade" id="exampleModalDelet{{$items->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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


<!-- Modal demande formulaire -->
<div class="modal fade" id="modalMessagerie" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="mesgs">
                    <div class="msg_history">
                    </div>
                    <div class="type_msg">
                        <form method="post" action="/save/message">
                            @csrf
                            <div class="input_msg_write">
                                <input type="hidden" value="0" name="conversation">
                                <input type="hidden" value="{{ $infoUser->id }}" name="id_emmetteur">
                                <input type="hidden" id="recepteur" value="" name="id_recepteur">
                                <input type="text" name="contenus" class="write_msg" placeholder="Message ..."
                                    required />
                                <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane"
                                        aria-hidden="true"></i></button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection