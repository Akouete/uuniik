@include('standard.way')
<style media="screen">
  #titleinput {
    font-size: 2em;
  }
  @media all and (max-width: 640px) {
    #titleinput {
      font-size: 1.5em;
    }
  }
</style>
<form class="row" action="{{ route('Post') }}" enctype="multipart/form-data" id="editcontainer">
  <div class="col-lg-3"></div>

  <!-- Affichage des fonctions du micro-->
  <div class="col-lg-6 bg-white editcontainer border z_index1">
    <div class="height50 divflex row">
      @if (Session::get("user")->user_filename)
        <a class="margin_auto" href="{{ url('AjaxPages/PersonProfil?user_id='.Session::get("user")->user_id) }}" id="editicone">
          <div id="" class="bg-primary round30 " style="background: url({{ Session::get("fileDirectory").Session::get("user")->user_filename }}) center / cover"></div>
        </a>
      @else
        <i class="material-icons margin_auto icondark" id="editicone">account_circle</i>
      @endif

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
    <div class="row">
      <input type="hidden" name="_token" value="{{ csrf_token() }}" id="token">
      <input id="titleinput" class="col-lg-12 input input1 title" style="border:0" type="text" name="" value="" placeholder="Titre">
      <textarea class='text-dark col-lg-12 autoExpand' rows="3" data-min-rows='3' id="principaltextarea" placeholder="Quoi d'uuniik aujourd'hui ?"></textarea>
    </div>
      <input type="hidden" name="" value="" id="post_location">
      <input class="none" type="file" name="" value="" id="postfileinput">
      <input class="none" type="file" name="" value="" id="videominiature">
      <a href="#" id="voicelink"></a>
    <div class="row center" style="margin-bottom: 10px" id="previsualisation">
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
        <a href="{{ url('AjaxPages/PersonProfil?user_id='.Session::get("user")->user_id) }}" id="PersonProfil">
          <div id="" class="bg-primary profileaudio round40 " style="background: url({{ Session::get("fileDirectory").Session::get("user")->user_filename }}) center / cover"></div>
        </a>
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
    <div class="row bg-white height50 center" style="padding-top: 8px; border-radius: 10px">
      <div class="col-lg-12">
        <button type="button" class="mdl-button mdl-js-button mdl-button--icon" id="showemoji" title="Utiliser les emojis">
          <i class="material-icons icondark">mood</i>
        </button>
        <button type="button" class="mdl-button mdl-js-button mdl-button--icon" id="documentbutton" title="Ajouter un fichier cocument">
          <i class="material-icons icondark">insert_drive_file</i>
        </button>
        <button type="button" class="mdl-button mdl-js-button mdl-button--icon" id="audiobutton" title="Ajouter un fichier audio">
          <i class="material-icons icondark">headset</i>
        </button>
        <button type="button" class="mdl-button mdl-js-button mdl-button--icon" id="photobutton" title="Ajouter une photo ou video">
          <i class="material-icons icondark">camera_alt</i>
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
        <button type="button" class="bg_white2 mdl-button mdl-js-button mdl-js-ripple-effect radius20" id="annuler">
          Annuler
        </button>
        <button type="button" class="blue mdl-button mdl-js-button mdl-js-ripple-effect radius20" id="publier">
          Publier
        </button>
      </div>
    </div>
  </div>

</form>
<div class="row center">
  @include('standard/emoji')
</div>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB0UnGhNIJmNOm9lZRJ7oTB9Qxwum644C8&libraries=places&callback=initialize" async defer></script>

<script type="text/javascript">
// Envoi des Post en ajax


var postfileinput = document.querySelector('#postfileinput');
var videominiature = document.querySelector('#videominiature');
var titleinput = document.querySelector('#titleinput');
var linkinput = document.querySelector('#linkinput');
var embededlinkinput = document.querySelector('#embededlinkinput');
var principaltextarea = document.querySelector('#principaltextarea');
var postform = document.querySelector('#editcontainer');

