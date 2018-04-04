<?php
namespace App\Http\Controllers;
/**
 * class qui gère les url du site
 */
class WayController
{
  public $url = array();
  public $directory;
  public $LOGOURL;
  public $MANIFESTJSONURL;
  public $GOOGLECONFIGURL;

  public function SetUrl() {
    $this->directory = "C:/xampp/htdocs/";
    $this->LOGOURL = asset('img/uuniik.png');
    $this->MANIFESTJSONURL = "http://".$_SERVER['HTTP_HOST']."/site/uuniik_project/uuniik/public/js/manifest.json";
    $this->GOOGLECONFIGURL = $this->directory."site/uuniik_project/uuniik/app/GoogleConfig.php";
    $this->url = [
      'LOGOURL' => $this->LOGOURL,
      'MANIFESTJSONURL' => $this->MANIFESTJSONURL,
      'GOOGLECONFIGURL' => $this->GOOGLECONFIGURL,
    ];
  }

}
