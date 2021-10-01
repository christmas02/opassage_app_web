@extends('admin/layout/master')

@section('content')
<style>
.btn-modal {
    background-color: #ccc;
    color: gray;
    border-radius: 50%;
}

.form-check-input {}

input:checked+.slider {
    background-color: #2196F3;
}

label {
    font-size: 18px;
    text-align: center;
}

.silde {
    margin: 0 190px;
}

.modal-title {

    color: #fff;

}

.modal-header {
    background-color: gray;
    text-align: right !important;
}

.modal-footer-btn {
    margin: 20px 38%;

}

.form-check-label {
    margin-left: 5px;
}
</style>
<!-- page content -->
<div class="right_col" role="main">

    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Statistiques </h3>
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
                                            data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff">
                                           </div>
                                        <h3 class="m-b-0 m-t-10 text-white number count-to" data-from="0" data-to="2078"
                                            data-speed="2000" data-fresh-interval="700">{{ $visite }}</h3>
                                        <span class="text-white">Visites</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="body l-seagreen text-center">
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="15px"
                                            data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff">
                                            </div>
                                        <h3 class="m-b-0 m-t-10 text-white number count-to" data-from="0" data-to="1278"
                                            data-speed="2000" data-fresh-interval="700">{{ $phone }}</h3>
                                        <span class="text-white">Prises de contact</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="body l-amber text-center">
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="15px"
                                            data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff">
                                            </div>
                                        <h3 class="m-b-0 m-t-10 text-white number count-to" data-from="0" data-to="521"
                                            data-speed="2000" data-fresh-interval="700">{{ $demande }}</h3>
                                        <span class="text-white">Sollicitations</span>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="card">
                                    <div class="body l-blue text-center">
                                        <div class="sparkline" data-type="bar" data-width="97%" data-height="15px"
                                            data-bar-Width="2" data-bar-Spacing="5" data-bar-Color="#ffffff">
                                            </div>
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


        </div>



    </div>
</div>



<!-- /page content -->

<!-- Modal demande formulaire -->




@endsection