$('#publier').click(function(e) {
  e.preventDefault();
   var xhr = new XMLHttpRequest();
   xhr.onreadystatechange = function() {
    if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
      $('.fixedcover').fadeOut('slow');
      document.body.style.overflow = "auto";
    }
   };
   xhr.open('POST', postform.action);
   xhr.onload = function() {
     //alert('Upload terminé !');
   };
   var form = new FormData(postform);

   form.append('post_title', $('#titleinput').val());
   form.append('post_content', $('#principaltextarea').val());
   form.append('post_link', $('#linkinputo').val());
   form.append('post_embededlink', $('#embededlinkinput').val());
   form.append('post_location', $('#post_location').val());
   form.append('token', $('#token').val());
   form.append('voicelink', document.querySelector('#voicelink').href);

   form.append('post_file', postfileinput.files[0]);
   form.append('post_videominiature', videominiature.files[0]);

   xhr.send(form);
   /*xhr.onprogress = function(e) {
     var percent = e.loaded / e.total;
     principaltextarea.innerHTML += e.loaded + ' ' +  e.total +'____';
   };*/
});

//---------------------------------------------------
  PostsUtileFunctions();
/*
* fonction qui clique les inputs file par des buttons
*/

(function() {
  function ShowFilePreview(divid,inputid) {
    var videoExt = ['avi', 'AVI', 'MOV', 'WMV', 'mkv', 'MKV', 'mp4', 'MP4', 'mpeg4', '3GP', '3gp', 'M4V', 'm4v', 'ogg' ];
    var imageExt = ['png', 'PNG', 'jpeg', 'jpg','JPG', 'JPEG', 'jpeg', 'gif', 'GIF', 'BITMAP', 'bitmap'];
    var audioExt = ['mp3', 'MP3', 'OGG', 'ogg','WAV', 'wav', 'rsf', 'RSF', 'aac', 'AAC', 'm4a', 'M4A'];
    var docExt = ['txt', 'pdf', 'doc', 'docx', 'xls','xlsx', 'csv', 'CSV', 'ppt', 'pptx', 'odt'];
    var allowedTypes = ['txt', 'pdf', 'doc', 'docx', 'xls','xlsx', 'csv', 'CSV', 'ppt', 'pptx',   'mp3', 'MP3', 'OGG', 'ogg','WAV', 'wav', 'rsf', 'RSF', 'aac', 'AAC', 'm4a', 'M4A',  'png', 'PNG', 'jpeg', 'jpg','JPG', 'JPEG', 'jpeg', 'gif', 'GIF', 'BITMAP', 'bitmap',  'avi', 'AVI', 'MOV', 'WMV', 'mkv', 'MKV', 'mp4', 'MP4', 'mpeg4', '3GP', '3gp', 'M4V', 'm4v', 'ogg' ];
    var fileInput = document.querySelector(inputid), conteneur = document.querySelector(divid);
    fileInput.onchange = function() {
      var files = this.files, filesLen = files.length, fileExt, fileType;
      for (var i = 0 ; i < filesLen ; i++) {
        var file = files[i];
        fileExt = files[i].name.split('.');
        fileExt = fileExt[fileExt.length - 1];
        if(allowedTypes.indexOf(fileExt) != -1) {

          if(videoExt.indexOf(fileExt) != -1) fileType = "video";
          if(imageExt.indexOf(fileExt) != -1) fileType = "image";
          if(audioExt.indexOf(fileExt) != -1) fileType = "audio";
          if(docExt.indexOf(fileExt) != -1) fileType = "doc";

          var reader = new FileReader(), prev = document.querySelector(divid);
          if(prev.hasChildNodes()) {
            var children = prev.childNodes;
            for (var i = 0; i < children.length; i++) {
              if (children[i].nodeType === 1) {
                prev.childNodes[i].style.display = 'none';
              }
            }
          }
          reader.onload = function() {
            if(fileType == "image") {
              document.querySelector('.imgpreview').style.display = "block";
              document.querySelector('.imgpreview').src = this.result;
            }
            if(fileType == "audio") {
              document.querySelector('.audiopreview').style.display = "block";
              document.querySelector('#PreviewAudioPlayer').parentNode.src = this.result;
            }
            if(fileType == "doc") {
              document.querySelector('#previewDoc').style.display = "block";
              document.querySelector('#previewDoc').href = this.result;
              document.querySelector('#previewDoc').download = file.name;
              $('#previewDoc').find('#previewdocname').text(' '+file.name);
            }
            if(fileType == "video") {
              document.querySelector('.Videopreview').style.display = "block";
              document.querySelector('#Videopreview').src = this.result;
            }
          };
          reader.readAsDataURL(file);
        }
      }
    };
  }

  $('#audiobutton, #photobutton, #documentbutton').click(function() {
    document.querySelector('#postfileinput').click();
    ShowFilePreview('#previsualisation','#postfileinput');
  });

})();

