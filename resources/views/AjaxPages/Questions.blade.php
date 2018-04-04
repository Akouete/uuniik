@extends('index')

@section('content')
  <title>Uuniik | Questions</title>
  <link rel="stylesheet" href="{{ asset('css/questions.css') }}">
  <div class="questions_pannel">

      <div class="contbtnques bg_white">
        <div class="long">
          <?php
            for ($i=0; $i < 1 ; $i++) { ?>
                <a href="#" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="annuler">
                  Santé
                </a>
                <a href="#" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="annuler">
                  Insolite
                </a>
                <a href="#" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="annuler">
                  Mode
                </a>
                <a href="#" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="annuler">
                  Musique
                </a>
                <a href="#" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="annuler">
                   Actualités
                </a>
                <a href="#" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="annuler">
                  Art
                </a>
                <a href="#" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em"id="annuler">
                  Blagues
                </a>
                <a href="#" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="annuler">
                  Films
                </a>
                <a href="#" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="annuler">
                  Thug Life
                </a>
                <a href="#" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="annuler">
                  Parodie
                </a>
                <a href="#" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="annuler">
                  Sport
                </a>
                <a href="#" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="annuler">
                  Voyage
                </a>
                <a href="#" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="annuler">
                  L'école
                </a>
                <a href="#" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="annuler">
                  Réseaux sociaux
                </a>
                <a href="#" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="annuler">
                  Philosophie
                </a>
                <a href="#" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="annuler">
                  Réligion
                </a>
                <a href="#" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="annuler">
                  Science
                </a>
                <a href="#" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="annuler">
                  Intelligence artificielle
                </a>
                <a href="#" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="annuler">
                  Economie
                </a>
                <a href="#" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="annuler">
                  Humanité
                </a>
                <a href="#" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="annuler">
                  Espace Aéronautique
                </a>
                <a href="#" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="annuler">
                  Histoire
                </a>
                <a href="#" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="annuler">
                  Politique
                </a>
          <?php  }
          ?>
        </div>
      </div>

  <div class="row cont margin_bottom50" style="margin-top: 110px">
      <?php
          for ($i=0; $i < 50 ; $i++) {
            if($i % 2 == 0) {
              $url = "http://cdn2-elle.ladmedia.fr/var/plain_site/storage/images/loisirs/evasion/plage-sable-blanc/plage-sable-blanc-au-vietnam/80945708-1-fre-FR/Plage-sable-blanc-au-Vietnam.jpg";
            }else {
              $url = "http://holifestival.com/files/userdata/images/holi-feast-3.jpeg";
            }
          ?>

      <div class="col-6 col-sm-6 col-md-4 col-lg-2 contqcard">

        <div class="qcard">
          <div class="qcardtitle" style="background: url(<?=$url?>) center / cover">
            <h4> </h4>
          </div>
          <div class="qcardcenter">
            <p><i class="material-icons icon_list">help</i> Qu'est ce qui est jaune et qui attend ? </p>
            <p>156M Like</p>
          </div>
          <div class="height50 bg-white center qcardbottom">
            <a class="red1 radius20 mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" style="color: #f4c20d;">
              <i class="material-icons" style="color: #f4c20d">lightbulb_outline</i>305M Rep
            </a>
            <button class="mdl-button mdl-js-button mdl-button--icon" id="btnm<?=$i?>">
              <i class="material-icons icondark">more_vert</i>
            </button>
            <ul class="mdl-menu mdl-menu--top-right mdl-js-menu mdl-js-ripple-effect" data-mdl-for="btnm<?=$i?>">
              <li class="mdl-menu__item"><i class="material-icons blue icon_list">thumb_up</i>&nbsp; 305M</li>
              <li class="mdl-menu__item"><i class="material-icons gray icon_list yellow">lightbulb_outline</i>&nbsp; Participer</li>
              <li class="mdl-menu__item"><i class="material-icons gray icon_list">thumb_down</i>&nbsp; 023K</li>
              <li class="mdl-menu__item"><i class="material-icons gray icon_list">notifications</i>&nbsp; Signaler</li>
            </ul>
          </div>
        </div>

      </div>
      <?php    }
      ?>
    </div>
    <button id="newpost" class="shadow_4 z_index2 mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect bg-white">
      <i class="material-icons text-dark">search</i>
    </button>
  </div>
  <script type="text/javascript" src="{{ asset('js/AjaxFileScript/questions.js') }}" ></script>

@endsection
