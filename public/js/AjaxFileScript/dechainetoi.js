autosize(document.querySelectorAll('#comtextarea'));

//---------------------------Affichage du textarea de post -----------------//

var btncom = document.querySelectorAll('#btncom');
for (var i = 0; i < btncom.length; i++) {
  btncom[i].addEventListener('click', function(e) {
    $(this.parentNode.nextElementSibling).removeClass('none');
  })
}

var closedivcom = document.querySelectorAll('#closedivcom');
for (var i = 0; i < closedivcom.length; i++) {
  closedivcom[i].addEventListener('click', function(e) {
    $(this.parentNode.parentNode.parentNode.parentNode).addClass('none');
  })
}

var btncom1 = document.querySelectorAll('#btncom1');
for (var i = 0; i < btncom1.length; i++) {
  btncom1[i].addEventListener('click', function(e) {
    $(this.nextElementSibling).removeClass('none');
  })
  btncom1[i].addEventListener('dblclick', function(e) {
    $(this.nextElementSibling).addClass('none');
  })
}

// Fonction sur mobile

if(document.body.clientWidth <= 640) {
  AutoExpand();
  principaltextarea = document.querySelector('#principaltextarea');
  principaltextarea.addEventListener('blur', function() {
    this.style.height = "40px";
  }, false);
}
if ("webkitAppearance" in document.body.style) {
  $('.imgpost').each(function() {
    $(this).css('height', '350px');
  })
}
var mplus = document.querySelector('#mplus'), lesbtn = document.querySelector('#lesbtn');

btnpostvisible = 0;
mplus.addEventListener('click', function() {
  document.querySelector('#principaltextarea').focus();
  if(btnpostvisible == 1) {
    $(lesbtn).slideUp('fast');
        $('#titleinput').addClass('phone_none').fadeOut('slow');
        $('#linkp').addClass('col-lg-1 m10').fadeOut('slow');
        $(this).html('<i class="material-icons icondark">keyboard_arrow_up</i>');
        btnpostvisible = 0;
  }else {
        $(lesbtn).slideDown('fast');
        $('#titleinput').removeClass('phone_none').fadeIn('slow');
        $('#linkp').removeClass('col-lg-1 m10').fadeIn('slow');
        $(this).html('<i class="material-icons icondark">keyboard_arrow_down</i>');
        btnpostvisible = 1;
  }
});

var deleteprevdom = document.querySelector('#deleteprevdom');
var prev = document.querySelector('#previsualisation');
children =

deleteprevdom.addEventListener('click', function() {
  var self = this;
  if(prev.hasChildNodes()) {
    var children = prev.childNodes;
    for (var i = 0; i < children.length; i++) {
      if (children[i].nodeType === 1 && children[i].id != "deleteprevdom") {
        prev.childNodes[i].style.display = 'none';
      }
    }
    setTimeout(function() {
      $(self).addClass('none').fadeOut('slow');
    }, 1000);
  }
}, false);

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
              if (children[i].nodeType === 1 && children[i].id != "deleteprevdom") {
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
    $('#deleteprevdom').removeClass('none');
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
