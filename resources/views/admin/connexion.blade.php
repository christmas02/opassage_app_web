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
    <link href="Admin/vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="Admin/vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="Admin/vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- Animate.css -->
    <link href="Admin/vendors/animate.css/animate.min.css" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="Admin/build/css/custom.min.css" rel="stylesheet">
  </head>

  <style>
      .login_content{
          margin-top: 60px;
          border: 5px solid #4c015e;
          padding:20px 40px;
          border-radius: 10px;
          width: 400px;
      }
      .btn-connexion{
          background: #4c015e !important;
          color:#fff;
      }

      .btn-connexion:hover{
          background: #4c015e !important;
          color:#fff;
      }
  </style>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">
            <center>
              <img src="admin/images/logo_admin.png" width="200">
              <p>Espace de suivie et de gestion de l'application mobile O passage</p>
            </center>
            <form method="POST" action="{{ route('login') }}">
            @csrf
              <h1>Connexion</h1>
              <div>
                <input class="form-control" id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus/>
              </div>
              <div>
                <input class="form-control" id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"/>
              </div>
              <div>
                <button type="submit" class="btn btn-connexion"> Connexion</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
               

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-setting"></i> </h1>
                  <p>©2016 All Rights Reserved. </p>
                </div>
              </div>
            </form>
          </section>
        </div>

      </div>
    </div>
  </body>
</html>