ShowDiv('#link','#linksrow', 4);
ShowDiv('#normallink','#linkinputcont', 4);
ShowDiv('#youtubeiframelink','#youtubeiframeinputcont', 4);
CloseDiv('#closeurlcont','#urlcont', 4);
CloseDiv('#closeembededurlcont','#embededurlcont', 4);

function ReadFile(inputid) {
  var allowedTypes = ['txt', 'pdf', 'doc', 'docx', 'xls','xlsx', 'csv', 'CSV', 'ppt', 'pptx',   'mp3', 'MP3', 'OGG', 'ogg','WAV', 'wav', 'rsf', 'RSF', 'aac', 'AAC', 'm4a', 'M4A',             'png', 'PNG', 'jpeg', 'jpg','JPG', 'JPEG', 'jpeg', 'gif', 'GIF', 'BITMAP', 'bitmap',                 'avi', 'AVI', 'MOV', 'WMV', 'mkv', 'MKV', 'mp4', 'MP4', 'mpeg4', '3GP', '3gp', 'M4V', 'm4v', 'ogg' ];
  var fileInput = document.querySelector(inputid);
  fileInput.onchange = function() {
    var files = this.files, filesLen = files.length, fileExt, fileType;
    for (var i = 0 ; i < filesLen ; i++) {
      var file = files[i];
      fileExt = files[i].name.split('.');
      fileExt = fileExt[fileExt.length - 1];
      if(allowedTypes.indexOf(fileExt) != -1) {
        var reader = new FileReader();
        reader.onload = function() {
          return this.result;
        };
        reader.readAsDataURL(file);
      }
    }
  };
}

$('#addminiature').click(function() {
  document.querySelector('#videominiature').click();
  //alert(ReadFile('#videominiature'));
  var allowedTypes = ['txt', 'pdf', 'doc', 'docx', 'xls','xlsx', 'csv', 'CSV', 'ppt', 'pptx',   'mp3', 'MP3', 'OGG', 'ogg','WAV', 'wav', 'rsf', 'RSF', 'aac', 'AAC', 'm4a', 'M4A',             'png', 'PNG', 'jpeg', 'jpg','JPG', 'JPEG', 'jpeg', 'gif', 'GIF', 'BITMAP', 'bitmap',                 'avi', 'AVI', 'MOV', 'WMV', 'mkv', 'MKV', 'mp4', 'MP4', 'mpeg4', '3GP', '3gp', 'M4V', 'm4v', 'ogg' ];
  var fileInput = document.querySelector('#videominiature');
  fileInput.onchange = function() {
    var files = this.files, filesLen = files.length, fileExt, fileType;
    for (var i = 0 ; i < filesLen ; i++) {
      var file = files[i];
      fileExt = files[i].name.split('.');
      fileExt = fileExt[fileExt.length - 1];
      if(allowedTypes.indexOf(fileExt) != -1) {
        var reader = new FileReader();
        reader.onload = function() {
          document.querySelector('#Videopreview').poster = this.result;
        };
        reader.readAsDataURL(file);
      }
    }
  };
});

