<style media="screen">
.mp1, .mp2, .mp3, .mp4, .mp5, #ic_search {
  -moz-user-select: none;
  -webkit-user-select: none;
  -khtml-user-select: none;
  user-select: none;
}
#btnprofile:hover{
  background: #fff;
}
#continputbar {
  position: absolute;
  top: 7px;
  left: 100px;
  background: rgb(240,240,240);
  height: 40px;
  right: 35%;
  border-radius: 20px;
}
#inputbar {
  position: relative;
  top: 0px;
  left: 0px;
  background: rgb(240,240,240);
  border: none;
  outline: none;
  -webkit-appearance: none;
  padding: 10px;
  padding-left: 50px;
  padding-right: 50px;
  height: 40px;
  width: 100%;
  border-radius: 20px;
  font-size: 1.1em;
  font-weight: bold;
}
#inputbar:focus {
  border: none;
  outline: none;
  box-shadow: none;
}
.nav-item {
  border-radius: 50px;
  margin-right: 10px;
}
.nav-item:hover {
  background: rgb(240,240,240);
}
#ic_search {
  position: absolute;
  left: 10px;
  z-index: 1;
  color: #000;
  top: 8px;
}
#ic_mic {
  position: absolute;
  right: 10px;
  z-index: 1;
  top: 4px;
  color: #424242;
  background: rgb(240,240,240);
}
#navbarSupportedContent {
  position: absolute;
  top: 7px;
  right: 15px;
}
#divcompletion {
  position: fixed;
  top: 50px;
  background: white;
  left: 0;
  right: 0;
  bottom: 0;
  z-index: 11;
}
.navbar {
  height: 55px;
}
@media all and (max-width: 990px){
  #continputbar {
    left: 10px;
    right: 10px;
  }
}
@media all and (max-width: 640px){
  #continputbar {
    left: 10px;
    right: 10px;
  }
  #ic_search {
    left: 15px;
  }
}
</style>

<a id="ancrehaut" href="#"></a>
<nav class="navbar fixed-top navbar-expand-lg navbar-light bg-white" style="z-index: 5">
    <a href="{{ url('/Posts') }}" id="btnposts2" class="mp6" style="border-radius: 30px;"><img class="pointer round30" id="logo" src="{{ asset('img/uuniik.png') }}" alt=""></a>

    <div id="continputbar">
      <i class="material-icons text-black" id="ic_search">search</i>
      <input type="text" name="" class="form-control text-dark" id="inputbar" placeholder="Rechercher">
      <button id="ic_mic" class="none mdl-button mdl-js-button mdl-button--icon">
        <i class="material-icons">mic</i>
      </button>
    </div>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">

        <ul itemscope itemtype="https://www.schema.org/SiteNavigationElement" class="navbar-nav mr-auto">
            <li itemprop=" name" class="nav-item mp1" id="btnaccueil">
                <a itemprop="url" class="nav-link" href="{{ url('/Posts') }}">Accueil</a>
            </li>
            <li itemprop="name" class="nav-item mp3" id="btnpers2">
                <a itemprop="url" class="nav-link" href="{{ url('/Personnes') }}">Personnes</a>
            </li>
            <li itemprop=" name" class="nav-item mp2" id="btndecouvrir">
                <a itemprop="url" class="nav-link" href="{{ url('/Decouvrir') }}">Découvrir</a>
            </li>
            <li class="mp4" id="btnavatar">
                <a itemprop="url" class="" href="{{ url('/Profile') }}"></a>
            </li>
            <li itemprop="name" class="bg_white nav-item mp5" id="btnprofile">
              @if (isset(Session::get("user")->user_filename))
                <a itemprop="url" style="text-decoration: none" href="{{ url('/Profile') }}"><div class="round30 pointer" style="margin-top: 4px; background: url({{ Session::get("fileDirectory").Session::get("user")->user_filename }}) center / cover"></div></a>
              @else
                <a itemprop="url" style="text-decoration: none" href="{{ url('/Profile') }}"><i class="nav-link text-dark material-icons">account_circle</i></a>
              @endif
            </li>
            <li itemprop="name" class="nav-item pointer" id="demo-menu-lower-right">
                <i itemprop="url" class="nav-link material-icons text-black">more_vert</i>
            </li>

            <ul class="radius20 mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="demo-menu-lower-right">
              <a class="anostyle" href="{{ url('/Annonceur') }}"><li class="mdl-menu__item">Annonçeur</li></a>
              <a id="discover" class="anostyle" href="{{ url('/Decouvrir') }}"><li class="mdl-menu__item">Découvrir</li></a>
              <a class="anostyle" href="{{ url('/cgu') }}"><li class="mdl-menu__item">CGU</li></a>
              <a class="anostyle" href="#"><li class="mdl-menu__item">Déconnecter</li></a>
            </ul>

        </ul>
    </div>
</nav>
<input id="local" type="hidden" name="" value="{{ app()->getLocale() }}-{{ strtoupper(app()->getLocale()) }}">

<div id="divcompletion" class="none"></div>

<script type="text/javascript">

(function($){

            if ('webkitSpeechRecognition' in window) {
                $('#ic_mic').show();
                var recognition = new webkitSpeechRecognition();
                var text = '';
                recognition.lang = $('#local').val();
                recognition.continuous = false;
                recognition.interimResults = true;
                $('#ic_mic').click(function(){
                    recognition.start();
                    $('#inputbar').val();
                    $('#btn').removeClass('btn-primary').html('Enregistrement en cours...');
                });
                recognition.onresult = function (event) {
                    $('#result').text('');
                    for (var i = event.resultIndex; i < event.results.length; ++i) {
                        if (event.results[i].isFinal) {
                            recognition.stop();
                            var transcript = event.results[i][0].transcript;
                            var words = transcript.split(' ');
                            if(words[0] == 'chercher'){
                                window.open("https://www.google.com/search?q=" + transcript.replace('chercher', ''),'_blank')
                                return true;
                            }

                            $('#inputbar').val(transcript);

                        }else{
                            $('#inputbar').val($('#inputbar').val() + event.results[i][0].transcript);
                        }
                    }
                };
            }else{
                $('#ic_mic').hide();
            }


        })(jQuery);

        window.addEventListener('resize', function() {
          console.log(document.body.clientWidth);
        })

        //-------------affichage du grand blanc div d'auto completion --------//

        var inputbar = document.querySelector('#inputbar');
        inputbar.addEventListener('focus', function() {
          document.querySelector('#divcompletion').style.display = "block";
          document.body.style.overflow = "hidden";
        },false);
        inputbar.addEventListener('blur', function() {
          document.querySelector('#divcompletion').style.display = "none";
          document.body.style.overflow = "auto";
        },false);

</script>
