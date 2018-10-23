<?php
function GenerateAudioPost($audiolink, $userprofile, $posttitle, $postcontent, $userprofilelink, $postlink)
{ ?>
  <div class="col-6 col-sm-4 col-md-3 col-lg-2 posts">
    <div class="postgroup1">

      <!--button title="Options supplémentaire"class="mdl-button mdl-js-button mdl-button--icon btn_right text-white" id="postoption">
        <i class="material-icons">more_horiz</i>
      </button>
      <ul class="radius20 mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="postoption">
        <li class="mdl-menu__item" id=""><i class="material-icons icon_list">edit</i>&nbsp; Modifier</li>
        <li class="mdl-menu__item text-danger" id=""><i class="material-icons icon_list">delete</i>&nbsp; Supprimer</li>
      </ul-->
      <div class="audioposts">
        <a class="anostyle" href="{{ $postlink }}" id="simaudio">
          <div class="row contextpost">
            <div class="col-md-12 contaudiodesc">
              <h3 class=""><i class="material-icons position-relative" style="top: 2px">headset</i> {{ $posttitle }}</h3>
              <p><span class="postdesc">{{ $postcontent }}</span> <u id="plus">Plus...</u></p>
            </div>
          </div>
        </a>
      </div>
    </div>

    <div class="bottomaudio black1">
      <a href="{{ $userprofilelink }}" id="PersonProfil">
        <div id="" class="profileaudio round40 " style="background: url({{ $userprofile }}) center / cover"></div>
      </a>
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

<?php
}
?>

<!---------------- Partie de la video ----------------------------------------->

<?php
function GenerateVideoPost($miniaturelink, $userprofile, $username, $date, $location, $userprofilelink, $postlink)
{ ?>

  <div class="col-6 col-sm-4 col-md-3 col-lg-2 posts">
    <div class="postgroup1">
      <div class="imageposts" style="background: url({{ $miniaturelink }}) center / cover rgb(50,50,50)">
        <a  id="simvideo" class="row height100" href="{{ $postlink }}">
          <button class="mdl-button mdl-js-button mdl-button--icon margin_auto" type="button" style="background-color: rgba(140,140,140,0.5)">
            <i class="material-icons" style="color: #000">play_arrow</i>
          </button>
        </a>
      </div>
    </div>
    <div class="bottomaudio">
      <a href="{{ $userprofilelink }}" id="PersonProfil">
        <div id="" class="profileaudio round40 " style="background: url({{ $userprofile }}) center / cover"></div>
      </a>
      <div class="imagetext text-dark">
        <span class="">{{ $username }}</span><br>
        <span style="font-size: 0.7em; color: gray">{{ $date }} {{ $location }}</span>
      </div>
    </div>
  </div>

<?php
}
?>

<!---------------- Partie de la Document ----------------------------------------->

<?php
function GenerateDocumentPost($userprofile, $username, $date, $location, $posttitle, $postcontent, $userprofilelink, $postlink)
{ ?>

  <div class="col-6 col-sm-4 col-md-3 col-lg-2 posts">
    <div class="postgroup1">
      <div class="audioposts">
        <div class="row contextpost">
          <div class="col-md-12 contaudiodesc">
            <a id="simdocument" class="anostyle" href="{{ $postlink }}">
              <h4><i class="material-icons position-relative" style="top: 2px">insert_drive_file</i> {{ $posttitle }} </h4>
              <p>{{ $postcontent }}</p>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="bottomaudio">
      <a href="{{ $userprofilelink }}" id="PersonProfil">
        <div id="" class="profileaudio round40 " style="background: url({{ $userprofile }}) center / cover"></div>
      </a>
      <div class="imagetext text-dark">
        <span class="">{{ $username }}</span><br>
        <span style="font-size: 0.7em; color: gray">{{ $date }} {{ $location }}</span>
      </div>
    </div>
  </div>

<?php
}
?>

<!---------------- Partie de la Image ----------------------------------------->

<?php
function GenerateImagePost($imglink, $userprofile, $username, $date, $location, $userprofilelink, $postlink)
{ ?>

  <div class="col-6 col-sm-4 col-md-3 col-lg-2 posts">
    <div class="postgroup1">
      <div class="imageposts" style="background: url({{ $imglink }}) center / cover">
        <a  id="simimage" class="row height100" href="{{ $postlink }}">

        </a>
      </div>
    </div>
      <div class="bottomaudio">
        <a href="{{ $userprofilelink }}" id="PersonProfil">
          <div id="" class="profileaudio round40 " style="background: url({{ $userprofile }}) center / cover"></div>
        </a>
          <div class="imagetext text-dark">
            <span class="">{{ $username }}</span><br>
            <span style="font-size: 0.7em; color: gray">{{ $date }} {{ $location }}</span>
          </div>
      </div>
  </div>

<?php
}
?>

<!---------------- Partie de la Text ----------------------------------------->

<?php
function GenerateTextPost($userprofile, $username, $date, $location, $posttitle, $postcontent, $userprofilelink, $postlink)
{ ?>

  <div class="col-6 col-sm-4 col-md-3 col-lg-2 posts">
    <div class="postgroup1">
      <div class="audioposts">
        <div class="row contextpost">
          <div class="col-md-12 contaudiodesc">
            <a id="simtext" class="anostyle" href="{{ $postlink }}">
              <h4><i class="material-icons position-relative" style="top: 2px">comment</i> {{ $posttitle }}</h4>
              <p>{{ $postcontent }}</p>
            </a>
          </div>
        </div>
      </div>
    </div>
    <div class="bottomaudio">
      <a href="{{ $userprofilelink }}" id="PersonProfil">
        <div id="" class="profileaudio round40 " style="background: url({{ $userprofile }}) center / cover"></div>
      </a>
      <div class="imagetext text-dark">
        <span class="">{{ $username }}</span><br>
        <span style="font-size: 0.7em; color: gray">{{ $date }} {{ $location }}</span>
      </div>

    </div>
  </div>


<?php
}
?>

@php
//  GenerateAudioPost('le param');
@endphp
