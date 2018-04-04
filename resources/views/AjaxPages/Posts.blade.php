    @extends('index')
    @include('PostsComponent')
    @section('content')
      <title>Uuniik</title>
      <link rel="stylesheet" href="{{ asset('css/posts.css') }}">
      <div class="postspannel" style="margin-top: 65px">
        <div class="fixedcover none">


        </div>
        <div class="fixedcover none" id="afficheur">
          <div class="row">
            <div class="col-lg-4"></div>
            <div class="col-lg-4 radius20 bg_white position-relative height100">
              <p>Lorem ipsum dolor sit amet, consectetur  mollit anim id est laborum.</p>
            </div>
          </div>
        </div>

            <div class="row cont margin_bottom50">

              <?php
                for ($i=0; $i < 10 ; $i++) { ?>

                  @php
                    GenerateAudioPost();
                    GenerateVideoPost();
                    GenerateDocumentPost();
                    GenerateImagePost();
                    GenerateTextPost();
                  @endphp


              <?php  } ?>
            </div>

            <div id="contbtnedit">
              <!--button id="b4" class="shadow_4 none btnpost mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect bg-white">
                <i class="material-icons text-dark">accessibility</i>
              </button-->
              <button id="b3" class="shadow_4 none btnpost mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect bg-white">
                <i class="material-icons text-dark">explore</i>
              </button>
              <button id="b2" class="shadow_4 none btnpost mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect bg-white">
                <i class="material-icons text-dark">account_circle</i>
              </button>
              <button id="b1" class="shadow_4 none btnpost mdl-button mdl-js-button mdl-button--fab mdl-button--mini-fab mdl-js-ripple-effect bg-white">
                <i class="material-icons text-dark">add</i>
              </button>
              <button id="newpost" class="shadow_4 z_index2 mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect bg-white">
                <i class="material-icons text-dark">edit</i>
              </button>
            </div>
      </div>
      <div id="map_canvas">

      </div>
      <script type="text/javascript" src="{{ asset('js/AjaxFileScript/Posts.js') }}" ></script>

    @endsection
