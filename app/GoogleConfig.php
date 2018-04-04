<?php
session_start();
require 'C:/xampp/htdocs/site/uuniik_project/uuniik/app/google-api/vendor/autoload.php';

$gClient1 = new Google_Client();
$gClient1->setClientId("1032825799501-14hhlm5a1oeku7063jv9u7tspgeibok7.apps.googleusercontent.com");
$gClient1->setClientSecret("7UbhV0yFAk4hg0dxvhX-j7n_");
$gClient1->setApplicationName("Uuniik");
$gClient1->setRedirectUri(url('GoogleLogin'));
$gClient1->addScope("https://www.googleapis.com/auth/plus.login https://www.googleapis.com/auth/userinfo.email");

?>
