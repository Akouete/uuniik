<?php
function GenerateAudioPost()
{ ?>
  <div class="col-6 col-sm-4 col-md-3 col-lg-2 posts">
    <div class="audioposts">
      <a class="anostyle" href="{{ url("AjaxPages/Similar?posttype=audio") }}" id="simaudio">
        <div class="row contextpost">
          <div class="col-md-12 contaudiodesc">
            <h3 class=""><i class="material-icons position-relative" style="top: 2px">headset</i> Get out the way !!!</h3>
            <p>Et l'amour rend pas aveugle, otcho tcho tcho tcho !! 😍😍😍</p>
          </div>
        </div>
      </a>
      <div class="bottomaudio black1">
        <a href="{{ url('AjaxPages/PersonProfil') }}" id="PersonProfil">
          <div id="" class="profileaudio round40 " style="background: url(https://i.pinimg.com/736x/95/2f/c6/952fc6fad05c27ebba7bf1f19a88a7a9--big-chop-hairstyles-natural-hairstyles.jpg) center / cover"></div>
        </a>


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

<?php
}
?>

<!---------------- Partie de la video ----------------------------------------->

<?php
function GenerateVideoPost()
{ ?>

  <div class="col-6 col-sm-4 col-md-3 col-lg-2 posts">
    <div class="imageposts" style="background: url(https://africaknows.com/blog/wp-content/uploads/2016/01/bread-basket-01.jpg) center / cover rgb(50,50,50)">
      <!--iframe class="videopost" src="https://www.youtube.com/embed/hhfMqMJZT_8" frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe-->
      <!--video id="my-video" class="videopost" controls preload="auto" width="640" height="264" poster="https://i.pinimg.com/564x/68/c3/59/68c359d184c32a06364b6c2cceddd072.jpg">
        <source src="{{ asset('video/troll.mp4') }}">
        <p class="">
          To view this video please enable JavaScript, and consider upgrading to a web browser that
          <a href="http://videojs.com/html5-video-support/" target="_blank">supports HTML5 video</a>
        </p>
      </video-->
      <a  id="simvideo" class="row height100" href="{{ url("AjaxPages/Similar?posttype=video") }}">
        <button class="mdl-button mdl-js-button mdl-button--icon margin_auto" type="button" style="background-color: rgba(140,140,140,0.5)">
          <i class="material-icons" style="color: #000">play_arrow</i>
        </button>
      </a>
      <div class="bottomaudio">

        <a href="{{ url('AjaxPages/PersonProfil') }}" id="PersonProfil">
          <div id="" class="profileaudio round40 " style="background: url(https://image.afcdn.com/story/20160224/leomie-anderson-868413_w767h767c1cx1463cy1005.jpg) center / cover"></div>
        </a>

        <div class="imagetext text-dark">
          <span class="">Tchangani estelle </span><br>
          <span style="font-size: 0.7em; color: gray">Il y a 14 min Brest, France</span>
        </div>

      </div>
    </div>
  </div>

<?php
}
?>

<!---------------- Partie de la Document ----------------------------------------->

<?php
function GenerateDocumentPost()
{ ?>

  <div class="col-6 col-sm-4 col-md-3 col-lg-2 posts">
    <div class="audioposts">
      <div class="row contextpost">
        <div class="col-md-12 contaudiodesc">
          <a id="simdocument" class="anostyle" href="{{ url("AjaxPages/Similar?posttype=document") }}">
            <h4><i class="material-icons position-relative" style="top: 2px">insert_drive_file</i> La guerre des intelligences</h4>
            <p>L’intelligence artificielle la mort de la mort, la technomédecine ...</p>
          </a>
        </div>
      </div>
      <div class="bottomaudio">
        <a href="{{ url('AjaxPages/PersonProfil') }}" id="PersonProfil">
          <div id="" class="profileaudio round40 " style="background: url(https://i.pinimg.com/originals/8e/43/41/8e43415fd2000da7894c43ae4a7f8d9b.jpg) center / cover"></div>
        </a>

        <div class="imagetext text-dark">
          <span class="">Oudini kayel Malide</span><br>
          <span style="font-size: 0.7em; color: gray">Il y a 08 min Mamoudzou, Mayotte</span>
        </div>

      </div>
    </div>
  </div>

<?php
}
?>

<!---------------- Partie de la Image ----------------------------------------->

<?php
function GenerateImagePost()
{ ?>

  <div class="col-6 col-sm-4 col-md-3 col-lg-2 posts">
      <div class="imageposts" style="background: url(https://i.pinimg.com/564x/f9/ab/21/f9ab218206d70d70b33c38ac63511ec7.jpg) center / cover">
        <a  id="simimage" class="row height100" href="{{ url("AjaxPages/Similar?posttype=image") }}">

        </a>
        <div class="bottomaudio">
          <a href="{{ url('AjaxPages/PersonProfil') }}" id="PersonProfil">
            <div id="" class="profileaudio round40 " style="background: url(https://i.pinimg.com/originals/f4/46/08/f446084cf3fe52bd90e5eb9e27f48231.jpg) center / cover"></div>
          </a>
            <div class="imagetext text-dark">
              <span class="">Messan Aurore</span><br>
              <span style="font-size: 0.7em; color: gray">Il y a 25 min Lagos, Nigeria</span>
            </div>

        </div>
      </div>
  </div>

<?php
}
?>

<!---------------- Partie de la Text ----------------------------------------->

<?php
function GenerateTextPost()
{ ?>

  <div class="col-6 col-sm-4 col-md-3 col-lg-2 posts">
    <div class="audioposts">
      <div class="row contextpost">
        <div class="col-md-12 contaudiodesc">
          <a id="simtext" class="anostyle" href="{{ url("AjaxPages/Similar?posttype=text") }}">
            <h4><i class="material-icons position-relative" style="top: 2px">comment</i> Title of the text</h4>
            <p>Pour essayer de les séduire dans cette grande democratie bien connue de tous 😍🍲😜</p>
          </a>
        </div>
      </div>
      <div class="bottomaudio">
        <a href="{{ url('AjaxPages/PersonProfil') }}" id="PersonProfil">
          <div id="" class="profileaudio round40 " style="background: url(https://i.pinimg.com/originals/9a/80/2d/9a802da5ed0f6289f8f2f0d22ab2a23e.jpg) center / cover"></div>
        </a>
        <div class="imagetext text-dark">
          <span class="">Kangbiete Ester</span><br>
          <span style="font-size: 0.7em; color: gray">Il y a 05 min johanesbourg, South Africa</span>
        </div>

      </div>
    </div>
  </div>


<?php
}
?>

@php
//  GenerateAudioPost('le param');
@endphp
