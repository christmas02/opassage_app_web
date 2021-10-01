@extends('admin/layout/master')

@section('content')

<!-- page content -->
<div class="right_col" role="main">

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Information sur l'agent </h3>
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
            <div class="col-md-12 col-sm-12  ">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="row clearfix">
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="body l-parpl text-center">
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="15px"
                                            data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff"></div>
                                        <h3 class="m-b-0 m-t-10 text-white number count-to" data-from="0" data-to="2078"
                                            data-speed="2000" data-fresh-interval="700">0</h3>
                                        <span class="text-white">Visites</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="body l-seagreen text-center">
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="15px"
                                            data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff"></div>
                                        <h3 class="m-b-0 m-t-10 text-white number count-to" data-from="0" data-to="1278"
                                            data-speed="2000" data-fresh-interval="700">0</h3>
                                        <span class="text-white">Prises de contact</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="body l-amber text-center">
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="15px"
                                            data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff"></div>
                                        <h3 class="m-b-0 m-t-10 text-white number count-to" data-from="0" data-to="521"
                                            data-speed="2000" data-fresh-interval="700">0</h3>
                                        <span class="text-white">Sollicitations</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="body l-blue text-center">
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="15px"
                                            data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff"></div>
                                        <h3 class="m-b-0 m-t-10 text-white number count-to" data-from="0" data-to="978"
                                            data-speed="2000" data-fresh-interval="700">0</h3>
                                        <span class="text-white">Messagerie</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

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
                                <h3>{{ $findUser->name}}</h3>
                                <ul class="list-unstyled user_data">
                                    <li>
                                        <h4><i class="fa fa-envelope user-profile-icon"></i> {{ $findUser->email }}</h4>
                                    </li>
                                    <li>
                                        <h4><i class="fa fa-phone user-profile-icon"></i> {{ $findUser->phone }}</h4>
                                    </li>
                                </ul>
                            </div>


                        </div>
                        <div class="col-md-9 col-sm-9 ">


                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">

                        <div class="col-md-12 col-sm-12 ">
                            <div class="" role="tabpanel" data-example-id="togglable-tabs">
                                <ul id="myTab" class="nav nav-tabs bar_tabs" role="tablist">

                                    <li role="presentation" class=""><a href="#tab_content2" role="tab" id="profile-tab"
                                            data-toggle="tab" aria-expanded="false">Liste des differents poste</a>
                                    </li>
                                    <li role="presentation" class=""><a href="#tab_content3" role="tab" id="profile-tab"
                                            data-toggle="tab" aria-expanded="false">Liste des Reservations</a>
                                    </li>
                                </ul>
                                <div id="myTabContent" class="tab-content">

                                    <div role="tabpanel" class="tab-pane active" id="tab_content2"
                                        aria-labelledby="profile-tab">

                                        <!-- start user projects -->
                                        <table class="data table table-striped no-margin">
                                            <thead>
                                                <tr style="font-size: 16px;">
                                                    <th>#</th>
                                                    <th>Designstion</th>
                                                    <th>Matricule</th>
                                                    <th>Localisation</th>
                                                    <th>Type</th>
                                                    <th>Montant</th>

                                                </tr>
                                            </thead>
                                            <tbody style="font-size: 16px;">
                                                <tr>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                    <td></td>
                                                </tr>

                                            </tbody>
                                        </table>
                                        <!-- end user projects -->

                                    </div>
                                    <div role="tabpanel" class="tab-pane fade" id="tab_content3"
                                        aria-labelledby="profile-tab">
                                        <!-- start user projects -->
                                        <table class="data table table-striped no-margin">
                                            <thead>
                                                <tr style="font-size: 20px;">
                                                    <th></th>
                                                    <th>Information client</th>
                                                    <th>Date</th>
                                                    <th>Statut</th>

                                                </tr>
                                            </thead>
                                            <tbody style="font-size: 16px;">


                                            </tbody>
                                        </table>
                                        <!-- end user projects -->
                                    </div>
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