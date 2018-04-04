@extends('index')
@include('PostsComponent')
@section('content')
  <?php
    if (isset($_GET['posttype'])) {  ?>
      <title>Uuniik | {{ ucfirst($_GET['posttype']) }}</title>
  <?php  } ?>
  <link rel="stylesheet" href="{{ asset('css/posts.css') }}">
  <link rel="stylesheet" href="{{ asset('css/similar.css') }}">
  <div class="postspannel" style="margin-top: 55px">

    <div class="fixedcover none" id="postinterface">

    </div>

    <div class="fixedcover none" id="afficheur">
      <div class="row">
        <div class="col-lg-4"></div>
        <div class="col-lg-4 radius20 bg_white position-relative height100">
          <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
        </div>
      </div>
    </div>

    <div class="fixedcover none" id="annoncefixed">
      <div class="margin_auto divflex col-lg-8 annoncecont">
        <div class="margin_auto mdl-spinner mdl-spinner--single-color mdl-js-spinner is-active" style="color: #fff"></div>
      </div>
    </div>

    <div class="profile_pannel container-fluid" style="margin-top: 65px">
        <div class="row cont">
          <?php
            if (isset($_GET['posttype']) && strtolower($_GET['posttype']) == "image") { ?>
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 postsu">
                <img class="imageu" src="https://i.pinimg.com/736x/f0/9a/b4/f09ab43f8c2786d66456810510238b96--holi-festival-festivals.jpg" alt="">
              </div>
          <?php } ?>
          <?php
            if (isset($_GET['posttype']) && strtolower($_GET['posttype']) == "video") { ?>
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 postsu">
                <iframe style="background: rgb(20,20,20)" class="videopostu" width="854" height="480" src="https://www.youtube.com/embed/GDL7g0VA448" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
              </div>
          <?php } ?>
          <?php
            if (isset($_GET['posttype']) && strtolower($_GET['posttype']) == "text") { ?>
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 postsu textcontu">
                <div class="textcontu2">
                  <h4><i class="material-icons position-relative" style="top: 2px">comment</i> Title of the Text</h4>
                  <p>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab
                  </p>
                </div>
              </div>
          <?php } ?>
          <?php
            if (isset($_GET['posttype']) && strtolower($_GET['posttype']) == "audio") { ?>
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 postsu audiocontu">

                <div class="audioposts">
                  <div class="row contextpost">
                    <div class="col-md-12 contaudiodesc">
                      <h3 class=""><i class="material-icons position-relative" style="top: 2px">headset</i> See the glamour in the air 😂 </h3>
                      <p>
                        E culpa qui officia deserunt mollit anim id est laborum.
                      </p>
                    </div>
                  </div>
                  <div class="bottomaudio black1">
                    <div id="" class="profileaudio round40 " style="background: url(https://i.pinimg.com/736x/95/2f/c6/952fc6fad05c27ebba7bf1f19a88a7a9--big-chop-hairstyles-natural-hairstyles.jpg) center / cover">

                    </div>

                    <audio id="audioPlayer">
                      <source src="{{ asset('audio/coca_cola.M4A')}}">
                    </audio>
                    <button class="mdl-button mdl-js-button mdl-button--icon" id="control">
                      <i class="material-icons" style="color: rgb(50,50,50)">play_arrow</i>
                    </button>
                    <p class="progressBarContainer">
                      <input class="mdl-slider mdl-js-slider" type="range" min="0" max="100" value="1" tabindex="0" id="progressBar">
                    </p>

                    <p id="progressTime"><span class="currentTime">00:00</span><span class="totalduration"> / 09:56</span></p>

                  </div>
                </div>

              </div>
          <?php } ?>
          <?php
            if (isset($_GET['posttype']) && strtolower($_GET['posttype']) == "document") { ?>
              <div class="col-lg-4 col-md-4 col-sm-6 col-xs-12 postsu textcontu">
                <div class="textcontu2">
                  <p>
                    <h4><i class="material-icons position-relative" style="top: 2px">insert_drive_file</i> La guerre des intelligences</h4>
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut lab
                  </p>
                </div>
              </div>
          <?php } ?>

          <div class="col-lg-8 col-md-8 col-sm-6 col-xs-12 radius10 phone_margin_top50" style="padding-bottom: 20px; border: solid 10px rgb(240,240,240)">
            <div class="row">
              <a href="{{ url('AjaxPages/PersonProfil?user_id=11') }}" id="PersonProfil">
                <div id="" class="profileaudio round40 " style="background: url(https://image.afcdn.com/story/20160224/leomie-anderson-868413_w767h767c1cx1463cy1005.jpg) center / cover"></div>
              <div class="imagetext text-dark">
                <span class=""><b>Oudini Kayel Malide</b></span><br>
                <span class="">1000 Posts | Voir les posts</span>
              </div>
              </a>
            </div>

            <div class="row margin_top20">
              <div class="col-lg-12">
                @php
                  //{{ route('Like') }}
                @endphp
                <form class="" action="{{ route('Like') }}" method="post" id="likeform">
                  <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
                  <button type="button" style="border: solid 1px #fff"class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="soutenir">
                    <i class="material-icons gray icon_btn">payment</i> Soutenir gratuitement
                  </button>
                  <button type="button" style="border: solid 1px #fff" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="like">
                    <i class="material-icons gray icon_btn">thumb_up</i> 245K
                  </button>
                  <button type="button" style="border: solid 1px #fff"class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="dislike">
                    <i class="material-icons gray icon_btn">thumb_down</i> 312
                  </button>
                  <button type="button" style="border: solid 1px #fff"class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="subscribe">
                    <i class="material-icons gray icon_btn">favorite</i> 78K
                  </button>
                </form>
              </div>
              <div class="col-lg-12 margin_top20">
                <p><button class="mdl-button mdl-js-button mdl-button--icon"><i class="gray material-icons">share</i></button> Partager sur</p>
                <button style="opacity:0.9; border: solid 1px #fff; background: #1A237E" class="text-white mdl-button mdl-js-button mdl-js-ripple-effect radius20" onclick="window.open('https://www.facebook.com/dialog/feed?app_id=2088370908111257&link=https://i.pinimg.com/originals/51/c7/3c/51c73cdae075b44f848e6cfc48fee15c.jpg&picture=https://i.pinimg.com/originals/51/c7/3c/51c73cdae075b44f848e6cfc48fee15c.jpg&name=My_picture_name&caption=My_caption_neger&description=your_description_neger&redirect_uri=https://i.pinimg.com/originals/51/c7/3c/51c73cdae075b44f848e6cfc48fee15c.jpg', 'facebook_share', 'height=320, width=640, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');">
                  facebook
                </button>
                <button style="opacity:0.9; border: solid 1px #fff" class="bg-primary text-white mdl-button mdl-js-button mdl-js-ripple-effect radius20" onclick="window.open('https://twitter.com/share?url=https://i.pinimg.com/originals/51/c7/3c/51c73cdae075b44f848e6cfc48fee15c.jpg&text=ImageUuniik&via=jamesramonas24', 'facebook_share', 'height=320, width=640, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');">
                  twitter
                </button>
                <button style="opacity:0.9; border: solid 1px #fff; background: #F44336"class="text-white mdl-button mdl-js-button mdl-js-ripple-effect radius20" onclick="window.open('https://plus.google.com/share?url=https://i.pinimg.com/originals/51/c7/3c/51c73cdae075b44f848e6cfc48fee15c.jpg&hl=fr', 'facebook_share', 'height=320, width=640, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');">
                  google+
                </button>
                <button style="opacity:0.9; border: solid 1px #fff" class="bg_red1 text-white mdl-button mdl-js-button mdl-js-ripple-effect radius20" onclick="window.open('https://pinterest.com/pin/create/button/?url=https://i.pinimg.com/originals/51/c7/3c/51c73cdae075b44f848e6cfc48fee15c.jpg&media=https://i.pinimg.com/originals/51/c7/3c/51c73cdae075b44f848e6cfc48fee15c.jpg&description=Image-uuniik', 'facebook_share', 'height=320, width=640, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');">
                  Pinterest
                </button>
              </div>
            </div>
            <div class="row margin_top20">
              <div class="col-lg-12">
                <h1>My wolf head</h1>
                 Lorem ipsum dolor sit amet, . Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla
                 <br><a href="#">#occaecat, #cupidatat, #non proident, #sunt, #in, #culpa, #qui, #officia, #deserunt, #mollit, #anim, #id, #est, #laborum #nappy #afro #hair #benappy #hairstyle #black #noir #paris #france #black #blackness #blackhair #nappyhair #afrohair #afrostyle #naturalhair #braids #tresses #nattes #cheveuxcrepus #afrohairtsyle #africanbeauty</a>
              </div>
            </div>
            <div class="row margin_top20">
              <div class="col-lg-12">
                <button class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="btncom">
                  <i class="material-icons gray icon_btn">message</i> Ajouter un commentaire
                </button>
                <button class="mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em" id="btncom1">
                  commentaires <i class="material-icons gray icon_btn">keyboard_arrow_down</i>
                </button>
              </div>
              <div class="none comdiv col-lg-12">
                <div class="width100">
                  <textarea spellcheck="false" class='margin_top20 text-dark col-lg-12 autoExpand' rows="2" data-min-rows='2' id="comtextarea" placeholder="Ajouter un commentaire"></textarea>
                  <div class="col-lg-12 margin_top10">
                    <button class="mdl-button mdl-js-button radius20 btnques bg_white2" id="closedivcom">
                      Annuler
                    </button>
                    <button class="mdl-button mdl-js-button radius20 btnques blue">
                      Envoyer
                    </button>
                  </div>
                </div>
              </div>

              <div class="none row comdiv1">
                <div class="col-lg-1"></div>
                <div class="col-lg-10">
                  <?php
                  for ($i=0; $i < 2; $i++) { ?>
                    <div class="row black1">
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
                        <p class="black1">Lorem ipsum lorem non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                        <p class="gray" style="font-size: 0.7em">
                          14 mars &nbsp;&nbsp;
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

                    <div class="row">
                      <div class="col-lg-2"></div>
                      <div class="comdiv col-lg-8">
                        <div class="width100">
                          <textarea spellcheck="false" class='margin_top20 text-dark col-lg-12 autoExpand' rows="2" data-min-rows='2' id="comtextarea" placeholder="Répondre à oudini"></textarea>
                          <div class="col-lg-12 margin_top10">
                            <button class="mdl-button mdl-js-button radius20 btnques bg_white2" id="closedivcom" style="font-size: 0.7em">
                              Annuler
                            </button>
                            <button class="mdl-button mdl-js-button radius20 btnques blue" style="font-size: 0.7em">
                              Envoyer
                            </button>
                          </div>
                        </div>
                      </div>
                    </div>

                    <div class="row comdiv1">
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

                  <?php }
                  ?>
                </div>
              </div>

            </div>
          </div>
        </div>
    </div>

        <div class="row cont margin_bottom50 margin_top50">
          <?php
            for ($i=0; $i < 12 ; $i++) { ?>
              <?php
                if (isset($_GET['posttype']) && strtolower($_GET['posttype']) == "audio") { ?>
                  @php
                    GenerateAudioPost();
                  @endphp
                <?php } ?>
                <?php
                  if (isset($_GET['posttype']) && strtolower($_GET['posttype']) == "video") { ?>
                      @php
                        GenerateVideoPost();
                      @endphp
                <?php } ?>

                <?php
                  if (isset($_GET['posttype']) && strtolower($_GET['posttype']) == "document") { ?>
                    @php
                      GenerateDocumentPost();
                    @endphp
                <?php } ?>

                <?php
                  if (isset($_GET['posttype']) && strtolower($_GET['posttype']) == "image") { ?>
                    @php
                      GenerateImagePost();
                    @endphp
                  <?php } ?>

                  <?php
                    if (isset($_GET['posttype']) && strtolower($_GET['posttype']) == "text") { ?>
                      @php
                        GenerateTextPost();
                      @endphp
                <?php } ?>

          <?php  } ?>
        </div>

        <div id="contbtnedit">
          <button id="b2" class="shadow_4 none btnpost mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect bg-white">
            <i class="material-icons text-dark">account_circle</i>
          </button>
          <button id="b1" class="shadow_4 none btnpost mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect bg-white">
            <i class="material-icons text-dark">add</i>
          </button>
          <button id="newpost" class="shadow_4 z_index2 mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect bg-white">
            <i class="material-icons text-dark">edit</i>
          </button>
        </div>
  </div>
  <script type="text/javascript" src="{{ asset('js/AjaxFileScript/similar.js') }}" ></script>

@endsection
