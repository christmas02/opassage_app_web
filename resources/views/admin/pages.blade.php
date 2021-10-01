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
                                                    <th> Page </th>
                                                    <th> Titre du contenu </th>
                                                    <th> Contenus </th>

                                                    <th> Actions </th>
                                                </tr>
                                            </thead>


                                            <tbody>
                                                @if($listContenu)
                                                @foreach($listContenu as $items)
                                                <tr>
                                                    <td> {{ $items->page }} </td>
                                                    <td> {{ $items->titre_contenus }}</td>
                                                    <td> {{ $items->contenus }}</td>

                                                    <td>
                                                        <div class="">
                                                            <a href="#" data-toggle="modal"
                                                                data-target="#exampleModalSetting{{$items->id}}"
                                                                class="btn btn-modal"><i class="fa fa-pencil"></i></a>

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

@foreach($listContenu as $items)
<!-- Modal -->
<div class="modal fade" id="exampleModalSetting{{$items->id}}" tabindex="-1" role="dialog"
    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <h4 class="text-center"></b></h4>
                <center>
                    <h3>Modification <b>{{ $items->titre_contenus }}</b></h3>
                </center>
                <hr>
                <div class="silde">

                    <form method="POST" action="/update/contenus">
                        @csrf

                        <input type="text" hidden name="id" value="{{$items->id}}">

                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                                Page <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                                <input type="text" name="titre_contenus" class="form-control" value="{{$items->page}}" disabled>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align" for="first-name">
                                Contenus <span class="required">*</span>
                            </label>
                            <div class="col-md-9 col-sm-9 ">
                               <textarea rows="10" name="contenus" class="form-control">
                                {{$items->contenus}}
                                </textarea>
                                <!-- <div class="btn-toolbar editor" data-role="editor-toolbar" data-target="#editor-one">
									<div class="btn-group">
										<a class="btn dropdown-toggle" data-toggle="dropdown" title="Font"><i class="fa fa-font"></i><b class="caret"></b></a>
										<ul class="dropdown-menu">
										</ul>
									</div>

									<div class="btn-group">
										<a class="btn dropdown-toggle" data-toggle="dropdown" title="Font Size"><i class="fa fa-text-height"></i>&nbsp;<b class="caret"></b></a>
										<ul class="dropdown-menu">
											<li>
												<a data-edit="fontSize 5">
													<p style="font-size:17px">Huge</p>
												</a>
											</li>
											<li>
												<a data-edit="fontSize 3">
													<p style="font-size:14px">Normal</p>
												</a>
											</li>
											<li>
												<a data-edit="fontSize 1">
													<p style="font-size:11px">Small</p>
												</a>
											</li>
										</ul>
									</div>

									<div class="btn-group">
										<a class="btn" data-edit="bold" title="Bold (Ctrl/Cmd+B)"><i class="fa fa-bold"></i></a>
										<a class="btn" data-edit="italic" title="Italic (Ctrl/Cmd+I)"><i class="fa fa-italic"></i></a>
										<a class="btn" data-edit="strikethrough" title="Strikethrough"><i class="fa fa-strikethrough"></i></a>
										<a class="btn" data-edit="underline" title="Underline (Ctrl/Cmd+U)"><i class="fa fa-underline"></i></a>
									</div>

									<div class="btn-group">
										<a class="btn" data-edit="insertunorderedlist" title="Bullet list"><i class="fa fa-list-ul"></i></a>
										<a class="btn" data-edit="insertorderedlist" title="Number list"><i class="fa fa-list-ol"></i></a>
										<a class="btn" data-edit="outdent" title="Reduce indent (Shift+Tab)"><i class="fa fa-dedent"></i></a>
										<a class="btn" data-edit="indent" title="Indent (Tab)"><i class="fa fa-indent"></i></a>
									</div>

									<div class="btn-group">
										<a class="btn" data-edit="justifyleft" title="Align Left (Ctrl/Cmd+L)"><i class="fa fa-align-left"></i></a>
										<a class="btn" data-edit="justifycenter" title="Center (Ctrl/Cmd+E)"><i class="fa fa-align-center"></i></a>
										<a class="btn" data-edit="justifyright" title="Align Right (Ctrl/Cmd+R)"><i class="fa fa-align-right"></i></a>
										<a class="btn" data-edit="justifyfull" title="Justify (Ctrl/Cmd+J)"><i class="fa fa-align-justify"></i></a>
									</div>

									<div class="btn-group">
										<a class="btn dropdown-toggle" data-toggle="dropdown" title="Hyperlink"><i class="fa fa-link"></i></a>
										<div class="dropdown-menu input-append">
											<input class="span2" placeholder="URL" type="text" data-edit="createLink" />
											<button class="btn" type="button">Add</button>
										</div>
										<a class="btn" data-edit="unlink" title="Remove Hyperlink"><i class="fa fa-cut"></i></a>
									</div>

									<div class="btn-group">
										<a class="btn" title="Insert picture (or just drag & drop)" id="pictureBtn"><i class="fa fa-picture-o"></i></a>
										<input type="file" data-role="magic-overlay" data-target="#pictureBtn" data-edit="insertImage" />
									</div>

									<div class="btn-group">
										<a class="btn" data-edit="undo" title="Undo (Ctrl/Cmd+Z)"><i class="fa fa-undo"></i></a>
										<a class="btn" data-edit="redo" title="Redo (Ctrl/Cmd+Y)"><i class="fa fa-repeat"></i></a>
									</div>
								</div>

								<div id="editor-one" name="contenus" class="editor-wrapper"> {{$items->contenus}} </div>

								<textarea name="contenus" id="contenus" style="display:none;"></textarea>-->
                            </div>
                        </div>

                </div>
            </div>
            <div class="modal-footer-btn">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                <button type="submit" class="btn btn-success">Sauver</button>
            </div>
            </form>
        </div>
    </div>
</div>
@endforeach






@endsection