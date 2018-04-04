<?php
namespace App\Http\Controllers;

use App\Http\Controllers\WayController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Cookie;
use Illuminate\Support\Facades\Session;



class PagesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     /**
     * Create a new authentication controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('ajax', ['only' => 'personnes']);
    }

    public function index()
    {
        $way = new WayController();
        $way->SetUrl();
        if (isset($_COOKIE['uuniik_id'])) {
          $user = DB::select('select * from uuniik_user where user_id = ?', [ $_COOKIE['uuniik_id'] ]);
          Session::put("user", $user[0]);
          return view('index', ['LOGOURL' => $way->url['LOGOURL']]);
        }else {
          return view('connexion', ['LOGOURL' => $way->url['LOGOURL']]);
        }
    }

    public function connexion() {
      $way = new WayController();
      $way->SetUrl();
      if (isset($_COOKIE['uuniik_id'])) {
        $user = DB::select('select * from uuniik_user where user_id = ?', [ $_COOKIE['uuniik_id'] ]);
        Session::put("user", $user[0]);
        return view('AjaxPages/Posts', ['LOGOURL' => $way->url['LOGOURL'],
          'MANIFESTJSONURL' => $way->url['MANIFESTJSONURL']
        ]);
      }else {
        return view('connexion', [
          'LOGOURL' => $way->url['LOGOURL'],
          'MANIFESTJSONURL' => $way->url['MANIFESTJSONURL'],
          'GOOGLECONFIGURL' => $way->url['GOOGLECONFIGURL'],
        ]);
      }
    }


    public function essai() {
      $way = new WayController();
      $way->SetUrl();
      return view('essai', ['LOGOURL' => $way->url['LOGOURL'],
        'MANIFESTJSONURL' => $way->url['MANIFESTJSONURL']
      ]);
    }

    public function posts() {
      $way = new WayController();
      $way->SetUrl();
      if (isset($_COOKIE['uuniik_id'])) {
        $user = DB::select('select * from uuniik_user where user_id = ?', [ $_COOKIE['uuniik_id'] ]);
        Session::put("user", $user[0]);
        return view('AjaxPages/Posts', ['LOGOURL' => $way->url['LOGOURL'],
          'MANIFESTJSONURL' => $way->url['MANIFESTJSONURL']
        ]);
      }else {
        return view('connexion', [
          'LOGOURL' => $way->url['LOGOURL'],
          'MANIFESTJSONURL' => $way->url['MANIFESTJSONURL'],
          'GOOGLECONFIGURL' => $way->url['GOOGLECONFIGURL'],
        ]);
      }
    }

    public function questions() {
      $way = new WayController();
      $way->SetUrl();
      return view('AjaxPages/Questions', ['LOGOURL' => $way->url['LOGOURL'],
        'MANIFESTJSONURL' => $way->url['MANIFESTJSONURL']
      ]);
    }

    public function reponses() {
      $way = new WayController();
      $way->SetUrl();
      return view('AjaxPages/Reponses', ['LOGOURL' => $way->url['LOGOURL'],
        'MANIFESTJSONURL' => $way->url['MANIFESTJSONURL']
      ]);
    }

    public function personnes() {
      $way = new WayController();
      $way->SetUrl();
      return view('AjaxPages/Personnes', ['LOGOURL' => $way->url['LOGOURL'],
        'MANIFESTJSONURL' => $way->url['MANIFESTJSONURL']
      ]);
    }

    public function profile() {
      $way = new WayController();
      $way->SetUrl();
      return view('AjaxPages/Profile', ['LOGOURL' => $way->url['LOGOURL'],
        'MANIFESTJSONURL' => $way->url['MANIFESTJSONURL']
      ]);
    }

    public function PersonProfil() {
      $way = new WayController();
      $way->SetUrl();
      return view('AjaxPages/PersonProfil', ['LOGOURL' => $way->url['LOGOURL'],
        'MANIFESTJSONURL' => $way->url['MANIFESTJSONURL']
      ]);
    }

    public function similar() {
      $way = new WayController();
      $way->SetUrl();
      return view('AjaxPages/Similar', ['LOGOURL' => $way->url['LOGOURL'],
        'MANIFESTJSONURL' => $way->url['MANIFESTJSONURL']
      ]);
    }

    public function decouvrir() {
      $way = new WayController();
      $way->SetUrl();
      return view('AjaxPages/Decouvrir', ['LOGOURL' => $way->url['LOGOURL'],
        'MANIFESTJSONURL' => $way->url['MANIFESTJSONURL']
      ]);
    }

    public function googlelogin() {
      $way = new WayController();
      $way->SetUrl();
      return view('/GoogleLogin', [
        'LOGOURL' => $way->url['LOGOURL'],
        'GOOGLECONFIGURL' => $way->url['GOOGLECONFIGURL'],
        'MANIFESTJSONURL' => $way->url['MANIFESTJSONURL']
      ]);
    }

    public function error() {
      $way = new WayController();
      $way->SetUrl();
      return view('Error', ['LOGOURL' => $way->url['LOGOURL'],
        'MANIFESTJSONURL' => $way->url['MANIFESTJSONURL']
      ]);
    }

    public function postInterface() {
      $way = new WayController();
      $way->SetUrl();
      return view('AjaxPages/PostInterface', ['LOGOURL' => $way->url['LOGOURL'],
        'MANIFESTJSONURL' => $way->url['MANIFESTJSONURL']
      ]);
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
