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
                        <h2>Ajouter une chambre ou un espace <small></small></h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        @if(Session::has('success'))
                        <div class="alert alert-success">{{ Session::get('success') }}</div>
                        @elseif(Session::has('danger'))
                        <div class="alert alert-danger">{{ Session::get('danger') }}</div>
                        @endif


                        <form method="POST" action="/save/espace" enctype="multipart/form-data">
                            @csrf

                            <h5>Information generale</h5>
                            <hr>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"
                                    for="first-name">Designation<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="designation" class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label for="middle-name"
                                    class="col-form-label col-md-3 col-sm-3 label-align">Description</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <textarea rows="8" name="description" class="form-control"></textarea>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"
                                    for="first-name">Commune<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select required="required" name="commune" class="form-control ">
                                        @foreach($commune as $item)
                                        <option value="{{ $item->id }}"> {{ $item->libelle }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"
                                    for="first-name">Localisation<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="localisation" class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Cayegorie
                                    de l'espace<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select required="required" name="type" class="form-control ">
                                        @foreach($categorie as $item)
                                        <option value="{{ $item->id }}"> {{ $item->libelle }} </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align"
                                    for="first-name">Montant<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="text" name="montant" class="form-control ">
                                </div>
                            </div>
                            <hr>

                            <h5>Galerie</h5>
                            <hr>
                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Image
                                    principale</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" name="image_un" class="form-control">
                                </div>
                            </div>

                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Image
                                    secondaire</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" name="image_deux" class="form-control">
                                </div>
                            </div>


                            <div class="item form-group">
                                <label for="middle-name" class="col-form-label col-md-3 col-sm-3 label-align">Image
                                    secondaire</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="file" name="image_trois" class="form-control">
                                </div>
                            </div>

                            <hr>

                            <h5>Disponibilite</h5>
                            <hr>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Jours
                                    de disponibilite <span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    @foreach($dateDisponibilite as $item)
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="jousdispo[]" class="flat"
                                                value="{{ $item->jours }}"> {{ $item->libelle }}
                                        </label>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Heure
                                    de disponibilite debut<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="time" name="time_start" class="form-control ">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">Heure
                                    de disponibilite fin<span class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input class="form-control" type="time" name="time_end" required='required'>
                                </div>
                            </div>
                   

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