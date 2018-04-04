<?php

namespace App\Http\Controllers;
session_start();

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\InscriUser;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use \Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Redirect;
use Cookie;

class ProfileController extends Controller
{
    public static function FrenchFormat2Sql($date) {
     if(preg_match('/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/',$date)) {
       $datesql=preg_replace('/^([0-9]{2})\/([0-9]{2})\/([0-9]{4})$/','$3-$2-$1',$date);
       return $datesql;
     }
    }
    //Fonction qui permet d'automatiser la publication ( fonction interne )
    protected function GenereUpdate($postname, $postvalue, $user_id) {
      if(isset($_POST['name'])) {
        if($_POST['name'] == $postname) {
          $user = InscriUser::where('user_id', '=', $user_id);
          $user->update([$postname =>  $postvalue]);
        }
      }
    }
    public function UpdateProfile(Request $request)
    {
      $this->GenereUpdate('user_name', Input::get('value'), Input::get('user_id'));
      $this->GenereUpdate('user_mail', Input::get('value'), Input::get('user_id'));
      $this->GenereUpdate('user_tel', Input::get('value'), Input::get('user_id'));
      $this->GenereUpdate('user_gender', Input::get('value'), Input::get('user_id'));
      $this->GenereUpdate('user_locale', Input::get('value'), Input::get('user_id'));
      $this->GenereUpdate('user_description', Input::get('value'), Input::get('user_id'));
      $this->GenereUpdate('user_job', Input::get('value'), Input::get('user_id'));
      $this->GenereUpdate('user_website', Input::get('value'), Input::get('user_id'));
      $this->GenereUpdate('user_birthday', $this->FrenchFormat2Sql(Input::get('value')), Input::get('user_id'));
      $this->GenereUpdate('user_card', Input::get('value'), Input::get('user_id'));

      $profilefile = $request->file('profilefile');
      if(isset($profilefile)) {
        //On selectionne l'ancienne photo de profile afin de le supprimer après
        $filename = DB::select('select * from uuniik_user where user_id = ?', [ Input::get('user_id')]);
        $ext = substr(strrchr($profilefile->getClientOriginalName(),'.'),1);
        $newname = md5(uniqid(rand(), true)).'.'.$ext;

        Storage::disk('local')->put($newname, File::get($profilefile));
        $user = InscriUser::where('user_id', '=', Input::get('user_id'));
        $user->update(["user_filename" =>  $newname]);

        //supprimer l'ancienne photo de profile
        if (!empty($filename[0]->user_filename)) {
          Storage::delete($filename[0]->user_filename);
        }
      }

      $coverfile = $request->file('coverfile');
      if(isset($coverfile)) {
        //On selectionne l'ancienne photo de couverture afin de le supprimer après
        $filename = DB::select('select * from uuniik_user where user_id = ?', [ Input::get('user_id')]);
        $ext = substr(strrchr($coverfile->getClientOriginalName(),'.'),1);
        $newname = md5(uniqid(rand(), true)).'.'.$ext;

        Storage::disk('local')->put($newname, File::get($coverfile));
        $user = InscriUser::where('user_id', '=', Input::get('user_id'));
        $user->update(["user_coverfilename" =>  $newname]);

        //supprimer l'ancienne photo de couverture
        if (!empty($filename[0]->user_coverfilename)) {
          Storage::delete($filename[0]->user_coverfilename);
        }
      }
    }

    public function Like() {
      
    }

}
