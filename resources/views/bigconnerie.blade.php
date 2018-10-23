@php
session_start();
  if(isset($_SESSION['price'])) {
    $paymentlink = url("/payment");
  }else {
    $paymentlink = "#";
  }
@endphp

@php
// SAUVGARDE LA VARIABLE hits DANS LE FICHIER DE SESSION
$hits =0;

// TRAITEMENT SUR LE FICHIER TEXTE
if(empty($hits)){
  $fp=fopen("compteur.txt","a+"); //OUVRE LE FICHIER compteur.txt
  $num=fgets($fp,4096); // RECUPERE LE CONTENUE DU COMPTEUR
  fclose($fp); // FERME LE FICHIER
  $hits=$num - -1; // TRAITEMENT
  $fp=fopen("compteur.txt","w"); // OUVRE DE NOUVEAU LE FICHIER
  fputs($fp,$hits); // MET LA NOUVELLE VALEUR
  fclose($fp); // FERME LE FICHIER
}
@endphp
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
     @include('standard.header')
     <link rel="stylesheet" href="{{ asset('css/bigconnerie.css') }}">
    <meta charset="utf-8">
    <title>Believe and Trust</title>
  </head>
  <body>

    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg_white shadow_1">
      <img src="https://digitalloc.io/digitalloc/vue/img/digitalloclogop.png" id="logo" alt="">
      <a class="navbar-brand" href="#">&nbsp; <b>Believe and Trust</b></a> &nbsp;
      <a href="{{ $paymentlink }}">
        <button id="shopping" class="mdl-button mdl-js-button mdl-button--icon">
          <i class="material-icons" style="color: #E91E63">shopping_cart</i>
        </button>
      </a>
    </nav>

    <div class=" center container margin_top100 bg_white2 padding_top50" style="padding-bottom: 50px; border-radius: 3px">
      <div class="row center">
        <h1> <span class="blue" > Si le bonheur, la joie de vivre, l'amour </span> <br> étaient en vente, les achèterais tu ?</h1>
      </div>
      <div class="row center margin_top50 padding10">
        <p class="gray"><i class="material-icons position-relative" style="top: 7px">favorite</i> Rêver, oser, croyer, ayer confiance ! <br> En 2003 un voyageur du temps a été arrêter à l'aéroport de New York. C'était une longue histoire. Mais ce qui était <b>caché</b> du moins jusqu'à maintenant est que l'homme avait laissé derrière lui des secrets pour acceder au <b>bonheur</b> et à d'autre noumène qui nous rendrait <b>heureux</b>. Et chacun de ses <b>secrets</b> est en vente sur ce site créer à cet <b>effet</b>. <br> Acheter l'Amour, la paix, la joie ou plus encore et <b>montrer</b> ça à vos <b>amis</b> </p>
        <p style="font-size: 0.5em">Histoire inventé de toute pièce. Mais sérieusement, si vous l'aimiez vraiment acheter lui(la) un cadeaux symbolique</p>

      </div>
      <p><button class="mdl-button mdl-js-button mdl-button--icon"><i class="gray material-icons position-relative" style="top: 8px">share</i></button> Partager sur</p>
      <button style="opacity:0.9; border: solid 1px #fff" class="bg-primary text-white mdl-button mdl-js-button mdl-js-ripple-effect radius20" onclick="window.open('https://twitter.com/share?url=https://cdn.images.express.co.uk/img/dynamic/78/590x/Bill-Gates-net-worth-how-much-money-Microsoft-founder-Windows-Main-IMAGE-771689.jpg&text=Acheter+tout+ce+que+vous+voulez+sur+Bigconnerie+comme+l+amour+la+joie+et+plus+encore&via=jamesramonas24', 'facebook_share', 'height=320, width=640, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');">
        twitter
      </button>
      <button style="opacity:0.9; border: solid 1px #fff; background: #F44336"class="text-white mdl-button mdl-js-button mdl-js-ripple-effect radius20" onclick="window.open('https://plus.google.com/share?url=https://cdn.images.express.co.uk/img/dynamic/78/590x/Bill-Gates-net-worth-how-much-money-Microsoft-founder-Windows-Main-IMAGE-771689.jpg&hl=fr', 'facebook_share', 'height=320, width=640, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');">
        google+
      </button>
      <button style="opacity:0.9; border: solid 1px #fff" class="bg_red1 text-white mdl-button mdl-js-button mdl-js-ripple-effect radius20" onclick="window.open('https://pinterest.com/pin/create/button/?url=https://i.pinimg.com/originals/51/c7/3c/51c73cdae075b44f848e6cfc48fee15c.jpg&media=https://cdn.images.express.co.uk/img/dynamic/78/590x/Bill-Gates-net-worth-how-much-money-Microsoft-founder-Windows-Main-IMAGE-771689.jpg&description=Acheter+tout+ce+que+vous+voulez+sur+bigconnerie+comme+l+amour+la+joie+et+plus+encore', 'facebook_share', 'height=320, width=640, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no');">
        Pinterest
      </button>
      <!-- Go to www.addthis.com/dashboard to customize your tools -->
      <script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5aea0767fe1fdb69"></script>
    </div>

    <div class="container margin_top50">
      <div class="row center">
        <a href="#produit">
          <button id="newpost" class="shadow_4 z_index2 mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect bg-white">
            <i class="material-icons text-dark">keyboard_arrow_down</i>
          </button>
        </a>
      </div>
    </div>

    <div class="container margin_top50 " id="produit">
      <div class="row">
        <div class="col-lg-3 col-md-6 espaceur">
          <div class="mdl-card mdl-shadow--2dp center carte">
            <div class="filtre" style="background: #FF9800;"></div>
            <div class="back divflex">
              <h2 class="concept margin_auto text-white">Le bonheur</h2>
            </div>
            <div class="row center" style="margin-top: 200px;">

            </div>
            <div class="row center bottom">
              <form class="" action="{{ url('/payment') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="product" value="Bonheur">
                <input type="hidden" name="price" id="price" value="25" placeholder="Nombre de clé" class="input input1">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect bg_blue text-white">
                  Acheter 25 $ l'unité
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 espaceur">
          <div class="mdl-card mdl-shadow--2dp center carte">
            <div class="filtre" style="background: #1B5E20;"></div>
            <div class="back divflex" style="background: url('https://www.lesfurets.com/mutuelle-sante/actualites/wp-content/uploads/sites/8/2016/06/sante-homme-femme-750x582.jpg') center/cover">
              <h2 class="concept margin_auto text-white">La santé</h2>
            </div>
            <div class="row center" style="margin-top: 200px;">

            </div>
            <div class="row center bottom">
              <form class="" action="{{ url('/payment') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="product" value="Santé">
                <input type="hidden" name="price" id="price" value="25" placeholder="Nombre de clé" class="input input1">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect bg_blue text-white">
                  Acheter 25 $ l'unité
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 espaceur">
          <div class="mdl-card mdl-shadow--2dp center carte">
            <div class="filtre" style="background: #B71C1C;"></div>
            <div class="back divflex" style="background: url('http://medias.psychologies.com/storage/images/dictionnaire-des-reves/amour-ou-etat-amoureux/2418162-5-fre-FR/Amour-ou-etat-amoureux_imagePanoramique647_286.jpg') center/cover">
              <h2 class="concept margin_auto text-white">L' Amour</h2>
            </div>
            <div class="row center" style="margin-top: 200px;">

            </div>
            <div class="row center bottom">
              <form class="" action="{{ url('/payment') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="product" value="Amour">
                <input type="hidden" name="price" id="price" value="10" placeholder="Nombre de clé" class="input input1">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect bg_blue text-white">
                  Acheter 10 $ l'unité
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 espaceur">
          <div class="mdl-card mdl-shadow--2dp center carte">
            <div class="filtre" style="background: #1B5E20;"></div>
            <div class="back divflex" style="background: url('https://www.challenges.fr/assets/img/2014/12/31/cover-r4x3w1000-5790f8c4b28de-bill-gates.jpg') center/cover">
              <h2 class="concept margin_auto text-white">La Réussite</h2>
            </div>
            <div class="row center" style="margin-top: 200px;">

            </div>
            <div class="row center bottom">
              <form class="" action="{{ url('/payment') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="product" value="Réussite">
                <input type="hidden" name="price" id="price" value="20" placeholder="Nombre de clé" class="input input1">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect bg_blue text-white">
                  Acheter 20 $ l'unité
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 espaceur">
          <div class="mdl-card mdl-shadow--2dp center carte">
            <div class="filtre" style="background: #F50057;"></div>
            <div class="back divflex" style="background: url('http://img.chefdentreprise.com/Img/BREVE/2014/5/236873/fausses-idees-entrepreneurs-F.jpg') center/cover">
              <h2 class="concept margin_auto text-white">La Richesse</h2>
            </div>
            <div class="row center" style="margin-top: 200px;">

            </div>
            <div class="row center bottom">
              <form class="" action="{{ url('/payment') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="product" value="Richesse">
                <input type="hidden" name="price" id="price" value="25" placeholder="Nombre de clé" class="input input1">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect bg_blue text-white">
                  Acheter 25 $ l'unité
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 espaceur">
          <div class="mdl-card mdl-shadow--2dp center carte">
            <div class="filtre" style="background: #1B5E20;"></div>
            <div class="back divflex" style="background: url('https://www.blog-emploi.com/wp-content/uploads/2017/10/viepro-vieperso.jpg') center/cover">
              <h2 class="concept margin_auto text-white">Le temps</h2>
            </div>
            <div class="row center" style="margin-top: 200px;">

            </div>
            <div class="row center bottom">
              <form class="" action="{{ url('/payment') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="product" value="Temps">
                <input type="hidden" name="price" id="price" value="30" placeholder="Nombre de clé" class="input input1">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect bg_blue text-white">
                  Acheter 30 $ l'unité
                </button>
              </form>
            </div>
          </div>
        </div>


        <div class="col-lg-3 col-md-6 espaceur">
          <div class="mdl-card mdl-shadow--2dp center carte">
            <div class="filtre" style="background: #1B5E20;"></div>
            <div class="back divflex" style="background: url('http://cache.cosmopolitan.fr/data/photo/w650_c17/4b/femme-dormir-dos-lit.jpg') center/cover">
              <h2 class="concept margin_auto text-white">Le sommeil</h2>
            </div>
            <div class="row center" style="margin-top: 200px;">

            </div>
            <div class="row center bottom">
              <form class="" action="{{ url('/payment') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="product" value="Sommeil">
                <input type="hidden" name="price" id="price" value="20" placeholder="Nombre de clé" class="input input1">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect bg_blue text-white">
                  Acheter 20 $ l'unité
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 espaceur">
          <div class="mdl-card mdl-shadow--2dp center carte">
            <div class="filtre" style="background: #FFEB3B;"></div>
            <div class="back divflex" style="background: url('https://www.jeanne-magazine.com/wp-content/uploads/2014/02/shutterstock_174057869_bis.jpg') center/cover">
              <h2 class="concept margin_auto text-white">La Fierté</h2>
            </div>
            <div class="row center" style="margin-top: 200px;">

            </div>
            <div class="row center bottom">
              <form class="" action="{{ url('/payment') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="product" value="Fierté">
                <input type="hidden" name="price" id="price" value="25" placeholder="Nombre de clé" class="input input1">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect bg_blue text-white">
                  Acheter 25 $ l'unité
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 espaceur">
          <div class="mdl-card mdl-shadow--2dp center carte">
            <div class="filtre" style="background: #1B5E20;"></div>
            <div class="back divflex" style="background: url('https://www.blog-emploi.com/wp-content/uploads/2017/10/viepro-vieperso.jpg') center/cover">
              <h2 class="concept margin_auto text-white">La Tranquilité</h2>
            </div>
            <div class="row center" style="margin-top: 200px;">

            </div>
            <div class="row center bottom">
              <form class="" action="{{ url('/payment') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="product" value="Tranquilité">
                <input type="hidden" name="price" id="price" value="10" placeholder="Nombre de clé" class="input input1">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect bg_blue text-white">
                  Acheter 10 $ l'unité
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 espaceur">
          <div class="mdl-card mdl-shadow--2dp center carte">
            <div class="filtre" style="background: #1B5E20;"></div>
            <div class="back divflex" style="background: url('https://www.celibattantes.fr/wp-content/uploads/2016/02/homme-heureux-celibattant.jpg') center/cover">
              <h2 class="concept margin_auto text-white">La Paix</h2>
            </div>
            <div class="row center" style="margin-top: 200px;">

            </div>
            <div class="row center bottom">
              <form class="" action="{{ url('/payment') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="product" value="Paix">
                <input type="hidden" name="price" id="price" value="15" placeholder="Nombre de clé" class="input input1">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect bg_blue text-white">
                  Acheter 15 $ l'unité
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 espaceur">
          <div class="mdl-card mdl-shadow--2dp center carte">
            <div class="filtre" style="background: #1B5E20;"></div>
            <div class="back divflex" style="background: url('https://data.planet-puzzles.com/ravensburger.5/le-paradis-exotique-puzzle-1000-pieces.44158-1.fs.jpg') center/cover">
              <h2 class="concept margin_auto text-white">Une place au paradis</h2>
            </div>
            <div class="row center" style="margin-top: 200px;">

            </div>
            <div class="row center bottom">
              <form class="" action="{{ url('/payment') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="product" value="Place au Paradis">
                <input type="hidden" name="price" id="price" value="50" placeholder="Nombre de clé" class="input input1">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect bg_blue text-white">
                  Acheter 50 $ l'unité
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 espaceur">
          <div class="mdl-card mdl-shadow--2dp center carte">
            <div class="filtre" style="background: #FF5722;"></div>
            <div class="back divflex" style="background: url('http://www.eddenya.com/images/Quelques_conseils_dun_sage_bouddhiste_pour_nettoyer_votre_maison.jpg') center/cover">
              <h2 class="concept margin_auto text-white">La Sagesse</h2>
            </div>
            <div class="row center" style="margin-top: 200px;">

            </div>
            <div class="row center bottom">
              <form class="" action="{{ url('/payment') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="product" value="Sagesse">
                <input type="hidden" name="price" id="price" value="20" placeholder="Nombre de clé" class="input input1">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect bg_blue text-white">
                  Acheter 20 $ l'unité
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 espaceur">
          <div class="mdl-card mdl-shadow--2dp center carte">
            <div class="filtre" style="background: #F44336;"></div>
            <div class="back divflex" style="background: url('https://c1.staticflickr.com/9/8387/8628441481_e9ac0810f7_b.jpg') center/cover">
              <h2 class="concept margin_auto text-white">La joie</h2>
            </div>
            <div class="row center" style="margin-top: 200px;">

            </div>
            <div class="row center bottom">
              <form class="" action="{{ url('/payment') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="product" value="Joie">
                <input type="hidden" name="price" id="price" value="15" placeholder="Nombre de clé" class="input input1">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect bg_blue text-white">
                  Acheter 15 $ l'unité
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 espaceur">
          <div class="mdl-card mdl-shadow--2dp center carte">
            <div class="filtre" style="background: #FFFF00;"></div>
            <div class="back divflex" style="background: url('http://www.kinesiologie-marseille.com/wp-content/uploads/2015/09/protection-famille-e0593-1.gif') center/cover">
              <h2 class="concept margin_auto text-white">Une Famille</h2>
            </div>
            <div class="row center" style="margin-top: 200px;">

            </div>
            <div class="row center bottom">
              <form class="" action="{{ url('/payment') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="product" value="Famille">
                <input type="hidden" name="price" id="price" value="50" placeholder="Nombre de clé" class="input input1">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect bg_blue text-white">
                  Acheter 50 $ l'unité
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 espaceur">
          <div class="mdl-card mdl-shadow--2dp center carte">
            <div class="filtre" style="background: #1B5E20;"></div>
            <div class="back divflex" style="background: url('http://img.over-blog-kiwi.com/0/67/22/95/20160314/ob_4ecd5b_albert-einstein.jpg') center/cover">
              <h2 class="concept margin_auto text-white">L' Intelligence</h2>
            </div>
            <div class="row center" style="margin-top: 200px;">

            </div>
            <div class="row center bottom">
              <form class="" action="{{ url('/payment') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="product" value="Famille">
                <input type="hidden" name="price" id="Intelligence" value="50">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect bg_blue text-white">
                  Acheter 50 $ l'unité
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 espaceur">
          <div class="mdl-card mdl-shadow--2dp center carte">
            <div class="filtre" style="background: #3F51B5;"></div>
            <div class="back divflex" style="background: url('https://cdn2.nextinpact.com/images/bd/wide-linked-media/3806.jpg') center/cover">
              <h2 class="concept margin_auto text-white">L' Univers</h2>
            </div>
            <div class="row center" style="margin-top: 200px;">

            </div>
            <div class="row center bottom">
              <form class="" action="{{ url('/payment') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="product" value="Univers">
                <input type="hidden" name="price" id="price" value="40" placeholder="Nombre de clé" class="input input1">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect bg_blue text-white">
                  Acheter 40 $ l'unité
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 espaceur">
          <div class="mdl-card mdl-shadow--2dp center carte">
            <div class="filtre" style="background: #FFEB3B;"></div>
            <div class="back divflex" style="background: url('https://www.quizz.biz/uploads/quizz/847119/1_y7UkY.jpg') center/cover">
              <h2 class="concept margin_auto text-white">Le One piece</h2>
            </div>
            <div class="row center" style="margin-top: 200px;">

            </div>
            <div class="row center bottom">
              <form class="" action="{{ url('/payment') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="product" value="One piece">
                <input type="hidden" name="price" id="price" value="200" placeholder="Nombre de clé" class="input input1">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect bg_blue text-white">
                  Acheter 200 $ l'unité
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 espaceur">
          <div class="mdl-card mdl-shadow--2dp center carte">
            <div class="filtre" style="background: #607D8B;"></div>
            <div class="back divflex" style="background: url('https://img1.closermag.fr/var/closermag/storage/images/1/2/5/7/6/12576683/barack-obama-dans-les-rues-milan-mai-2017_exact1024x768_l.jpg') center/cover">
              <h2 class="concept margin_auto text-white">Le Charisme</h2>
            </div>
            <div class="row center" style="margin-top: 200px;">

            </div>
            <div class="row center bottom">
              <form class="" action="{{ url('/payment') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="product" value="Charisme">
                <input type="hidden" name="price" id="price" value="35" placeholder="Nombre de clé" class="input input1">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect bg_blue text-white">
                  Acheter 35 $ l'unité
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 espaceur">
          <div class="mdl-card mdl-shadow--2dp center carte">
            <div class="filtre" style="background: #03A9F4;"></div>
            <div class="back divflex" style="background: url('https://i1.wp.com/www.usmagazine.com/wp-content/uploads/2018/02/michael-b-jordan.jpg?crop=0px%2C0px%2C1540px%2C1540px&resize=800%2C800&ssl=1') center/cover">
              <h2 class="concept margin_auto text-white">Un copin</h2>
            </div>
            <div class="row center" style="margin-top: 200px;">

            </div>
            <div class="row center bottom">
              <form class="" action="{{ url('/payment') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="product" value="Copin">
                <input type="hidden" name="price" id="price" value="10" placeholder="Nombre de clé" class="input input1">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect bg_blue text-white">
                  Acheter 10 $ l'unité
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 espaceur">
          <div class="mdl-card mdl-shadow--2dp center carte">
            <div class="filtre" style="background: #FF1744;"></div>
            <div class="back divflex" style="background: url('https://www.firerank.com/upload/dli/1498/551ad924e54fa_800.jpg') center/cover">
              <h2 class="concept margin_auto text-white">Une copine</h2>
            </div>
            <div class="row center" style="margin-top: 200px;">

            </div>
            <div class="row center bottom">
              <form class="" action="{{ url('/payment') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="product" value="Copine">
                <input type="hidden" name="price" id="price" value="15" placeholder="Nombre de clé" class="input input1">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect bg_blue text-white">
                  Acheter 15 $ l'unité
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 espaceur">
          <div class="mdl-card mdl-shadow--2dp center carte">
            <div class="filtre" style="background: #212121;"></div>
            <div class="back divflex" style="background: url('http://autoaufeminin-28b0.kxcdn.com/wp-content/uploads/2013/10/Lamborghini-Aventador-Nicki-Minaj.jpg') center/cover">
              <h2 class="concept margin_auto text-white">Le rêve</h2>
            </div>
            <div class="row center" style="margin-top: 200px;">

            </div>
            <div class="row center bottom">
              <form class="" action="{{ url('/payment') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="product" value="rêve">
                <input type="hidden" name="price" id="price" value="20" placeholder="Nombre de clé" class="input input1">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect bg_blue text-white">
                  Acheter 20 $ l'unité
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 espaceur">
          <div class="mdl-card mdl-shadow--2dp center carte">
            <div class="filtre" style="background: #607D8B;"></div>
            <div class="back divflex" style="background: url('http://ekladata.com/VLm2tj6FTbihvXrCD48SADbpvLY.jpg') center/cover">
              <h2 class="concept margin_auto text-white">La chance</h2>
            </div>
            <div class="row center" style="margin-top: 200px;">

            </div>
            <div class="row center bottom">
              <form class="" action="{{ url('/payment') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="product" value="Chance">
                <input type="hidden" name="price" id="price" value="20" placeholder="Nombre de clé" class="input input1">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect bg_blue text-white">
                  Acheter 20 $ l'unité
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 espaceur">
          <div class="mdl-card mdl-shadow--2dp center carte">
            <div class="filtre" style="background: #607D8B;"></div>
            <div class="back divflex" style="background: url('https://www.diariste.fr/upload/photo/9/0/2/7/7/8abad020a7ac197e1be75cee8b985240.jpg') center/cover">
              <h2 class="concept margin_auto text-white">L' Espoir</h2>
            </div>
            <div class="row center" style="margin-top: 200px;">

            </div>
            <div class="row center bottom">
              <form class="" action="{{ url('/payment') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="product" value="Espoir">
                <input type="hidden" name="price" id="price" value="20" placeholder="Nombre de clé" class="input input1">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect bg_blue text-white">
                  Acheter 20 $ l'unité
                </button>
              </form>
            </div>
          </div>
        </div>

        <div class="col-lg-3 col-md-6 espaceur">
          <div class="mdl-card mdl-shadow--2dp center carte">
            <div class="filtre" style="background: #FFEB3B;"></div>
            <div class="back divflex" style="background: url('http://cache.marieclaire.fr/data/photo/w700_c17/4f/blowtox-femme.jpg') center/cover">
              <h2 class="concept margin_auto text-white">Le sourire</h2>
            </div>
            <div class="row center" style="margin-top: 200px;">

            </div>
            <div class="row center bottom">
              <form class="" action="{{ url('/payment') }}" method="post">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="product" value="Sourire">
                <input type="hidden" name="price" id="price" value="5" placeholder="Nombre de clé" class="input input1">
                <button type="submit" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect bg_blue text-white">
                  Acheter 5 $ l'unité
                </button>
              </form>
            </div>
          </div>
        </div>

      </div>
    </div>

    <div class="container margin_top100 padding_top50 shadow_1" style="padding-bottom: 50px; border-radius: 2px">
      <div class="row center">
        <h1> <span class="blue" > Une fois le produit obtenue, </span> <br> garder le en lieu sûr <br> et entretener le, afin de vivre avec le plus longtemps possible</h1>
      </div>
      <div class="row center margin_top50 padding10">
        <p class="gray"><i class="material-icons position-relative" style="top: 7px">favorite</i> Rêver, oser, croyer, ayer confiance ! <br> Tout vos voeux seront réalisé, et surtout entretenez le produit. <br> Le produit peut servir de cadeau symbolique à un proche <br>
        <a href="mailto:client@bigconnerie.com">client@bigconnerie.com</a></p>
      </div>

        <div class="row center">
          <p><a href="#"><button class="mdl-button mdl-js-button mdl-button--icon"><i class="gray material-icons position-relative" style="top: 10px">share</i></button> Partager</a></p>
        </div>

        <div class="row center">
          <iframe src="https://docs.google.com/forms/d/e/1FAIpQLSd6O8u0KQCzUrIKZA7lD1JgDc8SCtqNywddjFguBMfmfSuqAw/viewform?embedded=true" width="700" height="520" frameborder="0" marginheight="0" marginwidth="0">Chargement en cours...</iframe>
        </div>

    </div>

    <div class="container margin_top100">
      <footer class="row center">
        <p>2018 © All Rights reserved Humanity BigBullShit</p>
      </footer>
    </div>

    @include('standard.scripts')

  </body>
</html>
