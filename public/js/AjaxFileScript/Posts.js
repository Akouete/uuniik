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

  var dejaloade = 0;
  $('#b1').click(function() {
    var fixedcover = document.querySelector('.fixedcover');
    fixedcover.style.display = "block";
    document.body.style.overflow = "hidden";
    if (dejaloade == 0) {
      $( ".fixedcover" ).load( url.PostInterface, function() {
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
    LoadPage(this.parentNode.href);
    $('html, body').scrollTop(0);
  });
  $('#b3').click(function(e) {
    e.preventDefault();
    $('#loader').fadeIn('fast');
    GestionCouleurMenu(1, 4, 'm');
    GestionCouleurMenu(6, 6, 'mp');
    history.pushState({key: 'value'}, 'titre', '/site/uuniik_project/uuniik/public/Decouvrir');
    LoadPage(url.decouvrir);
    window.parent.document.title = "Uuniik";
  });

//-----------------------------Fonctions des posts----------------------------//
PostsUtileFunctions();
