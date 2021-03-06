<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>Jeelani - Sathyamargam</title>

  <!-- Fonts -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css" integrity="sha384-XdYbMnZ/QjLh6iI4ogqCTaIjrFk87ip+ekIjefZch0Y+PvJ8CDYtEs1ipDmPorQ+" crossorigin="anonymous">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato:100,300,400,700">

  <!-- Styles -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
  {{-- <link href="{{ elixir('css/app.css') }}" rel="stylesheet"> --}}
  <link rel="stylesheet" href="/css/tooltip.css">
  <link rel="stylesheet" href="/css/style.css">
  @yield('header')
  <style>
    body {
      font-family: 'Lato';
    }

    .fa-btn {
      margin-right: 6px;
    }
    .error {
      color:red;
    }
  </style>
</head>
<body id="app-layout">
  <nav class="navbar navbar-default navbar-static-top">
    <div class="container">
      <div class="navbar-header">

        <!-- Collapsed Hamburger -->
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
          <span class="sr-only">Toggle Navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>

        <!-- Branding Image -->
        <a class="navbar-brand" href="{{ url('/') }}">
          Jeelani
        </a>
      </div>

      <div class="collapse navbar-collapse" id="app-navbar-collapse">
        <!-- Left Side Of Navbar -->
        <ul class="nav navbar-nav">
          <li><a href="{{ url('/home') }}">Home</a></li>
          <li><a href="{{ url('/print') }}">Print</a></li>
          <li><a href="{{ url('/subscriptions') }}">Subscriptions</a></li>
          <li><a href="#searchModal" data-toggle="modal">Search</a></li>
          <li><a href="{{ url('/add/address') }}">Quick Add Address</a></li>
          <li><a href="{{ url('/sms') }}">SMS</a></li>
        </ul>

        <!-- Right Side Of Navbar -->
        <ul class="nav navbar-nav navbar-right">
          <!-- Authentication Links -->
          @if (Auth::guest())
          <li><a href="{{ url('/login') }}">Login</a></li>
          <!-- <li><a href="{{ url('/register') }}">Register</a></li> -->
          @else
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
              {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu" role="menu">
              <li><a href="\profile\{{Auth::id()}}">Profile</a></li>
              @if (Auth::user()->type == 'superadmin')
              <li><a href="\add-user">Add User</a></li>
              <li><a href="\edit-users">Edit Users</a></li>
              @endif
              <li><a href="\change-password">Change Password</a></li>
              <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
            </ul>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>
    <!-- <div class="row">
        <div class="col-md-6 col-md-offset-3">
            <form action="/search" method="GET">
                <input type="text" placeholder="Search Addressee" name="addressee">
                <button type="submit">Search</button>
            </form>
        </div>
      </div> -->

      @yield('content')

      <div class="row">
        <div class="col-md-6 col-md-offset-3">
          @if (session('message'))
          <h4 style="background:#00962D;color:white">{{ session('message') }}</h4>
          @elseif (session('success'))
          <h4 style="background:#00962D;color:white">{{ session('success') }}</h4>
          @elseif (session('error'))
          <h4 style="background:#ff0033;color:white">{{ session('error') }}</h4>
          @endif
          @yield('address_content')
        </div>
      </div>
      <a class="btn-floating btn-lg purple-gradient" style="background-color:#ccc;position: fixed;right:10px;bottom: 10px;" onclick="window.scrollTo(0,0);">
        <span class="glyphicon glyphicon-arrow-up"></span>
      </a>

      <!-- JavaScripts -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js" integrity="sha384-I6F5OKECLVtK/BL+8iSLDEHowSAfUo76ZL9+kGAgTRdiByINKJaqTPH/QVNS1VDb" crossorigin="anonymous"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
      {{-- <script src="{{ elixir('js/app.js') }}"></script> --}}
      <script src="{{ url('/js/js-address.js') }}"></script>
      @yield('scripts')

      @include('modals.search')

    </div>
  </body>
  </html>
