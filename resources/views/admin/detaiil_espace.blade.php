@extends('admin/layout/master')

<?php 

function typeEpace($id){
    $date = \App\Type::where('id',$id)->first();
    return $date;
}

function Commune($id){
    $date = \App\Commune::where('id',$id)->first();
    return $date;
}


?>

@section('content')

<!-- page content -->
<div class="right_col" role="main">

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Information sur l'espace </h3>
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
                        <h2>{{ $findEspace->designation }}</h2>
                        <ul class="nav navbar-right panel_toolbox">
                            <li><a href="/list_agents" class=""><i class="fa fa-chevron-up"></i>Retour</a>
                        </ul>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-4">
                                <img src="{{asset('/storage/'.$findEspace->path_un)}}" width="300" height="250">
                            </div>
                            <div class="col-md-4">
                            <img src="{{asset('/storage/'.$findEspace->path_deux)}}" width="300" height="250">
                            </div>
                            <div class="col-md-4">
                            <img src="{{asset('/storage/'.$findEspace->path_trois)}}" width="300" height="250">
                            </div>
                        </div>
                    </div>
                    <div class="x_content">
                        <h2>Description</h2>
                        <h4>{{ $findEspace->description }}</h4>
                        <hr>
                        <h4>
                        Montant : {{ $findEspace->montant  }},
                        Categorie : {{ typeEpace($findEspace->type)->libelle  }},
                        Commune : {{ Commune($findEspace->commune)->libelle  }},
                        Localisation : {{ $findEspace->localisation  }}
                        </h4>
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

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
</div>

<!-- /page content -->





@endsection