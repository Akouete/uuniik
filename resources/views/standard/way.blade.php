<?php

$LOGOURL = asset('img/uuniik.png');

?>
<script type="text/javascript">
var url = {
  'PublicRepertoryUrl': 'http://'+window.location.host+'/site/uuniik_project/uuniik/public',
  'ConnexionUrl': 'http://'+window.location.host+'/site/uuniik_project/uuniik/public/connexion',
  'ConnexionCssUrl': 'http://'+window.location.host+'/site/uuniik_project/uuniik/public/css/connexion.css',
  'SwjsUrl': 'http://'+window.location.host+'/site/uuniik_project/uuniik/public/js/sw.js',
  'sw_toolboxjsUrl': 'http://'+window.location.host+'/site/uuniik_project/uuniik/node_modules/sw-toolbox/sw-toolbox.js',

  //'ProfileController': 'http://'+window.location.host+'/site/uuniik_project/uuniik/app/Http/Controllers/ProfileController.php'
  'ProfileController': '{{ url('/Profile') }}',
  'PostInterface': '{{ url('/PostInterface') }}',
  'decouvrir': '{{ url('/Decouvrir') }}'
};
//alert(url.PostInterface);
</script>
