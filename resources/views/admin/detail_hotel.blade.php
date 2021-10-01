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
                <h3>Information sur l'hotel ou espace </h3>
            </div>

            <div class="title_right">
                <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                    <div class="input-group">

                    </div>
                </div>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Profil</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a href="/list_agents" class=""><i class="fa fa-chevron-up"></i>Retour</a>
                        </ul>

                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-3 col-sm-3  profile_left">
                            <div class="profile_img">
                                <div id="crop-avatar">
                                    <!-- Current avatar -->
                                    <img class="img-responsive avatar-view" src="{{asset('/admin/images/user.png')}}"
                                        alt="Avatar" title="...">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3 col-sm-3 ">
                                <h3>{{ $infoHotel->hotel }}</h3>
                                <ul class="list-unstyled user_data">
                                    <li>
                                        <h4><i class="fa fa-user user-profile-icon"></i> {{ $infoHotel->agent }} </h4>
                                    </li>
                                    <li>
                                        <h4><i class="fa fa-envelope user-profile-icon"></i> {{ $infoHotel->email }}</h4>
                                    </li>
                                    <li>
                                        <h4><i class="fa fa-phone user-profile-icon"></i>{{ $infoHotel->phone }}</h4>
                                    </li>
                                </ul>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="card">
                                    <div class="body l-parpl text-center">
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="15px"
                                            data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff"></div>
                                        <h3 class="m-b-0 m-t-10 text-white number count-to" data-from="0" data-to="2078"
                                            data-speed="2000" data-fresh-interval="700">{{ count($Espace) }}</h3>
                                        <span class="text-white">Chambres ou Espaces</span>
                                    </div>
                                </div>
                            </div>
                           
                            <div class="col-lg-6 col-md-6">
                                <div class="card">
                                    <div class="body l-amber text-center">
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="15px"
                                            data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff"></div>
                                        <h3 class="m-b-0 m-t-10 text-white number count-to" data-from="0" data-to="521"
                                            data-speed="2000" data-fresh-interval="700">0</h3>
                                        <span class="text-white">Reservations</span>
                                    </div>
                                </div>
                            </div>
                            
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Chambre ou Espace</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="col-md-12 col-sm-12 ">
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
        @if($Espace)
        @foreach($Espace as $itmes)
        <tr>
            <td>
                <div style="width: 40px;">
                  <img src="{{asset('/storage/'.$itmes->path_un)}}" style="width: 40px;">
                </div>
            </td>
            <td>{{ $itmes->designation }}</td>
            <td>{{ Agent($itmes->id)->name }}</td>
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


            <div>

            </div>
        </div>

    </div>
</div>

<!-- /page content -->





@endsection