var linksrow = document.querySelector('#linksrow');
linksbtn = 0;
document.querySelector('#link').addEventListener('click', function() {
  if(linksbtn == 0) {
    linksrow.style.display = "block";
    linksbtn = 1;
  }else {
    linksrow.style.display = "none";
    linksbtn = 0;
  }
});

$("#closelinkinput").click(function() {
  var linkinputo = document.querySelector('#linkinputo');
  var val = document.querySelector('#linkinputo').value;
  if(val != "") {
    $('#urlcont').find('.mdl-chip__text').text(val);
    $('#urlcont').fadeIn('fast');
    $('#linkinputcont').fadeOut('fast');
    $('#linksrow').fadeOut('fast');
    linksbtn = 0;
  }else {
    $('#linkinputcont').fadeOut('fast');
    linksbtn = 0;
  }
});

var embededlinkinput = document.querySelector('#embededlinkinput');
$("#closeyoutubeiframeinput").click(function() {
  if(embededlinkinput.value != "") {
    $('#embededurlcont').fadeIn('fast');
    $('#youtubeiframeinputcont').fadeOut('fast');
    $('#linksrow').fadeOut('fast');
    linksbtn = 0;
  }else {
    $('#youtubeiframeinputcont').fadeOut('fast');
    linksbtn = 0;
  }
});

//----------------------------------appele de l'emoji ------------------------//
AttachEmoji('#showemoji', '#principaltextarea');

