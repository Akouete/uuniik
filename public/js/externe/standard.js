var standardload = true;
function launchEvent(el, eventparam, action) {
  el.addEventListener(eventparam, function() {
    action;
  },false);
}
/*
*Fonction qui permet de faire disparaitre un div et le suivant de faire apparaitre
*/
  function CloseDiv(closer,div,method) {
    closer = document.querySelector(closer), div = document.querySelector(div);
    closer.onclick = function() {
      if(method == 1) {
          $(div).fadeOut('fast');
      }
      if(method == 2) {
        $(div).hide('fast');
      }
      if(method == 3) {
        $(div).slideUp('fast');
      }
      if(method == 4) {
        div.style.display = "none";
      }
    }
  }
function ShowDiv(btn,div,method) {
    btn = document.querySelector(btn);
    btn.onclick = function() {
      if(method == 1) {
          $(div).fadeIn('fast');
      }
      if(method == 2) {
        $(div).show('fast');
      }
      if(method == 3) {
        $(div).slideDown('fast');
      }
      if(method == 4) {
        document.querySelector(div).style.display = "flex";
      }
    }
  }

/*
* fonction qui clique les inputs file par des buttons
*/

  function clickinputfile(inputfileid, buttonid) {
    buttonid = document.querySelector(buttonid), inputfileid = document.querySelector(inputfileid);
    buttonid.onclick=function() {
      inputfileid.click();
    }

  }

  //------------------------gestion de l'ausizing des textarea-------------------//

  // Applied globally on all textareas with the "autoExpand" class
  $(document)
      .one('focus.autoExpand', 'textarea.autoExpand', function(){
          var savedValue = this.value;
          this.value = '';
          this.baseScrollHeight = this.scrollHeight;
          this.value = savedValue;
      })
      .on('input.autoExpand', 'textarea.autoExpand', function(){
          var minRows = this.getAttribute('data-min-rows')|0, rows;
          this.rows = minRows;
          rows = Math.ceil((this.scrollHeight - this.baseScrollHeight) / 26);
          this.rows = minRows + rows;
      });

      function getOpositeColor(rgb) { // Like this : rgb(0, 0, 0);
          while (rgb.indexOf(' ') != -1) rgb = rgb.replace(' ', '');
          //Check if is formatted as RGB
          if ((x = /([0-9]{0,3}),([0-9]{0,3}),([0-9]{0,3})/.exec(rgb))) {
              //Extract colors
              color = {
                  'r': parseInt(x[1]),
                  'g': parseInt(x[2]),
                  'b': parseInt(x[3])
              };
              //If is this operation be <= 128 return white, others else return black
              OpositeColor = ((0.3 * (color['r'])) + (0.59 * (color['g'])) + (0.11 * (color['b'])) <= 200) ? '#FFF' : '#424242';
              return OpositeColor;
          }
          return -1;
      }
    //-----------------------------attribution des couleurs automatiquement-------//
      function GiveColor(divclass) {
        var divclasses = document.querySelectorAll(divclass);
        for (var i = 0; i < divclasses.length; i++) {
          var background = '#' + Math.floor(Math.random() * 0xFFFFFF).toString(16);
          divclasses[i].style.background = background;
          divclasses[i].style.color = getOpositeColor(divclasses[i].style.background);
          //$(divclasses[i]).find('a').css('color', getOpositeColor(divclasses[i].style.background))
        }
      }
      function LoadPage(PageUrl) {
        $.ajax({
          type: 'GET',
          url: PageUrl,
          data: {},
          crossDomain: true,
          timeout: 6000,
          success: function(data) {

            $(document.body).html(data);
            document.querySelector('#loader').style.display = "none";

          },
          error: function() {
            //LoadPage(PageUrl)
          }
        });

      }
      function GestionCouleurMenu(num, nbelmt, divclass) {
        for (var i = 1; i <= nbelmt ; i++) {

          document.querySelector('.'+divclass+i).style.backgroundColor = 'rgb(255,255,255)';
          document.querySelector('.'+divclass+num).style.backgroundColor = 'rgb(240,240,240)';

        }
      }

      //-------------------------fonctions des posts -------------------------//

      function PostsUtileFunctions() {
        // ---------------- Function de gestion de la lecture des fichiers audios ----//
        (function() {
          function play(idPlayer, control) {
                var player = idPlayer;
                if (player.paused) {
                    player.play();
                    $(control).html('<i class="material-icons">play_arrow</i>');
                } else {
                    player.pause();
                    $(control).html('<i class="material-icons" style="color: rgb(50,50,50)" >pause</i>');
                }
            }
          function formatTime(time) {
              var hours = Math.floor(time / 3600);
              var mins  = Math.floor((time % 3600) / 60);
              var secs  = Math.floor(time % 60);
              if (secs < 10) {
                  secs = "0" + secs;
              }
              if (hours) {
                  if (mins < 10) {
                      mins = "0" + mins;
                  }
                  return hours + ":" + mins + ":" + secs; // hh:mm:ss
              } else {
                  return mins + ":" + secs; // mm:ss
              }
          }
          function clickProgress(idPlayer, progessBar) {
              var player = idPlayer;
              var progress = progessBar;
              var percent = progress.value;
              var duration = player.duration;
              player.currentTime = (duration * percent) / 100;
          }

          var progressBar = document.querySelectorAll('#progressBar');
          var control = document.querySelectorAll('#control');
          var audioPlayer = document.querySelectorAll('#audioPlayer');

          for (var i = 0; i < progressBar.length; i++) {
            progressBar[i].addEventListener('input', function() {
              clickProgress(this.parentNode.parentNode.previousElementSibling.previousElementSibling, this);
            });
          }
          for (var i = 0; i < control.length; i++) {
            control[i].addEventListener('click', function() {
              play(this.previousElementSibling, this);
            });
          }
          for (var i = 0; i < audioPlayer.length; i++) {
            audioPlayer[i].addEventListener('timeupdate', function() {
              var duration = this.duration;    // Durée totale
              var time     = this.currentTime; // Temps écoulé
              var fraction = time / duration;
              var percent  = Math.ceil(fraction * 100);
              var progress = this.nextElementSibling.nextElementSibling.firstElementChild.firstElementChild;
              $(this).next().next().next().find('.currentTime').text(formatTime(time));
              $(this).next().next().next().find('.totalduration').text(' / ' + formatTime(duration));
              progress.value = percent;
              progress.MaterialSlider.change(percent);
            });
          }

          for (var i = 0; i < audioPlayer.length; i++) {
              var self = audioPlayer[i];
              var duration = self.duration;    // Durée totale
              $(self).next().next().next().find('.totalduration').text(' / ' + formatTime(duration));
          }
        })();
        //affiche la page de post en detail similar.php
        $( "#simaudio, #simimage, #simvideo, #simdocument, #simtext" ).each(function() {
          $(this).click(function(e) {
            e.preventDefault();
            $('html, body').scrollTop(0);
            $('#loader').fadeIn('fast');
            history.pushState({key: 'value'}, 'titre', this.href);
            LoadPage(this.href);
          });
          // Affiche la page de profile
          var PersonProfil = document.querySelectorAll('#PersonProfil');
          for (var i = 0; i < PersonProfil.length; i++) {
            PersonProfil[i].addEventListener('click', function(e) {
              e.preventDefault();
              $('html, body').scrollTop(0);
              $('#loader').fadeIn('fast');
              history.pushState({key: 'value'}, 'titre', this.href);
              LoadPage(this.href);
            });
          }

        });
      }

