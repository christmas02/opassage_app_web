@extends('admin/layout/master')

@section('content')


<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3></h3>
            </div>
        </div>
        <div class="clearfix"></div>

        <div class="row">

            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Ajouter un agent et l'hotel <small></small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @elseif(Session::has('danger'))
                        <div class="alert alert-danger">{{ Session::get('danger') }}</div>
                        @endif


                        <form method="POST" action="/register_hotel_agent" enctype="multipart/form-data">
                            @csrf

                            <h5>Information Hotels</h5>
                            <hr>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"
                                    for="first-name">Nom de l'hotel<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="hotel" class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name"
                                    class="col-form-label col-md-3 col-sm-3 label-align">Telephine de l'hotel</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="phone" class="form-control ">
                                </div>
                                
                            </div>
  
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"
                                    for="first-name">Logo ou image de l'hotel<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" name="logo" class="form-control ">
                                </div>
                            </div>

                            <hr>

                            <h5>Compte Utilisateurs</h5>
                            <hr>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"
                                    for="first-name">Nom et prenom<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="name" class="form-control ">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"
                                    for="first-name">Adress email<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="email" name="email" class="form-control ">
                                    <input type="text" hidden name="role" value="2">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"
                                    for="first-name">Mot de passe<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="password" name="password" class="form-control ">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"
                                    for="first-name">Confirmation du mot de passe<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="password" name="password_confirmation" class="form-control ">
                                </div>
                            </div>
                         

                            <hr>

                      
                   

                    <div class="ln_solid"></div>
                    <div class="item form-group">
                        <div class="col-md-6 col-sm-6 offset-md-3">
                            <button type="submit" class="btn btn-success">Enregistre</button>
                        </div>
                    </div>
                    <!-- Sstep-4 -->
                    </form>

                </div>
            </div>
        </div>
    </div>

</div>
</div>
<!-- /page content -->
@endsection