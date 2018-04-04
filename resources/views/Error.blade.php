<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
     @include('standard.header')
     <link rel="stylesheet" href="{{ asset('css/index.css') }}">
     <title>Uuniik | Error</title>
  </head>
  <body>
    <div class="container-fluid margin_top50">
      <div class="row center">
        <a href="{{ url("index") }}"><img class="round40" src="{{ asset('img/uuniik.png') }}" alt=""></a>
      </div>
      <div class="row margin_top50">
        <div class="col-lg-3"></div>
        <div class="col-lg-6 border radius20 padding30">
          <h1>Identifiants invalide</h1>
          <h4>Email</h4>
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
        </div>
      </div>
    </div>
  </body>
</html>
