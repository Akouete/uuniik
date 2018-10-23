{{ session_start() }}
@extends('index')
@section('content')
@include('PostsComponent')

  <title>Uuniik | Profile</title>
  <link rel="stylesheet" href="{{ asset('css/profile.css') }}">

  <?php
  $checked1 = false; $checked2 = false; $checked3 = false;
  $gender = "Autre";
    if (!empty(Session::get("user")->user_gender)) {
      if(Session::get("user")->user_gender == "male") {
        $gender = "Homme";
        $checked1 = "checked";
      }
      if(Session::get("user")->user_gender == "female") {
        $gender = "Femme";
        $checked2 = "checked";
      }
      if(Session::get("user")->user_gender == "other") {
        $gender = "Autre";
        $checked3 = "checked";
      }
    }
  if(isset(Session::get("user")->id)) {
    Session::get("user")->id = Session::get("user")->id;
  }else {
    if (isset(Session::get("user")->user_id)) {
      Session::get("user")->id = Session::get("user")->user_id;
    }
  }
  ?>
  <?php
  function GenerateHtmlList($session, $elsesession, $icon, $input_name)
  {
  ?>

  <li class="position-relative mdl-list__item radius10">
    <span class="mdl-list__item-primary-content" id="listcontent">
    <i class="material-icons mdl-list__item-icon">{{ $icon }}</i>
    <span id="listtext">
      @if ($session)
        {{ $session }}
      @else
        {{ $elsesession }} &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      @endif
    </span>
    </span>
    <span class="gray mdl-list__item-secondary-action select_none" id="edit"><i class="material-icons">edit</i></span>
    <input class="invisible editinput input input1" type="text" name="{{ $input_name }}" value="" placeholder="{{ $elsesession }}" id="editinput">
    <button class="invisible mdl-button mdl-js-button mdl-button--icon" id="closeinput">
      <i class="text-danger material-icons">clear</i>
    </button>
    <button class="invisible mdl-button mdl-js-button mdl-button--icon" id="done">
      <i class="text-success material-icons">done</i>
    </button>
  </li>
  <?php
  }
  ?>
  <input type="hidden" id="user_id" value="{{ Session::get("user")->id }}">
  <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">

  <div class="profile_pannel margin_bottom50" style="margin-top: 55px;">
      <div class="row cont">
        <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12">
          <div class="width100 bg-primary center pointer" id="cover1" title="Modifier la photo" style="background: url( {{ Session::get("fileDirectory").Session::get("user")->user_coverfilename }} ) center / cover;">
            <button class="none position-absolute margin_auto mdl-button mdl-js-button mdl-button--icon bg-success text-white" id="donecover">
              <i class="material-icons">done</i>
            </button>
            <button title="Options supplémentaire"class="mdl-button mdl-js-button mdl-button--icon btn_right text-white" style="background: rgba(240,240,240,0.5)" id="optionsup">
              <i class="material-icons">keyboard_arrow_down</i>
            </button>
            <ul class="radius20 mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="optionsup">
              <li class="mdl-menu__item" id=""><i class="material-icons icon_list">account_circle</i>&nbsp; Devenir Annonçeur</li>
              <li class="mdl-menu__item" id=""><i class="material-icons icon_list">person_outline</i>&nbsp; Déconnexion</li>
              <li class="mdl-menu__item text-danger" id=""><i class="material-icons icon_list">delete</i>&nbsp; Delete Account</li>
            </ul>
            <div class="divflex round100 overflow_hidden margin_auto shadow_1 bg-primary" id="profile1" style="background: url( {{ Session::get("fileDirectory").Session::get("user")->user_filename }} ) center / cover;">
              <button class="none margin_auto mdl-button mdl-js-button mdl-button--icon bg-success text-white" id="doneprofile">
                <i class="material-icons">done</i>
              </button>
            </div>
          </div>

          <form id="photoform" action="{{ route('UpdateProfile') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="file" name="coverfile" value="" id="coverfile" class="none">
            <input type="file" name="profilefile" value="" id="profilefile" class="none">
          </form>
          <div class="margin_top50 row margin_auto">
            <div class="divflex col-4 height50 gray hoverwhite2 pointer radius10">
                 <span class="margin_auto"><b>1000</b> <br> Posts</span>
            </div>
            <div class="divflex col-4 height50 gray hoverwhite2 pointer radius10">
                 <span class="margin_auto"><b>750</b><br> Followers</span>
            </div>
            <div class="divflex col-4 height50 gray hoverwhite2 pointer radius10">
                 <span class="margin_auto"><b>1750</b> <br>Suivi</span>
            </div>
              <ul class="demo-list-icon mdl-list listprofileitem">
                @php
                  GenerateHtmlList(Session::get("user")->user_name, "Nom", "person", "user_name");
                @endphp
                <li class="mdl-list__item radius10">
                  <span class="mdl-list__item-primary-content">
                  <i class="material-icons mdl-list__item-icon">payment</i>
                  @if (Session::get("user")->user_moneymonth && Session::get("user")->user_moneytotal)
                    Ce mois: 1000 Eur / Total: 25 000 Eur
                  @else
                    Ce mois Eur / Total: 0 Eur
                  @endif
                  </span>
                </li>
                @php
                  GenerateHtmlList(Session::get("user")->user_card, "Credit card: 000 - 000 - 000 - 000", "monetization_on", "user_card");
                @endphp
                @php
                  GenerateHtmlList(Session::get("user")->user_mail, "Email Adress", "mail", "user_mail");
                @endphp
                @php
                  GenerateHtmlList(Session::get("user")->user_tel, "Phone Number", "phone", "user_tel");
                @endphp

                <div class="container sexcont none">
                  <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="sex1">
                    <input type="radio" id="sex1" class="mdl-radio__button" name="sex" value="Femme" {{ $checked2 }}>
                    <span class="mdl-radio__label">Femme</span>
                  </label><br>
                  <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="sex2">
                    <input type="radio" id="sex2" class="mdl-radio__button" name="sex" value="Homme" {{ $checked1 }}>
                    <span class="mdl-radio__label">Homme</span>
                  </label><br>
                  <label class="mdl-radio mdl-js-radio mdl-js-ripple-effect" for="sex3">
                    <input type="radio" id="sex3" class="mdl-radio__button" name="sex" value="Autre" {{ $checked3 }}>
                    <span class="mdl-radio__label">Autre</span>
                  </label>
                </div>


                <li class="mdl-list__item radius10">
                  <span class="mdl-list__item-primary-content">
                    <i class="material-icons mdl-list__item-icon">face</i>
                    <span id="sexText">{{ $gender }}</span>
                  </span>
                  <span class="gray mdl-list__item-secondary-action" id="sexedit"><i class="material-icons">edit</i></span>
                </li>
                @php
                  GenerateHtmlList(Session::get("user")->user_locale, "Emplacement, Adresse", "place", "user_locale");
                @endphp
                @php
                  GenerateHtmlList(Session::get("user")->user_description, "Statut Public", "public", "user_description");
                @endphp
                @php
                  GenerateHtmlList(Session::get("user")->user_job, "Profession", "work", "user_job");
                @endphp
                @php
                  GenerateHtmlList(Session::get("user")->user_birthday, "Birth Day", "cake", "user_birthday");
                @endphp
                @php
                  GenerateHtmlList(Session::get("user")->user_website, "Autre Lien public", "link", "user_website");
                @endphp
              </ul>
          </div>
        </div>
        <div id="greatcontent" class="bg_white phone_margin_top50 col-lg-8 col-md-8 col-sm-6 col-xs-12 radius10" style="border: solid 10px rgb(240,240,240)">
          <button type="button" class="mdl-button mdl-js-button mdl-button--icon" id="btnoptions" title="Ajouter un lien">
            <i class="material-icons">more_vert</i>
          </button>
          <ul class="radius20 mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="btnoptions">
            <li class="mdl-menu__item" id="fullscreen"><i class="material-icons gray icon_list">zoom_out_map</i>&nbsp; Plein écran</li>
          </ul>
          <div class="center margin_top10">
            <button style="border: solid 1px #fff;" class="bg_white2 mdl-button mdl-js-button radius20 btnques" id="showgraphdiv">
              <i class="material-icons icon_btn">trending_up</i> Monetisation
            </button>
            <button style="border: solid 1px #fff;" class="gray bg_white2 mdl-button mdl-js-button radius20 btnques" id="showcomdiv">
              <i class="material-icons icon_btn">comment</i> Mes commentaires
            </button>
            <a href="#mesposts">
              <button style="border: solid 1px #fff;" class="gray bg_white2 mdl-button mdl-js-button radius20 btnques" id="annuler">
                <i class="material-icons icon_btn">view_column</i> Mes posts
              </button>
            </a>
          </div>
          <div class="" id="graphdiv">
            <div class="center margin_top10">
              <span class="mdl-chip mdl-chip--contact">
                <span class="mdl-chip__contact mdl-color--teal mdl-color-text--white">R</span>
                <span class="mdl-chip__text">Graph Real Time</span>
              </span>
              <span class="mdl-chip mdl-chip--contact">
                <span class="mdl-chip__contact mdl-color--blue mdl-color-text--white">D</span>
                <span class="mdl-chip__text">Graph By Day</span>
              </span>
              <span class="mdl-chip mdl-chip--contact">
                <span class="mdl-chip__contact mdl-color--pink mdl-color-text--white">W</span>
                <span class="mdl-chip__text">Graph By Week</span>
              </span>
              <span class="mdl-chip mdl-chip--contact">
                <span class="mdl-chip__contact mdl-color--purple mdl-color-text--white">M</span>
                <span class="mdl-chip__text">Graph By Month</span>
              </span>
              <span class="mdl-chip mdl-chip--contact">
                <span class="mdl-chip__contact mdl-color--red mdl-color-text--white">Y</span>
                <span class="mdl-chip__text">Graph By Year</span>
              </span>
            </div>
            <div class="row margin_top20">
              <div class="col-lg-12">
            		<canvas class="row" id="linereal"></canvas>
            	</div>
              <div class="col-lg-12">
                <canvas class="row" id="linemonth"></canvas>
              </div>
            </div>
          </div>
          <div class="none" id="comdiv">
            @for ($i=0; $i < 2; $i++)
              <div class="row black1">
                <div class="col-12" style="text-align: right">
                  <button class="mdl-button mdl-js-button mdl-button--icon btncomoption" id="btnm<?=$i?>">
                    <i class="material-icons icondark">more_vert</i>
                  </button>
                  <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"  data-mdl-for="btnm<?=$i?>">
                    <li class="mdl-menu__item"><i class="material-icons gray icon_list">delete</i>&nbsp; Supprimer</li>
                  </ul>
                </div>

                <div class="col-2 center" style="justify-content: right">
                  <i class="material-icons gray margin_auto" style="font-size: 3.5em">account_circle</i>
                </div>
                <div class="col-10">
                  <h5>AKOUETE Ekoué</h5>
                  <p class="black1">Lorem ipsum lorem non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore caecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  <p class="gray" style="font-size: 0.7em">
                    14 mars &nbsp;&nbsp;
                    <button class="bg_white2 radius20 mdl-button mdl-js-button mdl-js-ripple-effect" style="font-size: 0.8em"id="annuler">
                      Modifier
                    </button>&nbsp;&nbsp;
                    <button class="mdl-button mdl-js-button mdl-button--icon">
                      <i class="material-icons" style="font-size: 0.9em">thumb_up</i>
                    </button>33K &nbsp;&nbsp;
                    <button class="mdl-button mdl-js-button mdl-button--icon">
                      <i class="material-icons" style="font-size: 0.9em">thumb_down</i>
                    </button>447
                    </p>
                    <p class="black">Afficher les réponses <button class="mdl-button mdl-js-button mdl-button--icon"><i class="black material-icons">keyboard_arrow_down</i></button></p>
                </div>
              </div>

              <div class="row">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">
                  <?php
                  for ($j=0; $j < 2; $j++) { ?>
                    <div class="row black1">
                      <div class="col-12" style="text-align: right">
                        <button class="mdl-button mdl-js-button mdl-button--icon btncomoption" id="btnm<?=$j?>">
                          <i class="material-icons icondark">more_vert</i>
                        </button>
                        <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"  data-mdl-for="btnm<?=$j?>">
                          <li class="mdl-menu__item"><i class="material-icons gray icon_list">notifications</i>&nbsp; Signaler</li>
                        </ul>
                      </div>

                      <div class="col-2 center" style="justify-content: right">
                        <i class="material-icons gray margin_auto" style="font-size: 2.5em">account_circle</i>
                      </div>
                      <div class="col-10">
                        <h5>Malia Sasha</h5>
                        <p class="black1">Lorem ipsum lorem non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <p class="gray" style="font-size: 0.7em">
                          02 Avril &nbsp;&nbsp;
                          <button class="mdl-button mdl-js-button mdl-button--icon">
                            <i class="material-icons" style="font-size: 0.9em">thumb_up</i>
                          </button>33K &nbsp;&nbsp;
                          <button class="mdl-button mdl-js-button mdl-button--icon">
                            <i class="material-icons" style="font-size: 0.9em">thumb_down</i>
                          </button>447
                          </p>
                      </div>
                    </div>
                  <?php }
                  ?>
                </div>
              </div>

            @endfor
          </div>
        </div>
      </div>
      <div class="row margin_top50 cont" id="mesposts">
        <?php
          for ($i=0; $i < 2 ; $i++) { ?>

            @php
              /*GenerateAudioPost();
              GenerateVideoPost();
              GenerateDocumentPost();
              GenerateImagePost();
              GenerateTextPost();*/
            @endphp

        <?php  } ?>
      </div>
  </div>
  <div class="height50 margin_top50"></div>
  <div id="map"></div>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0UnGhNIJmNOm9lZRJ7oTB9Qxwum644C8&libraries=places&callback=initialize" async defer></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.bundle.min.js"></script>
  <script type="text/javascript" src="{{ asset('js/AjaxFileScript/profile.js') }}"></script>

@endsection
