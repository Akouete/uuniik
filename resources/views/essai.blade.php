<!DOCTYPE html>
{{ app('debugbar')->disable() }}
<html lang="en" dir="ltr">
  <head>
    @include('standard.header')
    <meta charset="utf-8">
    <title></title>
  </head>
  <style media="screen">
  body {
    background: rgb(20,20,40);
    overflow: hidden;
  }
    #cad {
      position: relative;
      width: 150px;
      height: 150px;
      background: rgb(255,255,255);
      border-radius: 2px;
      top: 0;
      left: 0;
    }
    #cad2 {
      position: relative;
      width: 150px;
      height: 150px;
      background: rgb(255,150,150);
      border-radius: 2px;
      top: 0;
      left: 0;
    }
  </style>
  <body>

      <div class="shadow_4" id="cad"></div>
      <div class="shadow_4" id="cad2"></div>


    <script type="text/javascript">

      function getRandomInt(max) {
        return Math.floor(Math.random() * Math.floor(max));
      }
      function animeCad(cadId) {
        var cad = document.querySelector(cadId);
        setInterval(function() {
          cad.style.top = getRandomInt(700)+'px';
          cad.style.left = getRandomInt(1400)+'px';
        }, 1000);
      }
      animeCad("#cad");
      animeCad("#cad2");

    </script>
  </body>
</html>
