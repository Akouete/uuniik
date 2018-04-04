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

      $post = $postmodel::create([
        'post_type' => Input::get('post_type'),
        'post_userid' => Session::get("user")->user_id,
        'post_title' => Input::get('post_title'),
        'post_content' => Input::get('post_content'),
        'post_location' => Input::get('post_location'),
        'post_link' => Input::get('post_link'),
        'post_embededlink' => Input::get('post_embededlink')
      ]);

      $post_file = $request->file('post_file');
      $post_videominiature = $request->file('post_videominiature');


      if(isset($post_file)) {
        $ext = $post_file->getClientOriginalExtension();
        $mime = $post_file->getMimeType();
        $newname = $mime.'__'.$post['id'].'__'.md5(uniqid(rand(), true)).'.'.$ext;
        Storage::disk('local')->put($newname, File::get($post_file));
        $fileinfo = PostModel::where('post_id', '=', $post['id']);
        $fileinfo->update(["post_filename" =>  $newname]);
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
