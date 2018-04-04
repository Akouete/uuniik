<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\InscriUser;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use \Illuminate\Support\Facades\Hash;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Redirect;
use Cookie;

class RegistrationController extends Controller
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

    public function setCookie(Request $request){
      $minutes = 60;
      $response = new Response('Set Cookie');
      $response->withCookie(cookie('name', 'MyValue', $minutes));
      return $response;
   }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
      if(isset($_POST['uuniik_registration'])) {
        $InscriUser = new InscriUser();
        $validator = \Validator::make($request->all(), [
          'user_mail' => 'required|email',
          'user_password' => 'required|alpha_dash'
        ]);
        if($validator->fails()) {
          $identification = true;
          $mail = true;
          $password = true;
          return redirect()->action("PagesController@error");
        }else {
          $user = InscriUser::create([
            'user_mail' => Input::get('user_mail'),
            'user_password' => Hash::make(Input::get('user_password'))
          ]);
          Session::put("user", $user);
          setcookie("uuniik_id", $user['id'], time() + 365*24*3600);
          //setcookie("user_mail", $user['user_mail'], time() + 365*24*3600);
          //setcookie("user_password", $user['user_password'], time() + 365*24*3600);
          return redirect()->action("PagesController@posts");
        }
      }
      if(isset($_POST['google_registration'])) {
        $InscriUser = new InscriUser();
        $validator = \Validator::make($request->all(), [
          'user_name' => 'required',
          'user_mail' => 'required|email',
          'user_password' => 'required|alpha_dash',
          'user_gender' => 'required|alpha',
          'user_locale' => 'required|alpha_dash',
          'user_website' => 'required|active_url',
          'user_filename' => 'nullable'
        ]);
        if($validator->fails()) {
          return $validator->errors();
        }else {
          $newfilename = md5(uniqid(rand(), true));

          $user = InscriUser::create([
            'user_name' => Input::get('user_name'),
            'user_mail' => Input::get('user_mail'),
            'user_password' => Hash::make(Input::get('user_password')),
            'user_gender' => Input::get('user_gender'),
            'user_locale' => Input::get('user_locale'),
            'user_website' => Input::get('user_website'),
            'user_filename' => $newfilename.'.jpg',
          ]);

          $url = Input::get('user_filename');
          $fichier = storage_path('app/'.$newfilename.'.jpg');
          $ch = curl_init($url);
          $fp = fopen($fichier, 'wb');
          curl_setopt($ch, CURLOPT_FILE, $fp);
          curl_setopt($ch, CURLOPT_HEADER, 0);
          curl_exec($ch);
          curl_close($ch);
          fclose($fp);

          Session::put("user", $user);
          setcookie("uuniik_id", $user['id'], time() + 365*24*3600);
          return redirect()->action("PagesController@posts");
        }

      }

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