//------------------------------ Minuteur ------------------------------------//
function Minuteur(afficheur) {
  var m = 0;
  var s = 0;
  var interval = setInterval(function() {
    s++;
    if(s == 60) {
      s = 0;
      m++;
    }
    var mi, se;
    mi = m;
    se = s;
    if(mi < 10) {
      mi = "0"+mi;
    }
    if(se < 10) {
      se = "0"+se;
    }
    $(afficheur).html('&nbsp;&nbsp;' + mi + ' : ' + se + '&nbsp;&nbsp;');
  }, 1000);
}

//------------------- Create thumbnail file ----------------------------------//


  function createThumbnail(file,divid) {
      var reader = new FileReader();
      prev = document.querySelector(divid);
      reader.onload = function() {
        prev.style.background = "url("+this.result+") center / cover";
      };
      reader.readAsDataURL(file);
  }

  function AppellecreateThumbnail(divid,inputid) {
    var divid2=divid;
    var allowedTypes = ['png', 'PNG', 'jpeg', 'jpg','JPG', 'JPEG', 'jpeg', 'gif', 'GIF'],
    fileInput = document.querySelector(inputid),
    conteneur = document.querySelector(divid);
    fileInput.onchange = function() {
      var files = this.files,
      filesLen = files.length, imgType;
      for (var i = 0 ; i < filesLen ; i++) {
        imgType = files[i].name.split('.');
        imgType = imgType[imgType.length - 1];
        if(allowedTypes.indexOf(imgType) != -1) {
          createThumbnail(files[i],divid2);
        }
      }
    };
  }
