//-----------------------------attribution des couleurs automatiquement-------//
  //alert(standardload);
  GiveColor('.qcard');

  //-----------------------------attribution des couleurs automatiquement-------//
  GiveColor('.btnques');

  var long = document.querySelector('.long');
  var longueur = 0;
    var j=0;
    var fils = long.childNodes;
    for (var i = 0; i < fils.length; i++) {
      if(fils[i].className != undefined) {
          j++;
          longueur += parseInt(getComputedStyle(fils[i],null).width);
          longueur += 5;
      }
    }
    long.style.width = (longueur) + 'px';

    $(function(){

      $('#gotoprofileavatar, #gotoprofile').click(function(e) {
        e.preventDefault();
        $('#loader').fadeIn('fast');
        GestionCouleurMenu(4, 4, 'm');
        GestionCouleurMenu(5, 6, 'mp');
        history.pushState({key: 'value'}, 'titre', this.href);
        LoadPage("http://"+window.location.host+"/site/uuniik_project/uuniik/public/AjaxPages/Profile");
        window.parent.document.title = "Uuniik | Profile";
        $('html, body').scrollTop(0);
      });

      var PersonProfil = document.querySelectorAll('#PersonProfil');
      for (var i = 0; i < PersonProfil.length; i++) {
        PersonProfil[i].addEventListener('click', function(e) {
          e.preventDefault();
          $('#loader').fadeIn('fast');
          history.pushState({key: 'value'}, 'titre', this.href);
          LoadPage(this.href);
          $('html, body').scrollTop(0);
        })
      }

    });
