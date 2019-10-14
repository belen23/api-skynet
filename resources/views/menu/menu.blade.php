<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8" />
  <link rel="apple-touch-icon" sizes="76x76" href="{{asset('img/dominio.png')}}">
  <link rel="icon" type="image/png" href="{{asset('img/dominio.png')}}">
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
  <title>
    Solución de Casos
  </title>
  <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
  <!--     Fonts and icons     -->
  <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- CSS Files -->
  <link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" />
  <link href="{{asset('css/paper-dashboard.css?v=2.0.0')}}" rel="stylesheet" />

  <link href="{{asset('demo/demo.css')}} " rel="stylesheet" />
</head>

<body class="">
  <div class="wrapper ">
    <div class="sidebar" data-color="white" data-active-color="danger">
      <!--
        Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
    -->
      <div class="logo">
        <a href="{{asset('img/dominio.png')}}" class="simple-text logo-mini">
          <div class="logo-image-small">
            <img src="{{asset('img/dominio.png')}}">
          </div>
        </a>
        <a href="" class="simple-text logo-normal">
          Skynet
          <!-- <div class="logo-image-big">
            <img src="{{asset('img/logo.png')}}">
          </div> -->
        </a>
      </div>
      <div class="sidebar-wrapper">
        <ul class="nav">
          <li>
            <a href="home">
              <i class="nc-icon nc-bank"></i>
              <p>Dashboard</p>
            </a>
          </li>
          <li>
                @if (Auth::user()->user_role=='REG_USER') 
          <li class="active-pro">
            <a href="">
              <i class="nc-icon nc-caps-small"></i>
              <p>Casos</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="">
              <i class="nc-icon nc-caps-small"></i>
              <p>Documetos</p>
            </a>
          </li>
         
         @endif
         
         @if (Auth::user()->user_role=='REG_ADMIN') 
          <li class="active-pro">
            <a href="">
              <i class="nc-icon nc-caps-small"></i>
              <p>Casos</p>
            </a>
          </li>
          <li class="active-pro">
            <a href="">
              <i class="nc-icon nc-caps-small"></i>
              <p>Documetos</p>
            </a>
          </li>
         
         @endif
        </ul>
      </div>
    </div>
    <div class="main-panel">
      <!-- Navbar -->
      <nav class="navbar navbar-expand-lg navbar-absolute fixed-top navbar-transparent">
        <div class="container-fluid">
          <div class="navbar-wrapper">
            <div class="navbar-toggle">
              <button type="button" class="navbar-toggler">
                <span class="navbar-toggler-bar bar1"></span>
                <span class="navbar-toggler-bar bar2"></span>
                <span class="navbar-toggler-bar bar3"></span>
              </button>
            </div>
            <a class="navbar-brand" href="#">Solución de Casos</a>
          </div>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
            <span class="navbar-toggler-bar navbar-kebab"></span>
          </button>
          <div class="collapse navbar-collapse justify-content-end" id="navigation">
            
            <form>
             
            </form>
            <ul class="navbar-nav">
             
             <li class="nav-item btn-rotate dropdown">
               <a class="nav-link dropdown-toggle"  id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <i class="nc-icon nc-bell-55"></i>
                 <p>
                   <span class="d-lg-none d-md-block">Acciones</span>
                 </p>
               </a>
               <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                 <a class="dropdown-item" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     {{ __('Logout') }}
                 </a>

                 <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                     @csrf
                 </form>
             </div>
             </li>
             
           </ul>
          </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <!-- <div class="panel-header panel-header-sm">


</div> -->
      <div class="content">
       @yield('content')
      </div>
      <footer class="footer footer-black  footer-white ">
        <div class="container-fluid">
          <div class="row">
            <nav class="footer-nav">
              <ul>
                <li>
                  <a href="" target="_blank"></a>
                </li>
                <li>
                  <a href="" target="_blank"></a>
                </li>
                <li>
                  <a href="" target="_blank"></a>
                </li>
              </ul>
            </nav>
            <div class="credits ml-auto">
              <span class="copyright">
                ©
                <script>
                  document.write(new Date().getFullYear())
                </script>, Proyecto del Area de Analisis de Sistemas <i class="">--</i> Andrea Belén de la Cruz H.
              </span>
            </div>
          </div>
        </div>
      </footer>
    </div>
  </div>
  <!--   Core JS Files   -->

  <!-- Chart JS -->
  <script src="{{asset('js/core/jquery.min.js')}}"></script>
  <script src="{{asset('js/core/jquery.min.jsjs/core/popper.min.js')}}"></script>
  <script src="{{asset('js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('js/plugins/perfect-scrollbar.jquery.min.js')}}"></script>
  <script src="{{asset('js/personalizado.js')}}"></script>
  <script src="{{asset('js/electrodomesticos.js')}}"></script>
 
  <!-- Chart JS -->
  <script src="{{asset('js/plugins/chartjs.min.js')}}"></script>
  
 
  <!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('js/paper-dashboard.min.js?v=2.0.0')}}" type="text/javascript"></script>
  </body>

</html>
