@php
require $GOOGLECONFIGURL;
$loginUrl1 = $gClient1->createAuthUrl();
@endphp
@include('standard.way')
<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
  <head>
     @include('standard.header')
    <title>Uuniik | Connexion</title>
    <link rel="stylesheet" href="{{ asset('css/connexion.css') }}">
    <meta name="description" content="Commencer à utiliser Uuniik.">
  </head>
  <body>

    <div id="loader" class="red1 none">
      <div class="divflex round40 bg_white shadow_4 margin_auto" id="contspinner">
        <div id="spinner" class="margin_auto mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active"></div>
      </div>
    </div>

    <div id="background" style="background: url(http://blog.autoeurope.com.au/wp-content/uploads/2011/11/dreamstime_Holi-Festival-1024x680.jpg) center / cover no-repeat;"></div>
    <div id="blackcover"></div>

    <div class="container-fluid  phone_padding0 phone_margin0">
      <div class="container  phone_padding0 phone_margin0">
        <div class="relative row phone_padding0 phone_margin0">
          <div class="col-lg-4 col-md-3"></div>
          <div id="carteins" class="col-lg-4 col-md-6 bg-white radius10 margin_top50">
            <div class="center row">
              <img class="round40" src="{{ $LOGOURL }}" alt="">
            </div>
            <div class="row center">

              <h1 id="title" class="">{{Lang::get('pagination.connexion_title') }}</h1>
              <p class="">{{Lang::get('pagination.connexion_title2') }}</p>
            </div>

            <div class="padding_bord20">
              <button class="radius20 width100 bg_fb_blue mdl-button mdl-js-button mdl-js-ripple-effect text-white">
                <svg class="position-relative" width="25px" height="25px" style="top: -2px" version="1.1" viewBox="0 0 60 60" xmlns="http://www.w3.org/2000/svg" xmlns:sketch="http://www.bohemiancoding.com/sketch/ns" xmlns:xlink="http://www.w3.org/1999/xlink"><title/><desc/><defs/><g fill="none" fill-rule="evenodd" id="black" stroke="none" stroke-width="1"><g id="slice" transform="translate(-100.000000, 0.000000)"/><g fill="#fff" id="facebook" transform="translate(21.000000, 12.000000)"><path d="M4.46222394,35.314313 L4.46222394,17.9989613 L0.94328895,17.9989612 L0.94328895,12.2593563 L4.46222393,12.2593563 L4.46222394,8.78838641 C4.46222394,4.10664222 5.86199482,0.730618986 10.9881023,0.730618986 L17.0863595,0.730618986 L17.0863595,6.45843996 L12.7922546,6.45843996 C10.6418944,6.45843996 10.1518737,7.8873763 10.1518737,9.38376095 L10.1518737,12.2593553 L16.7694231,12.2593558 L15.8661728,17.9989613 L10.1518737,17.9989613 L10.1518737,35.3143123 L4.46222394,35.314313 Z"/></g></g></svg>
                {{Lang::get('pagination.connexion_btnfacebook') }}
              </button>
              <a id="googlelink" href="{{ $loginUrl1 }}" class="anostyle radius20 margin_top20  width100 bg_blue mdl-button mdl-js-button mdl-js-ripple-effect text-white">
                <img class="img_btn" src="https://image.flaticon.com/teams/slug/google.jpg" alt="">
                &nbsp;&nbsp; {{Lang::get('pagination.connexion_btngoogle') }}
              </a>
            </div>
            <div class="row center">
              <span class="text-center">{{Lang::get('pagination.connexion_ou') }}</span>
            </div>

            <form class="padding_bord20" method="post" action="{{ url('/index') }}" id="registrationform">
              <input type="hidden" name="" value="">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="uuniik_registration" value="true">
              <input class="input input1" type="text" name="user_mail" value="" placeholder="Mail" id="mail">
              <input id="password" class="input input1 "type="password" name="user_password" value="" placeholder="{{Lang::get('pagination.connexion_password_placeholder') }}">
              <button class="radius20 margin_top20  width100 bg_red1 mdl-button mdl-js-button mdl-js-ripple-effect text-white">
                {{Lang::get('pagination.connexion_btn1') }}  &nbsp;&nbsp;
                <i class="ic_btn material-icons">send</i>
              </button>
              <p class="margin_top10 text-center"><a href="#">Mot de passe oublié</a></p>
              <p class="text-center" style="font-size: 0.7em">{{Lang::get('pagination.connexion_condition') }}</p>
              <!--p class="red1 text-center"><a href="#" class="red1">Inscription</a> | <a href="#" class="red1">Connexion</a> </p-->
            </form>
          </div>

          <div class="col-lg-4 width100">
            <div class="row">
              <div class="col-lg-8 demo-card-event mdl-card mdl-shadow--0dp" id="decouvrir">
                <div class="mdl-card__title mdl-card--expand">
                  <h4>
                     {{Lang::get('pagination.connexion_decouvrircard') }}
                  </h4>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                  <a class="radius20 mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                     {{Lang::get('pagination.connexion_explore') }}
                  </a>
                  <div class="mdl-layout-spacer"></div>
                  <i class="material-icons" style="color: #FFFF00">explore</i>
                </div>
              </div>
            </div>
          </div>

        </div>
        <!--div class="row">
          <div class="col-lg-4"></div>
          <div class="margin_top50 col-lg-4 demo-card-event mdl-card mdl-shadow--2dp bg-primary">
            <div class="mdl-card__title mdl-card--expand">
              <h4>
                 {{Lang::get('pagination.connexion_decouvrircard') }}
              </h4>
            </div>
            <div class="mdl-card__actions mdl-card--border">
              <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                 {{Lang::get('pagination.connexion_explore') }}
              </a>
              <div class="mdl-layout-spacer"></div>
              <i class="material-icons" style="color: #FFFF00">explore</i>
            </div>
          </div>
        </div-->
      </div>
    </div>

    <div class="margin-top50 height50 phone_height100">

    </div>

    <div id="cookie" class="">
      <div class="mdl-snackbar__text" style="color: #212121">
        <span>Uuniik utilise des cookies</span>
      </div>
      <button class="yellow mdl-button mdl-js-button mdl-js-ripple-effect" id="cookieok" type="button">OK</button>
    </div>

    @include('standard.scripts')
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.17.0/jquery.validate.js"></script>
    <script type="text/javascript" src="{{ asset('js/connexion.js') }}"></script>
  </body>
</html>