function RecordVoice(startbtn, stopbtn, playbtn) {
  var startRecordingButton = document.querySelector(startbtn);
         var stopRecordingButton = document.querySelector(stopbtn);
         var playButton = document.querySelector(playbtn);
         var leftchannel = [];
         var rightchannel = [];
         var recorder = null;
         var recordingLength = 0;
         var volume = null;
         var mediaStream = null;
         var sampleRate = 44100;
         var context = null;
         var blob = null;
         var interval;

         startRecordingButton.addEventListener("click", function () {
             // Initialize recorder
             navigator.getUserMedia = navigator.getUserMedia || navigator.webkitGetUserMedia || navigator.mozGetUserMedia || navigator.msGetUserMedia;
             navigator.getUserMedia(
             {
                 audio: true
              },
             function (e) {
               $('#editicone').addClass('none');
               $("#recordprogress").removeClass('none');
               var m = 0;
               var s = 0;
               interval = setInterval(function() {
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
                 $("#minuteur").html('&nbsp;&nbsp; ' + mi + ' : ' + se + ' &nbsp;&nbsp;');
               }, 1000);
                 console.log("user consent");
                 // creates the audio context
                 window.AudioContext = window.AudioContext || window.webkitAudioContext;
                 context = new AudioContext();
                 // creates an audio node from the microphone incoming stream
                 mediaStream = context.createMediaStreamSource(e);
                 // https://developer.mozilla.org/en-US/docs/Web/API/AudioContext/createScriptProcessor
                 // bufferSize: the onaudioprocess event is called when the buffer is full
                 var bufferSize = 2048;
                 var numberOfInputChannels = 2;
                 var numberOfOutputChannels = 2;
                 if (context.createScriptProcessor) {
                     recorder = context.createScriptProcessor(bufferSize, numberOfInputChannels, numberOfOutputChannels);
                 } else {
                     recorder = context.createJavaScriptNode(bufferSize, numberOfInputChannels, numberOfOutputChannels);
                 }
                 recorder.onaudioprocess = function (e) {
                     leftchannel.push(new Float32Array(e.inputBuffer.getChannelData(0)));
                     rightchannel.push(new Float32Array(e.inputBuffer.getChannelData(1)));
                     recordingLength += bufferSize;
                 }
                 // we connect the recorder
                 mediaStream.connect(recorder);
                 recorder.connect(context.destination);
             },
                         function (e) {
                             console.error(e);
                         });
         });
         stopRecordingButton.addEventListener("click", function () {
             // stop recording
             $("#recordprogress").addClass('none');
             $('#editicone').removeClass('none');
             clearInterval(interval);
             recorder.disconnect(context.destination);
             mediaStream.disconnect(recorder);
             // we flat the left and right channels down
             // Float32Array[] => Float32Array
             var leftBuffer = flattenArray(leftchannel, recordingLength);
             var rightBuffer = flattenArray(rightchannel, recordingLength);
             // we interleave both channels together
             // [left[0],right[0],left[1],right[1],...]
             var interleaved = interleave(leftBuffer, rightBuffer);
             // we create our wav file
             var buffer = new ArrayBuffer(44 + interleaved.length * 2);
             var view = new DataView(buffer);
             // RIFF chunk descriptor
             writeUTFBytes(view, 0, 'RIFF');
             view.setUint32(4, 44 + interleaved.length * 2, true);
             writeUTFBytes(view, 8, 'WAVE');
             // FMT sub-chunk
             writeUTFBytes(view, 12, 'fmt ');
             view.setUint32(16, 16, true); // chunkSize
             view.setUint16(20, 1, true); // wFormatTag
             view.setUint16(22, 2, true); // wChannels: stereo (2 channels)
             view.setUint32(24, sampleRate, true); // dwSamplesPerSec
             view.setUint32(28, sampleRate * 4, true); // dwAvgBytesPerSec
             view.setUint16(32, 4, true); // wBlockAlign
             view.setUint16(34, 16, true); // wBitsPerSample
             // data sub-chunk
             writeUTFBytes(view, 36, 'data');
             view.setUint32(40, interleaved.length * 2, true);
             // write the PCM samples
             var index = 44;
             var volume = 1;
             for (var i = 0; i < interleaved.length; i++) {
                 view.setInt16(index, interleaved[i] * (0x7FFF * volume), true);
                 index += 2;
             }
             // our final blob
             blob = new Blob([view], { type: 'audio/wav' });

             if (blob == null) {
                 return;
             }
             var url = window.URL.createObjectURL(blob);

             var prev = document.querySelector('#previsualisation');
             if(prev.hasChildNodes()) {
               var children = prev.childNodes;
               for (var i = 0; i < children.length; i++) {
                 if (children[i].nodeType === 1) {
                   prev.childNodes[i].style.display = 'none';
                 }
               }
             }

             document.querySelector('.audiopreview').style.display = "block";
             document.querySelector('#PreviewAudioPlayer').parentNode.src = url;
             document.querySelector('#voicelink').href = url;


         });
         $('#cancelrecord').click(function() {
           $("#recordprogress").addClass('none');
           $('#editicone').removeClass('none');
           clearInterval(interval);
           recorder.disconnect(context.destination);
           mediaStream.disconnect(recorder);

           // we flat the left and right channels down
           // Float32Array[] => Float32Array
           var leftBuffer = flattenArray(leftchannel, recordingLength);
           var rightBuffer = flattenArray(rightchannel, recordingLength);
           // we interleave both channels together
           // [left[0],right[0],left[1],right[1],...]
           var interleaved = interleave(leftBuffer, rightBuffer);
           // we create our wav file
           var buffer = new ArrayBuffer(44 + interleaved.length * 2);
           var view = new DataView(buffer);
           // RIFF chunk descriptor
           writeUTFBytes(view, 0, 'RIFF');
           view.setUint32(4, 44 + interleaved.length * 2, true);
           writeUTFBytes(view, 8, 'WAVE');
           // FMT sub-chunk
           writeUTFBytes(view, 12, 'fmt ');
           view.setUint32(16, 16, true); // chunkSize
           view.setUint16(20, 1, true); // wFormatTag
           view.setUint16(22, 2, true); // wChannels: stereo (2 channels)
           view.setUint32(24, sampleRate, true); // dwSamplesPerSec
           view.setUint32(28, sampleRate * 4, true); // dwAvgBytesPerSec
           view.setUint16(32, 4, true); // wBlockAlign
           view.setUint16(34, 16, true); // wBitsPerSample
           // data sub-chunk
           writeUTFBytes(view, 36, 'data');
           view.setUint32(40, interleaved.length * 2, true);
           // write the PCM samples
           var index = 44;
           var volume = 1;
           for (var i = 0; i < interleaved.length; i++) {
               view.setInt16(index, interleaved[i] * (0x7FFF * volume), true);
               index += 2;
           }
           // our final blob
           blob = new Blob([view], { type: 'audio/wav' });

           if (blob == null) {
               return;
           }
           var url = window.URL.createObjectURL(blob);

         });
         function flattenArray(channelBuffer, recordingLength) {
             var result = new Float32Array(recordingLength);
             var offset = 0;
             for (var i = 0; i < channelBuffer.length; i++) {
                 var buffer = channelBuffer[i];
                 result.set(buffer, offset);
                 offset += buffer.length;
             }
             return result;
         }
         function interleave(leftChannel, rightChannel) {
             var length = leftChannel.length + rightChannel.length;
             var result = new Float32Array(length);
             var inputIndex = 0;
             for (var index = 0; index < length;) {
                 result[index++] = leftChannel[inputIndex];
                 result[index++] = rightChannel[inputIndex];
                 inputIndex++;
             }
             return result;
         }
         function writeUTFBytes(view, offset, string) {
             for (var i = 0; i < string.length; i++) {
                 view.setUint8(offset + i, string.charCodeAt(i));
             }
         }
}
RecordVoice("#mic", "#sendrecord", "#cancelrecord");


  var locBool = 0;
  $('#localisation').click(function() {
    if(locBool == 0) {
      function maPosition(position) {
        var lat = position.coords.latitude;
        var lng = position.coords.longitude;
        var infopos = position.coords.latitude + ',' +position.coords.longitude;
        codeLatLng(infopos);
      }

      if(navigator.geolocation){
        navigator.geolocation.getCurrentPosition(maPosition);
      }else {
        alert("Géolocalisation impossible sur cet appareil");
      }
      locBool = 1;
    }else {
      document.querySelector('#gettedposition').innerHTML = "";
      locBool = 0
    }
  })

    /* Déclaration des variables  */
    var geocoder;
    var map;
    var infowindow = new google.maps.InfoWindow();
    var marker;

    /* Initialisation de la carte  */
    function initialize() {
      geocoder = new google.maps.Geocoder();
      var paris = new google.maps.LatLng(48.8566667, 2.3509871);
      var myOptions = {
        zoom: 8,
        center: paris,
        mapTypeId: google.maps.MapTypeId.ROADMAP
      }
      map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
    }

   google.maps.event.addDomListener(window, 'load', initialize);

   function codeLatLng(coords) {
       var input = coords;
       var latlngStr = input.split(",",2);
       var lat = parseFloat(latlngStr[0]);
       var lng = parseFloat(latlngStr[1]);
       var latlng = new google.maps.LatLng(lat, lng);
       geocoder.geocode({'latLng': latlng}, function(results, status) {
         if (status == google.maps.GeocoderStatus.OK) {
          if (results[1]) {
           $('#loadcoords').fadeOut('fast');
           document.querySelector('#gettedposition').innerHTML = results[1].formatted_address.substr(0,15)+'...';
           document.querySelector('#gettedposition').title = results[1].formatted_address;
           document.querySelector('#post_location').value = results[1].formatted_address;
           $("#localisation").first().removeClass('icondark');
           $("#localisation").first().addClass('blue');
          }
         } else {
          alert("Le geocodage a echoue pour la raion suivante : " + status);
         }
       });
     }
</script>
