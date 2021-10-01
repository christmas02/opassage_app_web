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
                    <h2>Conversation <small></small></h2>
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
                          
                            <ul class="list-unstyled top_profiles scroll-view">
                            @foreach($conversation->unique('code') as $items)
                            <li class="media event">
                                    <a class="pull-left border-aero profile_thumb" href="javascript:void(0)" id="messagerie" data-code="{{ $items->code }}" data-id_recepteur="{{ $items->id }}" data-id_user="{{ $infoUser->id }}">
                                    <i class="fa fa-user aero"></i>
                                    </a>
                                    <div class="media-body">
                                        <a class="title" href="#">{{ $items->name }}</a>
                                        <p><strong></strong> {{ $items->contenus }}</p>
                                        <p> <small></small>
                                        </p>
                                    </div>
                            </li>
                            @endforeach
                                
                            </ul>
                           
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
<div class="modal fade" id="modalMessagerie" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <input type="text" name="contenus" class="write_msg" placeholder="Message ..." required/>
                        <button class="msg_send_btn" type="submit"><i class="fa fa-paper-plane" aria-hidden="true"></i></button>
                    </div>
                </form>
            </div>
        </div>
      </div>
    </div>
  </div>
</div>





@endsection