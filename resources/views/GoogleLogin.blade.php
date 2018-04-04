@php
require $GOOGLECONFIGURL;

if(isset($_GET['code'])) {
  $token = $gClient1->fetchAccessTokenWithAuthCode($_GET['code']);
  $_SESSION['access_token'] = $token;
  $oAuth = new Google_Service_Oauth2($gClient1);
  $userData = $oAuth->userinfo_v2_me->get();
  $_SESSION['user'] = $userData;
}
@endphp
@php
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
              <img class="round40" src="{{ $_SESSION['user']['picture'] }}" alt="">
            </div>
            <div class="row center">

              <h1 id="title" class="">{{Lang::get('pagination.connexion_title') }}</h1>
              <p class="">{{Lang::get('pagination.connexion_title2') }}</p>
            </div>

            <div class="padding_bord20">
              <h4 class="gray">Créer un mot de passe pour terminer</h4>
            </div>

            <form enctype="multipart/form-data" class="padding_bord20" method="post" action="{{ url('/index') }}">
              <input type="hidden" name="_token" value="{{ csrf_token() }}">
              <input type="hidden" name="user_filename" value="<?=$_SESSION['user']['picture']?>">
              <input type="hidden" name="user_name" value="<?=$_SESSION['user']['name']?>">
              <input type="hidden" name="user_mail" value="<?=$_SESSION['user']['email']?>">
              <input type="hidden" name="user_sexe" value="<?=$_SESSION['user']['gender']?>">
              <input type="hidden" name="user_website" value="<?=$_SESSION['user']['link']?>">
              <input type="hidden" name="user_gender" value="<?=$_SESSION['user']['gender']?>">
              <input type="hidden" name="user_locale" value="<?=$_SESSION['user']['locale']?>">
              <input type="hidden" name="google_registration" value="true">
              <input class="input input1 "type="password" name="user_password" value="" placeholder="{{Lang::get('pagination.connexion_password_placeholder') }}">
              <button class="radius20 margin_top20  width100 bg_red1 mdl-button mdl-js-button mdl-js-ripple-effect text-white">
                {{Lang::get('pagination.connexion_btn1') }}  &nbsp;&nbsp;
                <i class="ic_btn material-icons">send</i>
              </button>
              <p class="margin_top10 text-center" style="font-size: 0.7em">{{Lang::get('pagination.connexion_condition') }}</p>
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

    <div class="phone_height100">

    </div>

        @include('standard.scripts')
    <script type="text/javascript" src="{{ asset('js/connexion.js') }}"></script>
  </body>
</html>
