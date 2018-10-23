<?php

class PaypalManip{

  public $user = "ekoueakouete24-facilitator_api1.gmail.com";
  public $pwd = "JR6S7U68497JL4ZG";
  public $signature = "AFcWxV21C7fd0v3bYYYRCpSSRl31AavaCyVbWI-Hmb7C1mlLRtWOHkgs";
  public $endpoint = 'https://api-3T.sandbox.paypal.com/nvp';
  public $errors = array();

  public function __construct($user=false, $pwd=false, $signature=false, $prod=false) {
    if($user) {
      $this->user = $user;
    }
    if($pwd) {
      $this->pwd = $pwd;
    }
    if($signature) {
      $this->signature = $signature;
    }
    if($user) {
      $this->user = $user;
    }
    if($prod) {
      $this->endpoint = str_replace('.sandbox','', $this->endpoint);
    }
  }

  public function request($method, $params) {
    $params = array_merge($params, array(
      'METHOD' => $method,
      'VERSION' => '74.0',
      'USER' => $this->user,
      'SIGNATURE' => $this->signature,
      'PWD' => $this->pwd
    ));
    $params = http_build_query($params);
    $endpoint = 'https://api-3T.sandbox.paypal.com/nvp';
    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => $this->endpoint,
      CURLOPT_POST => 1,
      CURLOPT_POSTFIELDS => $params,
      CURLOPT_RETURNTRANSFER => 1,
      CURLOPT_SSL_VERIFYPEER => false,
      CURLOPT_SSL_VERIFYHOST => false,
      CURLOPT_VERBOSE => 1
    ));
    $response = curl_exec($curl);
    $responseArray = array();
    parse_str($response, $responseArray);

    if(curl_errno($curl)) {
      $this->errors = curl_error($curl);
      curl_close();
      die();
    }else {
      if($responseArray['ACK'] == 'success') {
        $this->errors = $responseArray;
        curl_close($curl);
        return false;
      }else {
        return $responseArray;
      }
    }
  }

}

?>
