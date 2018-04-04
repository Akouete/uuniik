@extends('index')

@section('content')
  <title>Uuniik | Reponses</title>
  <link rel="stylesheet" href="{{ asset('css/reponses.css') }}">

  <div class="reponsespannel">
    <div class="contbtnques bg_white">
      <div class="long">
        <?php
          for ($i=0; $i < 50 ; $i++) { ?>
            <?php if($i % 2 == 0) { ?>
              <a href="#" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em"id="annuler">
                Is human good by nature ?
              </a href="#">
            <?php } ?>
            <a href="#" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em"id="annuler">
              What do you mean ?
            </a href="#">
        <?php  }
        ?>
      </div>
    </div>

    <div class="container-fluid" style="margin-top: 110px">
      <div class="row">
        <div class="col-lg-3"></div>
        <div class="radius20 col-lg-6 border" style="padding-top: 10px;">

            <?php
            for ($i=0; $i < 20; $i++) { ?>
              <div class="row black1" style="margin-top: 15px;border-bottom: solid 1px rgb(220,220,220)">
                <div class="col-12" style="text-align: right">
                  <button class="mdl-button mdl-js-button mdl-button--icon btncomoption" id="btnm<?=$i?>">
                    <i class="material-icons icondark">more_vert</i>
                  </button>
                  <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"  data-mdl-for="btnm<?=$i?>">
                    <li class="mdl-menu__item"><i class="material-icons gray icon_list">notifications</i>&nbsp; Signaler</li>
                  </ul>
                </div>

                <div class="col-2 center" style="justify-content: right">
                  <i class="material-icons gray margin_auto" style="font-size: 3.5em">account_circle</i>
                </div>
                <div class="col-10">
                  <h5>Dania Oudini Kayel</h5>
                  <p class="black1">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                  <p class="gray" style="font-size: 0.7em">
                    <button class="bg_white2 radius20 mdl-button mdl-js-button mdl-js-ripple-effect" style="font-size: 0.8em"id="annuler">
                      Répondre
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
            <?php }
            ?>

        </div>
        <div class="col-lg-3"></div>
      </div>
      <button id="newpost" class="shadow_4 z_index2 mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect bg-white">
        <i class="material-icons text-dark">edit</i>
      </button>
    </div>

  </div>
  <script type="text/javascript" src="{{ asset('js/AjaxFileScript/reponses.js') }}" ></script>

@endsection
