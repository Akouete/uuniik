@php
if (isset($_COOKIE['uuniik_id'])) {
  $user = DB::select('select * from uuniik_user where user_id = ?', [ $_COOKIE['uuniik_id'] ]);
  Session::put("user", $user[0]);
}else {
  header('location:http://127.0.0.1/site/uuniik_project/uuniik/public/connexion');
}
$fileDirectory = "http://127.0.0.1/site/uuniik_project/uuniik/storage/app/";
Session::put("fileDirectory", $fileDirectory);

@endphp
@include('standard.way')
<!DOCTYPE html>
{{ app('debugbar')->disable() }}
<html lang="{{ app()->getLocale() }}">
  <head>
     @include('standard.header')
     <link rel="stylesheet" href="{{ asset('css/index.css') }}">
  </head>
  <body>

    @include('standard.navbar')

    <div id="loader" class="red1">
      <div class="divflex round40 bg_white shadow_4 margin_auto" id="contspinner">
        <div id="spinner" class="margin_auto mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active"></div>
      </div>
    </div>

    @include('standard.scripts')

    @yield('content')

    <!-- -------------------------- -------------------  Div des commentaires -->
    <div class="fixedcover none">
      <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4 radius20 border bg_white margin_top50">
          <div class="divflex row height50 mdl-color--blue-Grey text-white radius_top15">
            <h5 class="margin_auto">Envoyer des commentaires</h5>
          </div>
          <div class="row">
            <textarea class='text-dark col-lg-12 autoExpand' rows="3" data-min-rows='3' id="commenttextarea" placeholder="Avertissez nous de vos remarques ... "></textarea>
          </div>
          <div class="row">
            <div class="container">
              <p style="font-size:0.7em">Accédez à la page d'<a href="#">assistance juridique</a> afin de demander des modifications de contenu pour des motifs d'ordre juridique. Vos commentaires et des <a href="#">informations</a> supplémentaires seront envoyés à Google. Consultez les <a href="#">Règles de confidentialité et les Conditions d'utilisation</a>.</p>
            </div>
          </div>
          <div class="row">
            <div class="container">
              <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-1">
                <input type="checkbox" id="switch-1" class="mdl-switch__input" checked>
                <span class="mdl-switch__label">Cette remarque est urgente</span>
              </label>
              <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="switch-2">
                <input type="checkbox" id="switch-2" class="mdl-switch__input">
                <span class="mdl-switch__label">Cette remarque n'est pas urgente</span>
              </label>
            </div>
          </div>
          <div class="row cmbottom">
            <button type="button" class="mdl-button mdl-js-button mdl-js-ripple-effect radius20" id="annuler">
              Annuler
            </button>
            <button type="button" class="text-primary mdl-button mdl-js-button mdl-js-ripple-effect radius20" id="annuler">
              Envoyer
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="fixedcover alertsystem none">
      <div class="col-lg-4 col-sm-6 border margin_auto bg-white radius20 text-left" style="padding-top: 10px; padding-bottom: 10px">
        <h3 id="asTitle">Mise à jour réussi !</h3>
        <p id="asContent">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod </p>
        <div class="row">
          <div class="col-6">
            <button class="bg_white2 mdl-button mdl-js-button mdl-js-ripple-effect radius20" id="closealertsystem">
              <i class="text-primary material-icons icondark">keyboard_arrow_left</i>
            </button>
          </div>
          <div class="col-6 text-right" style="justify-content: right">
            <button class="text-danger mdl-button mdl-js-button radius20" id="annuler">
              Non
            </button>
            <button class="text-success bg_white2 mdl-button mdl-js-button radius20">
              Oui
            </button>
          </div>
        </div>
      </div>
    </div>

    <div class="center width100 position-relative margin_top200" style="margin-bottom:80px; background: none" id="spinner2">
      <div class="mdl-spinner mdl-js-spinner is-active"></div>
    </div>

<div class="phone_menu">
  <div class="row">
    <div class="col-lg-3"></div>
    <div class="col-lg-6 bg-white margin0 radius_top15 padding0 menumm">
        <a href="{{ url('/index') }}">
          <button id="btnposts" class="m1 border0 width25 mdl-button mdl-js-button mdl-js-ripple-effect">
            <i class="material-icons " style="color: #db3236">public</i>
          </button>
        </a>
        <a href="javascript:history.go(-1)">
          <button id="btnque" class="m2 border0 width25 mdl-button mdl-js-button mdl-js-ripple-effect">
            <i class="material-icons" style="color: #3cba54">keyboard_backspace</i>
          </button>
        </a>
        <a href="{{ $_SERVER["REQUEST_URI"] }}">
          <button id="btnrep" class="m3 border0 width25 mdl-button mdl-js-button mdl-js-ripple-effect">
            <i class="material-icons" style="color: #f4c20d">refresh</i>
          </button>
        </a>
        <a href="{{ url('/Personnes') }}">
          <button id="btnpers" class="m4 border0 width25 mdl-button mdl-js-button mdl-js-ripple-effect">
            <i class="material-icons " style="color: #4885ed">account_circle</i>
          </button>
        </a>
    </div>
  </div>
</div>

<div class="fixedcover none" id="alertdiv">
  <div class="container">
    <div class="row">
      <div class="col-lg-4"></div>
      <div class="col-lg-4 radius10 border bg-white margin_top50">
        <h1 id="alerttitle">Nnt mollit anim</h1>
        <p id="alertcontent">Lorem ipsum dolor sit amet, consectetur adipisicing elit, est laborum id</p>
        <hr>
        <div class="row" style="justify-content: right">
          <button id="closealertdiv" class="radius20 mdl-button mdl-js-button mdl-js-ripple-effect">
            Ok
          </button>
        </div>
      </div>
    </div>
  </div>
</div>

    <script type="text/javascript" src="{{ asset('js/index.js') }}"></script>
  </body>
</html>
