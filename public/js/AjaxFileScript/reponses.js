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
