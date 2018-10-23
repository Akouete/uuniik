<?php
namespace App\Http\Controllers;
session_start();

use Illuminate\Http\Request;
use App\PostModel;
use App\InscriUser;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use \Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Redirect;
use Cookie;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function Post(Request $request) {

      $postmodel = new PostModel();
      $validator = \Validator::make($request->all(), [
        'post_type' => 'required',
        'post_userid' => 'required|numeric',
        'post_title' => 'required|alpha_dash',
        'post_content' => 'required|alpha_dash',
        'post_location' => 'required|alpha_dash',
        'post_link' => 'required|alpha_dash',
        'post_embededlink' => 'required|alpha_dash'
      ]);

      // Si on a un code d'integration youtube ou daily motion
      if (Input::get('post_embededlink') != null) {
        $posttype = "video";
      }else {
        $posttype = "text";
      }

      $post = $postmodel::create([
        'post_type' => $posttype,
        'post_userid' => Session::get("user")->user_id,
        'post_title' => Input::get('post_title'),
        'post_content' => Input::get('post_content'),
        'post_location' => Input::get('post_location'),
        'post_link' => Input::get('post_link'),
        'post_embededlink' => Input::get('post_embededlink')
      ]);

      $post_file = $request->file('post_file');
      $post_videominiature = $request->file('post_videominiature');

      $videoExt = ['avi', 'AVI', 'MOV', 'WMV', 'mkv', 'MKV', 'mp4', 'MP4', 'mpeg4', '3GP', '3gp', 'M4V', 'm4v', 'ogg' ];
      $imageExt = ['png', 'PNG', 'jpeg', 'jpg','JPG', 'JPEG', 'jpeg', 'gif', 'GIF', 'BITMAP', 'bitmap'];
      $audioExt = ['mp3', 'MP3', 'OGG', 'ogg','WAV', 'wav', 'rsf', 'RSF', 'aac', 'AAC', 'm4a', 'M4A'];
      $docExt = ['txt', 'pdf', 'doc', 'docx', 'xls','xlsx', 'csv', 'CSV', 'ppt', 'pptx', 'odt'];

      if(isset($post_file)) {
        $ext = $post_file->getClientOriginalExtension();
        $mime = $post_file->getMimeType();
        $newname = $mime.'__'.$post['id'].'__'.md5(uniqid(rand(), true)).'.'.$ext;
        if (in_array($ext, $videoExt)) {
          $posttype = "video";
        }
        if (in_array($ext, $imageExt)) {
          $posttype = "img";
        }
        if (in_array($ext, $audioExt)) {
          $posttype = "audio";
        }
        if (in_array($ext, $docExt)) {
          $posttype = "doc";
        }
        Storage::disk('local')->put($newname, File::get($post_file));
        $uerinfo = PostModel::where('post_id', '=', $post['id']);
        $uerinfo->update(["post_filename" =>  $newname, "post_type" => $posttype]);
      }
      if(isset($post_videominiature)) {
        $ext = $post_videominiature->getClientOriginalExtension();
        $mime = $post_videominiature->getMimeType();
        $newname = $mime.'__'.$post['id'].'__'.md5(uniqid(rand(), true)).'.'.$ext;
        Storage::disk('local')->put($newname, File::get($post_videominiature));
        $fileinfo = PostModel::where('post_id', '=', $post['id']);
        $fileinfo->update(["post_videominiature" =>  $newname]);
      }
      if(isset($_POST['voicelink']) && !empty($_POST['voicelink'])) {
        $newfilename = md5(uniqid(rand(), true));
        $url = Input::get('voicelink');
        echo $url;
        $fichier = storage_path('app/audio/'.$newfilename.'.m4a');
        $ch = curl_init($url);
        $fp = fopen($fichier, 'wb');
        curl_setopt($ch, CURLOPT_FILE, $fp);
        curl_setopt($ch, CURLOPT_HEADER, 0);
        curl_exec($ch);
        curl_close($ch);
        fclose($fp);
      }


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
