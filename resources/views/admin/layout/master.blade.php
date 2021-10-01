<!DOCTYPE html>
<html lang="en">
  <head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <title> | espace administration </title>

    <!-- Bootstrap -->
    <link href="{{asset('/admin/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{asset('/admin/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{asset('/admin/vendors/nprogress/nprogress.css')}}" rel="stylesheet">

     <!-- iCheck -->
     <link href="{{asset('/admin/vendors/iCheck/skins/flat/green.css')}}" rel="stylesheet">
    <!-- Datatables -->
    
    <link href="{{asset('/admin/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('/admin/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css')}}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{asset('/admin/build/css/custom.min.css')}}" rel="stylesheet">

     <!-- Custom Theme Style -->
     <link href="{{asset('/css/style.css')}}" rel="stylesheet">
  </head>

  <body class="nav-md">
    <div class="container body">
      <div class="main_container">
        <div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="/" class="site_title"> <span>
                <img src="{{asset('/admin/images/logo_white_admin.png ')}}" width="120">
              </span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_pic">
                <img src="{{asset('/admin/images/logo_white_admin.png ')}}" alt="..." class="img-circle profile_img">
              </div>
              <div class="profile_info">
                <h2> {{ Auth::user()->name }} </h2>
                <small>{{ Auth::user()->email }}</small>
              </div>
              <div class="clearfix"></div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <h3>General</h3>
                <ul class="nav side-menu">
                  <li><a href="/home"><i class="fa fa-home"></i> Tableau de bord</a></li>
                  <li><a href="/liste_hotel"><i class="fa fa-edit"></i> Hotels / Espaces </a></li>
                  <li><a href="/liste_utilisateur"><i class="fa fa-edit"></i> Liste des Utulisateurs</a></li>
                  <li><a href="/liste_espace"><i class="fa fa-edit"></i> Chambres / Espaces</a></li>
                  <li><a href="#"><i class="fa fa-table"></i> Liste des Reservations </a></li>
                  <li><a href="#"><i class="fa fa-bar-chart-o"></i> Statistiques </a></li>
                  <li><a href="#"><i class="fa fa-cog"></i> Paramètres<span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="/ajout_espace">Ajouter un espace</a></li>
                      <li><a href="/ajout_agent">Ajouter un agent</a></li>
                      <li><a href="#">Communes</a></li>
                      <li><a href="#">Gategories</a></li>
                    </ul>
                  </li>
                  
                  
                  <li><a><i class="fa fa-sign-out"></i> Déconnexion </a></li>
                  
                </ul>
              </div>


            </div>
            <!-- /sidebar menu -->

          </div>
        </div>

        <!-- top navigation -->
        <div class="top_nav">
            <div class="nav_menu">
                <div class="nav toggle">
                  <a id="menu_toggle"><i class="fa fa-bars"></i></a>
                </div>
                <nav class="nav navbar-nav">
                <ul class=" navbar-right">
                  <li class="nav-item dropdown open" style="padding-left: 15px;">
                    <a href="javascript:;" class="user-profile dropdown-toggle" aria-haspopup="true" id="navbarDropdown" data-toggle="dropdown" aria-expanded="false">
                    {{ Auth::user()->name }} 
                    </a>
                    <div class="dropdown-menu dropdown-usermenu pull-right" aria-labelledby="navbarDropdown">
                      <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalProfil"> Profil</a>
                      <a class="dropdown-item" data-toggle="modal" data-target="#exampleModalPassword">Modification du mot de passe</a>
                      <a class="dropdown-item" href="{{ route('logout') }}" class="dropdown-item" onclick="event.preventDefault();
                          document.getElementById('logout-form').submit();">
                          {{ __('Déconnexion') }}<i class="fa fa-sign-out pull-right"></i>
                      </a>
                      <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                          @csrf
                      </form>
                    </div>
                  </li>
  
                  <li role="presentation" class="nav-item dropdown open">
                    <a href="javascript:;" class="dropdown-toggle info-number" id="navbarDropdown1" data-toggle="dropdown" aria-expanded="false">
                      <i class="fa fa-envelope-o"></i>
                      <span class="badge bg-green">6</span>
                    </a>
                    <ul class="dropdown-menu list-unstyled msg_list" role="menu" aria-labelledby="navbarDropdown1">
                      <li class="nav-item">
                        <a class="dropdown-item">
                          <span class="image"><img src="images/img.jpg" alt="Profile Image" /></span>
                          <span>
                            <span>John Smith</span>
                            <span class="time">3 mins ago</span>
                          </span>
                          <span class="message">
                            Film festivals used to be do-or-die moments for movie makers. They were where...
                          </span>
                        </a>
                      </li>
                      
                      <li class="nav-item">
                        <div class="text-center">
                          <a class="dropdown-item">
                            <strong>See All Alerts</strong>
                            <i class="fa fa-angle-right"></i>
                          </a>
                        </div>
                      </li>
                    </ul>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        <!-- /top navigation -->
        <!-- ######################################################## -->
        @yield('content') 
        <!-- ######################################################## -->
        <!-- footer content -->
        <footer>
          <div class="pull-right">
            <a href="">Spotevent</a>
          </div>
          <div class="clearfix"></div>
        </footer>
        <!-- /footer content -->
      </div>
    </div>


    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDqqwfoyJERekoo-c243pZUj4azUHqvR_U&libraries=places&callback=initAutocomplete" async defer></script>



    <div class="modal fade" id="exampleModalProfil" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          
          <div class="modal-body">
          <h4 class="text-center"></b></h4> 
          <center><h3>Profil</h3></center> <hr>
          <div class="" style="margin: 0 80px;">
            <div method="POST" action="">
            @csrf
            
            <div class="row">
                <div class="col-md-3">
                  <div class="profil">
                      <img class="{{asset('spotevent/public/storage/' )}}" alt="Avatar" title="Change the avatar"> 
                  </div>
                </div>
                <div class="col-md-9" style="padding: 0 30px;">
                   <hr>
                  <div class="row">
                    
                      <div class="col-md-4 col-sm-3">Nom et prénom :</div>
                      <div class="col-md-6 col-sm-6"> {{ Auth::user()->name }} </div>
                    
                      <div class="col-md-4 col-sm-3">Téléphone :</div>
                      <div class="col-md-6 col-sm-6"> {{ Auth::user()->phone }} </div>
                    
                      <div class="col-md-4 col-sm-3">Email :</div>
                      <div class="col-md-6 col-sm-6"> {{ Auth::user()->email }} </div>
                  
                  </div> 
                </div>
            </div>

          </div>
          </div>
          <div class="modal-footer-btn">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
            
          </div>
          </form>
        </div>
      </div>
    </div>

    <div class="modal fade" id="exampleModalPassword" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
      <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLongTitle">Modification de mot de passe</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
          <h4 class="text-center"></b></h4> 
          <div class="silde">
            <form method="POST" action="/save/parametre">
            @csrf


            
                

            
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


    <!-- jQuery -->
    <script src="{{asset('/admin/vendors/jquery/dist/jquery.min.js')}}"></script>
    <!-- Bootstrap -->
   <script src="{{asset('/admin/vendors/bootstrap/dist/js/bootstrap.bundle.min.js')}}"></script>
    <!-- FastClick -->
    <script src="{{asset('/admin/vendors/fastclick/lib/fastclick.js')}}"></script>
    <!-- NProgress -->
    <script src="{{asset('/admin/vendors/nprogress/nprogress.js')}}"></script>
    <!-- iCheck -->
    <script src="{{asset('/admin/vendors/iCheck/icheck.min.js')}}"></script>
    <!-- bootstrap-daterangepicker -->
    <script src="{{asset('/admin/vendors/moment/min/moment.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
    <!-- bootstrap-wysiwyg -->
    <script src="{{asset('/admin/vendors/bootstrap-wysiwyg/js/bootstrap-wysiwyg.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/jquery.hotkeys/jquery.hotkeys.js')}}"></script>
    <script src="{{asset('/admin/vendors/google-code-prettify/src/prettify.js')}}"></script>
    <!-- jQuery Tags Input -->
    <script src="{{asset('/admin/vendors/jquery.tagsinput/src/jquery.tagsinput.js')}}"></script>
    <!-- Switchery -->
    <script src="{{asset('/admin/vendors/switchery/dist/switchery.min.js')}}"></script>
    <!-- Select2 -->
    <script src="{{asset('/admin/vendors/select2/dist/js/select2.full.min.js')}}"></script>
    <!-- Parsley -->
    <script src="{{asset('/admin/vendors/parsleyjs/dist/parsley.min.js')}}"></script>
    <!-- Autosize -->
    <script src="{{asset('/admin/vendors/autosize/dist/autosize.min.js')}}"></script>
    <!-- jQuery autocomplete -->
    <script src="{{asset('/admin/vendors/devbridge-autocomplete/dist/jquery.autocomplete.min.js')}}"></script>


    <!-- Datatables -->
    <script src="{{asset('/admin/vendors/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/datatables.net-buttons/js/dataTables.buttons.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/datatables.net-buttons/js/buttons.flash.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/datatables.net-buttons/js/buttons.html5.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/datatables.net-buttons/js/buttons.print.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/datatables.net-responsive/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js')}}"></script>
    <script src="{{asset('/admin/vendors/datatables.net-scroller/js/dataTables.scroller.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/jszip/dist/jszip.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/pdfmake/build/pdfmake.min.js')}}"></script>
    <script src="{{asset('/admin/vendors/pdfmake/build/vfs_fonts.js')}}"></script>
    
    <!-- Custom Theme Scripts -->
    <script src="{{asset('/admin/build/js/custom.min.js')}}"></script>

    <!-- jQuery Smart Wizard -->
    <script src="{{asset('/admin/vendors/jQuery-Smart-Wizard/js/jquery.smartWizard.js')}}"></script>

    <script>
     

        
      
        
        
    </script>
     
  </body>
</html>
