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

              @php
               //Selection des posts à afficher
               $posts = DB::select('select * from uuniik_posts');
              @endphp

             @for ($i=0; $i < sizeof($posts); $i++)
               @php
               //Selection des donnée du publicateur du post
                 $user = DB::select('select * from uuniik_user where user_id = ?', [$posts[$i]->post_userid]);

                 $userprofile = Session::get("fileDirectory").Session::get("user")->user_filename;
                 $username = Session::get("user")->user_name;
                 $user_id = Session::get("user")->user_id;
                 $date = $posts[$i]->created_at;
                 $posttitle = $posts[$i]->post_title;
                 $postcontent = $posts[$i]->post_content;
                 $location = $posts[$i]->post_location;
                 $userprofilelink = url('/PersonProfil/'.$posts[$i]->post_userid);

               @endphp
               @php
               if ($posts[$i]->post_type == "audio") {
                 $audiolink = Session::get("fileDirectory").$posts[$i]->post_filename;
                 $postlink = url("/Similar/audio/".$posts[$i]->post_id);
                 GenerateAudioPost($audiolink, $userprofile, $posttitle, $postcontent, $userprofilelink, $postlink);
               }
               if ($posts[$i]->post_type == "doc") {
                 $postlink = url("/Similar/document/".$posts[$i]->post_id);
                 GenerateDocumentPost($userprofile, $username, $date, $location, $posttitle, $postcontent, $userprofilelink, $postlink);
               }
               if ($posts[$i]->post_type == "img") {
                 $imglink = Session::get("fileDirectory").$posts[$i]->post_filename;
                 $postlink = url("/Similar/image/".$posts[$i]->post_id);
                 GenerateImagePost($imglink, $userprofile, $username, $date, $location, $userprofilelink, $postlink);
               }
               if ($posts[$i]->post_type == "text") {
                 $postlink = url("/Similar/text/".$posts[$i]->post_id);
                 GenerateTextPost($userprofile, $username, $date, $location, $posttitle, $postcontent, $userprofilelink, $postlink);
               }
               if ($posts[$i]->post_type == "video") {
                 $postlink = url("/Similar/video/".$posts[$i]->post_id);
                 $miniaturelink = Session::get("fileDirectory").$posts[$i]->post_videominiature;
                 GenerateVideoPost($miniaturelink, $userprofile, $username, $date, $location, $userprofilelink, $postlink);
               }
               @endphp
             @endfor


                  @for ($i=0; $i < 10 ; $i++)
                    @php
                    //  GenerateAudioPost();
                      //GenerateVideoPost();
                      //GenerateDocumentPost();
                      //GenerateImagePost();
                      //GenerateTextPost();
                    @endphp
                  @endfor





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
