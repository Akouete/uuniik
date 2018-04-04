function getRandomInt(min, max) {
  min = Math.ceil(min);
  max = Math.floor(max);
  return Math.floor(Math.random() * (max - min)) + min;
}
window.addEventListener('load', function() {
  $('#loader').fadeOut('fast');
},false)

CloseDiv('#closealertsystem', '.alertsystem', 4);

$('#btnposts').click(function(e) {
  e.preventDefault();
  $('#loader').fadeIn('fast');
  GestionCouleurMenu(1, 4, 'm');
  GestionCouleurMenu(1, 6, 'mp');
  history.pushState({key: 'value'}, 'titre', '/site/uuniik_project/uuniik/public/index');
  LoadPage("http://"+window.location.host+"/site/uuniik_project/uuniik/public/AjaxPages/Posts");
  window.parent.document.title = "Uuniik";
});
$('#btnposts2, #btnaccueil').click(function(e) {
  e.preventDefault();
  $('#loader').fadeIn('fast');
  GestionCouleurMenu(1, 4, 'm');
  GestionCouleurMenu(6, 6, 'mp');
  history.pushState({key: 'value'}, 'titre', '/site/uuniik_project/uuniik/public/index');
  LoadPage("http://"+window.location.host+"/site/uuniik_project/uuniik/public/AjaxPages/Posts");
  window.parent.document.title = "Uuniik";
});
//---------------------------------------------------
$('#btnrep').click(function(e) {
  e.preventDefault();
  $('#loader').fadeIn('fast');
  history.pushState({key: 'value'}, 'titre', this.parentNode.href);
  LoadPage(this.parentNode.href);
});
$('#btndecouvrir').click(function(e) {
  e.preventDefault();
  $('#loader').fadeIn('fast');
  GestionCouleurMenu(3, 4, 'm');
  GestionCouleurMenu(2, 6, 'mp');
  history.pushState({key: 'value'}, 'titre', this.firstElementChild.href);
  LoadPage("http://"+window.location.host+"/site/uuniik_project/uuniik/public/AjaxPages/Decouvrir");
  window.parent.document.title = "Uuniik | Découvrir";
  //$('html, body').scrollTop(0);
});
//------------------------------------------------
$('#btnpers').click(function(e) {
  e.preventDefault();
  $('#loader').fadeIn('fast');
  GestionCouleurMenu(4, 4, 'm');
  GestionCouleurMenu(3, 6, 'mp');
  history.pushState({key: 'value'}, 'titre', this.parentNode.href);
  LoadPage("http://"+window.location.host+"/site/uuniik_project/uuniik/public/AjaxPages/Personnes");
  window.parent.document.title = "Uuniik | Personnes";
  //$('html, body').scrollTop(0);
});
$('#btnpers2').click(function(e) {
  e.preventDefault();
  $('#loader').fadeIn('fast');
  GestionCouleurMenu(4, 4, 'm');
  GestionCouleurMenu(3, 6, 'mp');
  history.pushState({key: 'value'}, 'titre', this.firstElementChild.href);
  LoadPage("http://"+window.location.host+"/site/uuniik_project/uuniik/public/AjaxPages/Personnes");
  window.parent.document.title = "Uuniik | Personnes";
  //$('html, body').scrollTop(0);
});
//-------------------------------------------------------
$('#btnavatar, #btnprofile').click(function(e) {
  e.preventDefault();
  $('#loader').fadeIn('fast');
  GestionCouleurMenu(4, 4, 'm');
  GestionCouleurMenu(5, 6, 'mp');
  history.pushState({key: 'value'}, 'titre', this.firstElementChild.href);
  LoadPage("http://"+window.location.host+"/site/uuniik_project/uuniik/public/AjaxPages/Profile");
  window.parent.document.title = "Uuniik | Profile";
  //$('html, body').scrollTop(0);
});
$('#discover').click(function(e) {
  e.preventDefault();
  $('#loader').fadeIn('fast');
  history.pushState({key: 'value'}, 'titre', this.href);
  LoadPage(this.href);
  //$('html, body').scrollTop(0);
});

//-------------------Lodage des pages précédentes------------------------------------
window.onpopstate = function(event) {
  $('#loader').fadeIn('fast');
  LoadPage(window.location.href);
}
//----------------------------Fonctions utile ------------------------------//

CloseDiv('#closealertdiv', '#alertdiv', 4);
