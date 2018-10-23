<?php
session_start();
require 'C:/xampp/htdocs/site/uuniik_project/uuniik/resources/views/paypal.class.php';

$_SESSION['price'] = Session::get("price");

$products = array(
    'name' => Session::get("product"),
    'price' => Session::get("price"),
    'priceTVA' => Session::get("price"),
    'count' => $_SESSION['price']
);

$total = $_SESSION['price'];
$totalttc = $_SESSION['price'];
$port = 0;
$paypal = "#";
$paypal = new PaypalManip("ekoueakouete24-facilitator_api1.gmail.com", "JR6S7U68497JL4ZG", "AFcWxV21C7fd0v3bYYYRCpSSRl31AavaCyVbWI-Hmb7C1mlLRtWOHkgs", false);
$params = array(
  'METHOD' => 'SetExpressCheckout',
  'VERSION' => '74.0',
  'USER' => $paypal->user,
  'SIGNATURE' => $paypal->signature,
  'PWD' => $paypal->pwd,
  'RETURNURL' => url('/titrepdf'),
  'CANCELURL' => url('/bigconnerie'),

  'PAYMENTREQUEST_0_AMT' => $totalttc + $port,
  'PAYMENTREQUEST_0_CURRENCYCODE' => 'EUR',
  'PAYMENTREQUEST_0_SHIPPINGAMT' => $port,
  'PAYMENTREQUEST_0_ITEMAMT' => $totalttc,
  "PAYMENTREQUEST_0_NAME0" => $products['name'],
  "PAYMENTREQUEST_0_AMT0" => $products['priceTVA'],
  "PAYMENTREQUEST_0_QTY0" => $products['count']
 );
$response = $paypal -> request('SetExpressCheckout', $params);
if($response) {
  $paypal = 'https://sandbox.paypal.com/webscr&cmd=_express-checkout&useraction=commit&token='.$response['TOKEN'];
}else {
  var_dump($paypal -> $errors);
  die('Erreur');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    @include('standard.header')
    <link rel="stylesheet" href="{{ asset('css/bigconnerie.css') }}">
   <meta charset="utf-8">
   <title>Payment</title>
  </head>
  <body>

    <nav class="navbar fixed-top navbar-expand-lg navbar-light bg_white shadow_1">
      <img src="https://digitalloc.io/digitalloc/vue/img/digitalloclogop.png" id="logo" alt="">
      <a class="navbar-brand" href="#">&nbsp; <b>Believe and Trust</b></a> &nbsp;
      <button id="shopping" class="mdl-button mdl-js-button mdl-button--icon">
        <i class="material-icons text-dark">shopping_cart</i>
      </button>
    </nav>

    <div class="container margin_top100">
      <div class="row">
        <div class="col-md-3"></div>
          <section class="col-md-6 table-responsive">
            <table class="table shadow_1 bc-white table-bordered table-striped tablecondensed">
            <thead>
            <tr>
            <th >Produit</th>
            <th>Quantité</th>
            <th>Prix unitaire</th>
            <th>Prix total</th>
            </tr>
            </thead>
            <tbody>
            <tr>
            <td>{{ Session::get("product") }}</td>
            <td>1</td>
            <td>{{ $_SESSION['price'] }} $</td>
            <td>{{ $_SESSION['price'] }}  $</td>
            </tbody>
            </table>
          </section>
      </div>
      <div class="col-md-12 center">
        <div class="margin-top50">
          <a href="{{ $paypal }}"  title="Cliquez pour payer"><button type="button" class="bg_blue text-white mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect"name="button">Pay with paypal</button></a>
        </div>
      </div>
    </div>


    <div class="container margin_top100">
      <footer class="row center">
        <p>2018 © All Rights reserved Humanity BigBullShit</p>
      </footer>
    </div>


  </body>
</html>
