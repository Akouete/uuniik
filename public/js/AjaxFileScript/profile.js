$(function() {
  var edit = document.querySelectorAll('#edit');
  var closeinput = document.querySelectorAll('#closeinput');
  var done = document.querySelectorAll('#done');

  $(edit).each(function() {
     $(this).click(function(){
       $(this).addClass('invisible');
       $(this).prev().addClass('invisible');
       $(this).parent().find('#editinput, #closeinput, #done').removeClass('invisible');
     });
   });
   $(closeinput).each(function() {
      $(this).click(function(){
        $(this).addClass('invisible');
        $(this).next().addClass('invisible');
        $(this).prev().addClass('invisible');
        $(this).parent().find('#listcontent, #edit').removeClass('invisible');
      });
    });
    $(done).each(function() {
       $(this).click(function(){
         $(this).addClass('invisible');
         $(this).prev().addClass('invisible');
         $(this).prev().prev().addClass('invisible');
         $(this).parent().find('#listcontent, #edit').removeClass('invisible');
         $(this).parent().find('#listtext').text($(this).prev().prev().val());
       });
     });
     $('#profile1').click(function(e) {
       if(e.target == this) {
         $('#profilefile').click();
       }
     });
     $('#cover1').click(function(e) {
       if(e.target == this) {
        $('#coverfile').click();
       }
     });

     var photoform = document.querySelector('#photoform');
     $('#doneprofile').click(function() {
       var fileInput = document.querySelector('#profilefile');
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
         //if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
         if (xhr.status == 500) {
           //alert(xhr.responseText);
         }
         if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
           //alert(xhr.responseText);
         }
        };
        xhr.open('POST', url.ProfileController);
        xhr.onload = function() {
          //alert('Upload terminé !');
        };
        var form = new FormData(photoform);
        form.append('user_id', $('#user_id').val());
        form.append('profilefile', fileInput.files[0]);
        xhr.send(form);
     });

     $('#donecover').click(function() {
       var fileInput = document.querySelector('#coverfile');
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
         if (xhr.readyState == 4 && (xhr.status == 200 || xhr.status == 0)) {
           //alert(xhr.responseText);
         }
        };
        xhr.open('POST', url.ProfileController);
        xhr.onload = function() {
          //alert('Upload terminé !');
        };
        var form = new FormData(photoform);
        form.append('user_id', $('#user_id').val());
        form.append('coverfile', fileInput.files[0]);
        xhr.send(form);
     });



     var sexedit = document.querySelector('#sexedit');

     sexedit.addEventListener('click', function() {
       $('.sexcont').fadeIn(0);
       $( "#sex1, #sex2, #sex3" ).click(function() {
        $('#sexText').text(this.value);
        $('.sexcont').fadeOut(0);
        var self = this;
        $.ajax({
           type: 'POST',
           url: url.ProfileController,
           data: {
             UpdateProfile: true,
             name: "user_gender",
             value: self.value,
             user_id: $('#user_id').val()
           },
           timeout: 3000,
           headers: {
               'X-CSRF-TOKEN': $('#token').val()
           },
           success: function(data) {
             //alert(data);
           },
           error: function() {
             //alert(data);
           }
         });
      });
      window.addEventListener('click', function() {
        $('.sexcont').fadeOut(0);
      },true);
     },false)

    // alert(profile1.style.background);

     AppellecreateThumbnail('#profile1','#profilefile');
     AppellecreateThumbnail('#cover1','#coverfile');

     $('#profile1').click(function(e) {
       if (e.target == this) {
         $('#doneprofile').fadeIn(0);
       }
     });
     $('#cover1').click(function(e) {
       if (e.target == this) {
         $('#donecover').fadeIn(0);
       }
     });
     window.addEventListener('click', function() {
       $('#donecover').fadeOut(0);
       $('#doneprofile').fadeOut(0);
     }, true);

     var done = document.querySelectorAll('#done');

   for (var i = 0; i < done.length; i++) {
       done[i].addEventListener('click', function() {
         value = $(this).prev().prev().val();
         var name = this.previousElementSibling.previousElementSibling.name;
         $.ajax({
            type: 'POST',
            url: url.ProfileController,
            data: {
              UpdateProfile: true,
              name: name,
              value: value,
              user_id: $('#user_id').val()
            },
            timeout: 3000,
            headers: {
                'X-CSRF-TOKEN': $('#token').val()
            },
            success: function(data) {
              alert(data);
              //$(self.previousElementSibling).val(data);
            },
            error: function() {
              //alert(data);
            }
          });
       }, false);
     }
});

//Affichage des graphdiv et comdiv1

$('#showgraphdiv').click(function() {
  $('#comdiv').fadeOut(0);
  $('#graphdiv').fadeIn(0);
  $(this).css({color:'#000'});
  $("#showcomdiv").css({color:'gray'});
});

$('#showcomdiv').click(function() {
  $('#graphdiv').fadeOut(0);
  $('#comdiv').fadeIn(0);
  $(this).css({color:'#000'});
  $("#showgraphdiv").css({color:'gray'});
});

//-----------------function des posts------------------------------
PostsUtileFunctions();
//---------------------------attribution des couleurs automatiquement-------//
GiveColor('.audioposts');

var gpsinput = document.getElementsByName('user_locale');

function initialize() {

  geocoder = new google.maps.Geocoder();
  var paris = new google.maps.LatLng(-0.922165, 24.933064);
  var myOptions = {
    zoom: 3,
    center: paris,
    mapTypeId: google.maps.MapTypeId.ROADMAP
  }
  map = new google.maps.Map(document.getElementById("map"), myOptions);

  var autocomplete = new google.maps.places.Autocomplete(gpsinput[0]);
}

//-----------------------------------------------chart------------------------//

(function (){
  var linereal = document.getElementById('linereal')
  var barChart = new Chart(linereal, {
    type: 'line',
    data: {
      labels:[ '1', '2', '3', '4', '5', '6', '7', '8', '9', '10', '11', '12', '13', '14', '15', '16', '17', '18', '19', '20', '21', '22', '23', '24'],
      datasets: [{
        label: 'Soutient Temps Réel',
        data: [5, 8, 10, 19, 25, 26, 28, 30, 34, 35, 36, 24, 22, 15, 17],
        backgroundColor: [
        'rgba(0,150,136,0.3)'
        ],
        borderColor: [
          '#009688'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  })
  //---------------------------
  // je déclare la fonction fullscreen
  function fullscreen(element) {
     return (element.requestFullscreen ||
        element.webkitRequestFullscreen ||
        element.mozRequestFullScreen ||
        element.msRequestFullscreen).call(element);
  }
  var greatcontent = document.querySelector('#greatcontent');
  $('#fullscreen').click(function() {
    fullscreen(document.documentElement);
  });
  //----------------------------------------------------------
  var linemonth = document.getElementById('linemonth')
  var barChart = new Chart(linemonth, {
    type: 'line',
    data: {
      labels:[ 'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Oct', 'Nov', 'Dec'],
      datasets: [{
        label: 'Soutient Par Mois',
        data: [22, 15, 17, 34, 35, 36, 24, 22, 15, 17, 25, 30],
        backgroundColor: [
        'rgba(156,39,176,0.3)'
        ],
        borderColor: [
          '#9C27B0'
        ],
        borderWidth: 1
      }]
    },
    options: {
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero: true
          }
        }]
      }
    }
  })
})();
