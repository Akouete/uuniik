@extends('index')
@include('PostsComponent')
@section('content')
  @php
    if (isset($_GET['user_id'])) {
      $user = DB::select('select * from uuniik_user where user_id = ?', [ $_GET['user_id']]);
    }else {

    }
  @endphp
  <title>Uuniik | {{ $user[0]->user_name }}</title>
  <link rel="stylesheet" href="{{ asset('css/Profile.css') }}">
  <link rel="stylesheet" href="{{ asset('css/PersonProfil.css') }}">

  <div class="profile_pannel" style="margin-top: 55px">
      <div class="row cont">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="width100 bg-primary center" id="cover1" style="background: url({{ Session::get("fileDirectory").$user[0]->user_coverfilename }}) center / cover;">
            <div class="round100 margin_auto shadow_1 bg-primary" id="profile1" style="background: url({{ Session::get("fileDirectory").$user[0]->user_filename }}) center / cover;"></div>
          </div>
          <div class="row center margin_top50">
            <a class="radius20 bg_white2 red1 mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="margin-top: 10px; color: #D50000;">
              <i class="material-icons red1">favorite</i>&nbsp; Suivre
            </a>
          </div>
          <div class="row margin_auto">
            <div class="divflex col-4 height50 gray hoverwhite2 pointer radius10">
                 <span class="margin_auto"><b>1000</b> <br> Posts</span>
            </div>
            <div class="divflex col-4 height50 gray hoverwhite2 pointer radius10">
                 <span class="margin_auto"><b>{{ $user[0]->user_subscribes }}</b><br> Followers</span>
            </div>
            <div class="divflex col-4 height50 gray hoverwhite2 pointer radius10">
                 <span class="margin_auto"><b>1750</b> <br>Suivi</span>
            </div>
              <ul class="demo-list-icon mdl-list listprofileitem">
                @if (isset($user[0]->user_name))
                  <li class="mdl-list__item radius10">
                    <span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">person</i>
                    {{ $user[0]->user_name }}
                    </span>
                  </li>
                @endif
                <li class="mdl-list__item radius10">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">payment</i>
                    Ce mois: {{ $user[0]->user_moneymonth }} Eur
                  </span>
                </li>
                @if ($user[0]->user_mail)
                  <li class="mdl-list__item radius10">
                    <span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">mail</i>
                    {{ $user[0]->user_mail }}
                  </span>
                  </li>
                @endif
                @if ($user[0]->user_tel)
                  <li class="mdl-list__item radius10">
                    <span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">phone</i>
                    {{ $user[0]->user_tel }}
                  </span>
                  </li>
                @endif
                @if ($user[0]->user_gender)
                  <li class="mdl-list__item radius10">
                    <span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">face</i>
                    {{ $user[0]->user_gender }}
                  </span>
                  </li>
                @endif
                @if ($user[0]->user_locale)
                  <li class="mdl-list__item radius10">
                    <span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">place</i>
                    {{ $user[0]->user_locale }}
                  </span>
                  </li>
                @endif
                @if ($user[0]->user_description)
                  <li class="mdl-list__item radius10">
                    <span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">public</i>
                    {{ $user[0]->user_description }}
                  </span>
                  </li>
                @endif
                @if ($user[0]->user_job)
                  <li class="mdl-list__item radius10">
                    <span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">work</i>
                    {{ $user[0]->user_job }}
                  </span>
                  </li>
                @endif
                @if ($user[0]->user_birthday)
                  <li class="mdl-list__item radius10">
                    <span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">cake</i>
                    {{ $user[0]->user_birthday }}
                  </span>
                  </li>
                @endif
                @if ($user[0]->user_website)
                  <li class="mdl-list__item radius10">
                    <span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">link</i>
                    {{ $user[0]->user_website }}
                  </span>
                  </li>
                @endif
              </ul>
          </div>
        </div>
        <div class="divflex col-lg-8 col-md-8 col-sm-6 col-xs-12 radius10 rightinfo" style="border: solid 10px rgb(240,240,240)">
          <div class="margin_auto">
            <h1>Help us make the world a better place</h1> This place is really reserved for chatbot artificial intelligency technology
          </div>
        </div>
      </div>

      <div class="postspannel" style="margin-top: 65px">

        <div class="container">
          <div class="row center">
            <button style="border: solid 1px #fff" class="bg_white mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em"id="annuler">
              Filtrer par <i class="material-icons gray icon_btn">keyboard_arrow_right</i>
            </button>
            <button style="border: solid 1px #fff" class="blue bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em"id="annuler">
              <i class="material-icons icon_btn">image</i> Image
            </button>
            <button style="border: solid 1px #fff; color: #FF5722" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em"id="annuler">
              <i class="material-icons icon_btn">headset</i> Audio
            </button>
            <button style="border: solid 1px #fff; color: #C62828" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em"id="annuler">
              <i class="material-icons icon_btn">play_arrow</i> Video
            </button>
            <button style="border: solid 1px #fff" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em"id="annuler">
              <i class="material-icons gray icon_btn">comment</i> Text
            </button>
            <button style="border: solid 1px #fff; color: #2E7D32" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em"id="annuler">
              <i class="material-icons icon_btn">insert_drive_file</i> Document
            </button>
          </div>
        </div>

        <div class="row cont margin_top20 margin_bottom50">
          <?php
            for ($i=0; $i < 3 ; $i++) { ?>

              @php
                GenerateAudioPost();
                GenerateVideoPost();
                GenerateDocumentPost();
                GenerateImagePost();
                GenerateTextPost();
              @endphp


          <?php  } ?>
        </div>


      </div>
  </div>

  <script type="text/javascript" src="{{ asset('js/AjaxFileScript/PersonProfil.js') }}" ></script>

@endsection
