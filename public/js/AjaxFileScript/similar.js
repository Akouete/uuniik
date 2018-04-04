GiveColor('.textcontu2');

//---------------------------attribution des couleurs automatiquement-------//
GiveColor('.audioposts');
//---------------------------Affichage des différents boutons de post-------//
var btnpost = document.querySelectorAll('.btnpost');
btnpostvisible = 0;
document.querySelector('#newpost').addEventListener('click', function() {
  if(btnpostvisible == 1) {
    for (var i = 0; i < btnpost.length; i++) {
        btnpost[i].style.display = "none";
        btnpostvisible = 0;
    }
  }else {
    for (var i = 0; i < btnpost.length; i++) {
        btnpost[i].style.display = "block";
        btnpostvisible = 1;
    }
  }
});
//---------------------------Affichage du textarea de post -----------------//
ShowDiv('#btncom', '.comdiv', 4);
ShowDiv('#btncom1', '.comdiv1', 4);
CloseDiv('#closedivcom', '.comdiv', 4)
//---------------------------Affichage du textarea de post -----------------//
var dejaloade = 0;
$('#b1').click(function() {
  var fixedcover = document.querySelector('#postinterface');
  fixedcover.style.display = "block";
  document.body.style.overflow = "hidden";
  if (dejaloade == 0) {
    $( "#postinterface" ).load( url.PostInterface, function() {
      dejaloade = 1;
      $('#annuler').click(function() {
        var fixedcover = document.querySelector('.fixedcover');
        fixedcover.style.display = "none";
        document.body.style.overflow = "auto";
      });
    });
  }
});
$('.fixedcover').click(function(e) {
  if (e.target == this) {
    this.style.display = "none";
    document.body.style.overflow = "auto";
  }
});
$('#b2').click(function(e) {
  e.preventDefault();
  $('#loader').fadeIn('fast');
  GestionCouleurMenu(4, 4, 'm');
  GestionCouleurMenu(3, 6, 'mp');
  history.pushState({key: 'value'}, 'titre', this.parentNode.href);
  LoadPage("http://"+window.location.host+"/site/uuniik_project/uuniik/public/AjaxPages/Profile");
  $('html, body').scrollTop(0);
});

//-----------------------------Fonctions des posts----------------------------//
PostsUtileFunctions();

ShowDiv('#soutenir', '#annoncefixed', 4);

//----------------------------Like Dislike Follow ----------------------------//

$('#like').click(function(e) {
  $.ajax({
     type: 'POST',
     url: document.querySelector('#likeform').action,
     data: {
       like: true,
       token: document.querySelector('#token').value
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
