@php
$fileDirectory = "http://127.0.0.1/site/uuniik_project/uuniik/storage/app/";
@endphp
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    @include('standard.header')
   <title>😜 Déchaine Toi !</title>
   <link rel="stylesheet" href="{{ asset('css/dechainetoi.css') }}">
  </head>
  @include('standard.scripts')
  {{ app('debugbar')->disable() }}

  <body>

    @php
     //Selection des posts à afficher
     $posts = DB::select('select * from uuniik_posts');
    @endphp

    <div class="container">
      <div class="col-lg-4 center">
        <h3 style="color: #3F51B5;"><a href="{{ url("dechainetoi") }}"><i class="material-icons margin_auto" id="editicone" style="color: #3F51B5; font-size: 2em; top: 19px">visibility_off</i></a>😜 Déchaine toi !</h3>
        <p class="gray" style="font-size: 0.5em">Ici les gens se déchaînent, Balance tout ce que t'as, BALANCE tout ce que tu veux => ...</p>
      </div>
    </div>

     <div class="container-fluid margin_top50" style="margin-bottom: 100px;">
       <div class="row">
         <div class="col-lg-3"></div>
         <div class="radius20 col-lg-6 border bg_white" style="padding-top: 10px;">

           <div class="center col-lg-12 position-relative margin_top50" style="margin-bottom:50px; background: none" id="spinner2">
             <div class="mdl-spinner mdl-js-spinner is-active"></div>
           </div>


               @for ($i=0; $i < sizeof($posts); $i++)

                 @php
                 //Selection des donnée du publicateur du post
                   $user = DB::select('select * from uuniik_user where user_id = ?', [$posts[$i]->post_userid]);

                   $userprofile = $fileDirectory.$user[0]->user_filename;
                   $user_id = $user[0]->user_id;
                   $date = $posts[$i]->created_at;
                   $posttitle = $posts[$i]->post_title;
                   $postcontent = $posts[$i]->post_content;
                   $location = $posts[$i]->post_location;

                   if ($posts[$i]->post_type == "audio") {
                     $postlink = url("/Similar/audio/".$posts[$i]->post_id);
                   }
                   if ($posts[$i]->post_type == "doc") {
                     $postlink = url("/Similar/document/".$posts[$i]->post_id);
                   }
                   if ($posts[$i]->post_type == "img") {
                     $postlink = url("/Similar/image/".$posts[$i]->post_id);
                   }
                   if ($posts[$i]->post_type == "text") {
                     $postlink = url("/Similar/text/".$posts[$i]->post_id);
                   }
                   if ($posts[$i]->post_type == "video") {
                     $postlink = url("/Similar/video/".$posts[$i]->post_id);
                   }

                 @endphp


               <div class="row black1" style="margin-top: 15px;border-bottom: solid 1px rgb(220,220,220)">
                 <div class="col-12" style="text-align: right">
                   <button class="mdl-button mdl-js-button mdl-button--icon btncomoption" id="btnm<?=$i?>">
                     <i class="material-icons icondark">more_vert</i>
                   </button>
                   <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"  data-mdl-for="btnm<?=$i?>">
                    <a href="{{ $postlink }}" class="anostyle"><li class="mdl-menu__item"><i class="material-icons gray icon_list">zoom_out_map</i>&nbsp; Agrandir</li></a>
                     <li class="mdl-menu__item text-primary"><i class="material-icons icon_list">share</i>&nbsp; Twitter</li>
                     <li class="mdl-menu__item" style="color: #F44336"><i class="material-icons icon_list">share</i>&nbsp; Google +</li>
                     <li class="mdl-menu__item red1"><i class="material-icons icon_list">share</i>&nbsp; Pinterest</li>
                   </ul>
                 </div>

                 <div class="col-2 center" style="justify-content: right">
                   <i class="material-icons gray margin_auto profileic" style="">account_circle</i>
                 </div>
                 <div class="col-10">
                   <h5>{{ $posttitle }}</h5>
                   <p class="black1">{{ $postcontent }}</p>
                   <p class="text-primary" style="font-size: 0.9em">
                     <span class="text-dark"><i class="material-icons" style="position: relative; top: 5px;">place</i> {{$location }} |</span><i class="material-icons" style="position: relative; top: 5px;">date_range</i> {{ $date }} &nbsp;&nbsp;
                    </p>
                    <p>
                      <button class="bg_white2 radius20 mdl-button mdl-js-button mdl-js-ripple-effect" style="font-size: 0.8em" id="btncom">
                        Commenter...
                      </button>&nbsp;&nbsp;
                      <button class="mdl-button mdl-js-button mdl-button--icon">
                        <i class="material-icons" style="font-size: 0.9em">thumb_up</i>
                      </button>33K &nbsp;&nbsp;
                      <button class="mdl-button mdl-js-button mdl-button--icon">
                        <i class="material-icons" style="font-size: 0.9em">thumb_down</i>
                      </button>447
                    </p>

                     <div class="row none comdiv">
                       <div class="comdiv col-lg-12">
                         <form class="width100"  action="{{ route('Post') }}" id="comform">
                           <textarea spellcheck="false" class='text-dark col-lg-12' rows="2" id="comtextarea" placeholder="Ajouter un commentaire"></textarea>
                           <div class="col-lg-12 margin_top10">
                             <button class="mdl-button mdl-js-button radius20 btnques bg_white2" id="closedivcom">
                               Annuler
                             </button>
                             <button class="mdl-button mdl-js-button radius20 btnques blue" type="submit">
                               Publier
                             </button>
                           </div>
                         </form>
                       </div>
                     </div>

                     <p class="black pointer" id="btncom1">2048 commentaires <button class="mdl-button mdl-js-button mdl-button--icon"><i class="black material-icons">keyboard_arrow_down</i></button></p>

                     <div class="row none comdiv1">
                       <div class="col-lg-2"></div>
                       <div class="col-lg-8">
                         @for ($j=0; $j < 2; $j++)
                           <div class="row black1">
                             <div class="col-12" style="text-align: right">
                               <button class="mdl-button mdl-js-button mdl-button--icon btncomoption" id="btnm<?=$i.$j?>">
                                 <i class="material-icons icondark">more_vert</i>
                               </button>
                               <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"  data-mdl-for="btnm<?=$i.$j?>">
                                 <li class="mdl-menu__item"><i class="material-icons gray icon_list">notifications</i>&nbsp; Signaler</li>
                               </ul>
                             </div>

                             <div class="col-2 center" style="justify-content: right">
                               <i class="material-icons gray margin_auto" style="font-size: 2.5em">account_circle</i>
                             </div>
                             <div class="col-10">
                               <h5>B2Z0 Anonymous</h5>
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
                         @endfor

                       </div>
                     </div>


                     @if($posts[$i]->post_type == "img")
                       @php
                       $imglink = $fileDirectory.$posts[$i]->post_filename;
                       @endphp

                       <div class="row center">
                         <img src="{{ $imglink }}" alt="" class="imgpost img-fluid">
                       </div>
                     @endif

                     @if($posts[$i]->post_type == "audio")
                       @php
                       $audiolink = $fileDirectory.$posts[$i]->post_filename;
                       @endphp

                       <style media="screen">
                         .audiodiv {
                           margin-top: 0;
                          margin-bottom: 70px;
                          left: 0;
                          width: 100%;
                         }
                       </style>
                       <div class="row center">
                         <div class="audiodiv position-relative">
                           <audio id="audioPlayer">
                             <source src="{{ $audiolink }}">
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
                     @endif

                     @php


                     if ($posts[$i]->post_type == "video") {
                       $postlink = url("/Similar/video/".$posts[$i]->post_id);
                       $miniaturelink = $fileDirectory.$posts[$i]->post_videominiature;
                     }
                     @endphp

                     @if($posts[$i]->post_type == "doc")
                       @php
                       $postlink = url("/Similar/text/".$posts[$i]->post_id);
                       @endphp

                       <div class="row center">
                         <a href="{{ $postlink }}">
                           <h4><i class="material-icons position-relative" style="top: 2px">insert_drive_file</i> {{ $posttitle }} </h4>
                         </a>
                       </div>
                     @endif

                     @if($posts[$i]->post_type == "video")
                       @php
                       $postlink = url("/Similar/text/".$posts[$i]->post_id);
                       @endphp

                       <div class="row center">
                         <video class="videopostu radius20" src="{{ $postlink }}" poster="{{ $miniaturelink }}" controls>

                         </video>
                       </div>
                     @endif

                 </div>
               </div>
          @endfor

          <div class="center col-lg-12 position-relative margin_top50" style="margin-bottom:50px; background: none" id="spinner2">
            <div class="mdl-spinner mdl-js-spinner is-active"></div>
          </div>

         </div>
         <div class="col-lg-3"></div>
       </div>
     </div>

     <div class="bottom">
       <div class="row center">
         @include('standard/emoji')
       </div>

       <div class="row center" style="" id="previsualisation">

         <button type="button" class="mdl-button mdl-js-button mdl-button--icon gray none z_index1 bg_white2" title="Supprimer les medias" id="deleteprevdom">
           <i class="material-icons">close</i>
         </button>

         <img class="none imgpreview img-responsive" src="" alt="">

         <!---------- Video ---------------->
         <div class="none Videopreview">
           <button type="button" id="addminiature" style="border: solid 1px #fff" class="blue bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em"id="">
             <i class="material-icons icon_btn">image</i>Add Miniature
           </button>
           <video id="Videopreview" class="margin_top10 col-lg-12" controls>
             <source src=""></source>
             <p class="">
               To view this video please enable JavaScript, and consider upgrading to a web browser that
               <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
             </p>
           </video>
         </div>

         <!----------audio---------------->
         <div class="audiopreview black1 none">
           <audio id="audioPlayer">
             <source id="PreviewAudioPlayer" src=""></source>
           </audio>
           <button type="button" class="mdl-button mdl-js-button mdl-button--icon previewcontrol" id="control">
             <i class="material-icons" style="color: rgb(50,50,50)">play_arrow</i>
           </button>
           <p class="progressBarContainer">
             <input class="mdl-slider mdl-js-slider" type="range" min="0" max="100" value="1" tabindex="0" id="progressBar">
           </p>
           <p id="progressTime"><span class="currentTime">00:00</span><span class="totalduration"> / 09:56</span></p>
         </div>
         <a href="#" id="previewDoc" download="" class="none docpreview blue">
             <h4><i class="material-icons position-relative" style="top: 2px">insert_drive_file</i><span id="previewdocname"> La guerre des intelligences</span></h4>
         </a>
         <span class="none mdl-chip mdl-chip--contact mdl-chip--deletable" id="urlcont">
           <i class="mdl-chip__contact material-icons" style="color: rgb(50,50,50)">link</i>
           <a href="#" class="mdl-chip__text">http://uuniik.com/uuniik/PersonProfil</a>
           <a href="#" class="mdl-chip__action" id="closeurlcont"><i class="material-icons">cancel</i></a>
         </span>
         <span class="none mdl-chip mdl-chip--contact mdl-chip--deletable" id="embededurlcont">
           <i class="text-danger mdl-chip__contact material-icons">play_arrow</i>
           <a href="#" class="text-danger mdl-chip__text">Embeded video added</a>
           <a href="#" class="mdl-chip__action" id="closeembededurlcont"><i class="material-icons">cancel</i></a>
         </span>
         <div class="col-lg-12 none" id="linkinputcont">
           <input id="linkinputo" class="margin_auto input input1 linkinput" type="text" name="" value="" placeholder="https://example.com">
           <i class="closer material-icons pointer" style="color: rgb(50,50,50)" id="closelinkinput">arrow_forward</i>
         </div>
         <div class="col-lg-12 none" id="youtubeiframeinputcont">
           <input id="embededlinkinput" class="margin_auto input input1 linkinput" type="text" name="" value="" placeholder="Youtube | Dailymotion <iframe>...</iframe>">
           <i class="closer material-icons pointer" style="color: rgb(50,50,50)" id="closeyoutubeiframeinput">arrow_forward</i>
         </div>
       </div>
       <div class="row center none margin_top10" id="linksrow">
         <button type="button" id="normallink" style="border: solid 1px #fff" class="blue bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em"id="">
           <i class="material-icons icon_btn">link</i> Normal link
         </button>
         <button type="button" style="border: solid 1px #fff; color: #C62828" id="youtubeiframelink" class="bg_white2 mdl-button mdl-js-button radius20 btnques" style="font-size: 0.8em"id="">
           <i class="material-icons icon_btn">play_arrow</i>Youtube video code
         </button>
       </div>
       <div class="row center">
         <div class="margin_auto radius20 bg_white none" id="recordprogress">
           <button type="button" class="mdl-button mdl-js-button mdl-button--icon bg-danger text-white" id="cancelrecord">
             <i class="material-icons">close</i>
           </button>
           <span id="minuteur">&nbsp;&nbsp; 00 : 00 &nbsp;&nbsp;</span>
           <button type="button" class="mdl-button mdl-js-button mdl-button--icon bg-success text-white" id="sendrecord">
             <i class="material-icons">done</i>
           </button>
         </div>
       </div>



       <form class="row center" action="{{ route('Post') }}" enctype="multipart/form-data" id="editcontainer">

         <input type="hidden" name="" value="" id="post_location">
         <input class="none" type="file" name="" value="" id="postfileinput">
         <input class="none" type="file" name="" value="" id="videominiature">
         <a href="#" id="voicelink"></a>

         <div class="col-lg-1 m10" id="linkp">
            <a href="{{ url("apropos") }}"><i class="material-icons margin_auto" id="editicone" style="color: #3F51B5; font-size: 2.0em">visibility_off</i></a>
         </div>
         <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
         <input id="titleinput" class="phone_none input input1" style="border:0" type="text" name="" value="" placeholder="Pseudo">
         <textarea class='text-dark col-lg-4 autoExpand2' data-min-rows='3' id="principaltextarea" placeholder="Déchaine toi 😂 !"></textarea>
         <button type="button" class="mdl-button mdl-js-button mdl-button--icon bg_white2" id="mplus" title="Developper">
           <i class="material-icons icondark">keyboard_arrow_up</i>
         </button>
         <div class="col-lg-3 m10" id="lesbtn">
           <button type="button" class="mdl-button mdl-js-button mdl-button--icon" id="showemoji" title="Utiliser les emojis">
             <i class="material-icons icondark">mood</i>
           </button>
           <button type="button" class="mdl-button mdl-js-button mdl-button--icon" id="photobutton" title="Ajouter une photo ou video">
             <i class="material-icons icondark">camera_alt</i>
           </button>
           <button type="button" class="mdl-button mdl-js-button mdl-button--icon" id="documentbutton" title="Ajouter un fichier cocument">
             <i class="material-icons icondark">insert_drive_file</i>
           </button>
           <button type="button" class="mdl-button mdl-js-button mdl-button--icon" id="audiobutton" title="Ajouter un fichier audio">
             <i class="material-icons icondark">headset</i>
           </button>
           <button type="button" class="mdl-button mdl-js-button mdl-button--icon" id="localisation" title="Ajouter ma position">
             <i class="material-icons icondark">place</i>
           </button>
           <span class="blue" id="gettedposition"></span>
           <button type="button" class="mdl-button mdl-js-button mdl-button--icon" id="mic" title="Créer un post vocale">
             <i class="material-icons icondark">mic</i>
           </button>
           <button type="button" class="mdl-button mdl-js-button mdl-button--icon" id="link" title="Ajouter un lien">
             <i class="material-icons icondark">link</i>
           </button>
           <button type="submit" class="mdl-button mdl-js-button mdl-button--icon" id="publier" title="Send">
             <i class="material-icons text-primary">send</i>
           </button>
         </div>
     </form>


     </div>

   <script type="text/javascript" src="{{ asset('js/externe/autosize.js') }}" ></script>
   <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0UnGhNIJmNOm9lZRJ7oTB9Qxwum644C8&libraries=places&callback=initialize" async defer></script>
   <script type="text/javascript" src="{{ asset('js/AjaxFileScript/dechainetoi.js') }}" ></script>
  </body>
</html>
