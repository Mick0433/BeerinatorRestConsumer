<?php

$uri = "http://beerinator.azurewebsites.net/Service1.svc/Beerinatorprofiles/";
$id = $_GET['id'];
$full_uri = $uri . $id;
$ch = curl_init($full_uri);
// curl is good for more complex operations than just plain GET
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// TRUE to return the transfer as a string of the return value of curl_exec() instead of outputting it directly.
$jsondata = curl_exec($ch);
$theDeletedProfile = json_decode($jsondata, true);
if ($theDeletedProfile == null) {
    $profileArray = false;
} else {
    $profileArray = array($theDeletedProfile);
}
//print_r($bookArray);
require_once '../vendor/autoload.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../views');
$twig = new Twig_Environment($loader, array(
    // 'cache' => '/path/to/compilation_cache',
    'auto_reload' => true
));
$template = $twig->loadTemplate('profiles.twig');
$parametersToTwig = array("profiles" => $profileArray);
echo $template->render($parametersToTwig);
header('Location: AllProfiles.php');