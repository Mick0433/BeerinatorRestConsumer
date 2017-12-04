<?php
$id = $_POST["id"];
$uname = $_POST["uname"];
$upass = $_POST["upass"];
$fullname = $_POST["fullname"];
$role = $_POST["role"];
$data = array("Id" => $id, "Uname" => $uname, "Upass" => $upass, "Fullname" => $fullname, "Role" => $role);
$json_string = json_encode($data);
$uri = "http://beerinator.azurewebsites.net/Service1.svc/Beerinatorprofiles/";
$full_uri = $uri . $id;
$ch = curl_init($full_uri);

curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
curl_setopt($ch, CURLOPT_POSTFIELDS, $json_string);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'Content-Length: ' . strlen($json_string))
);
$jsondata = curl_exec($ch);
$theNewProfile = json_decode($jsondata, true);
$profileArray = array($theNewProfile);

require_once '../vendor/autoload.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../Views');
$twig = new Twig_Environment($loader, array(

    'auto_reload' => true
));
$template = $twig->loadTemplate('profiles.twig');
$parametersToTwig = array("profiles" => $profileArray);
echo $template->render($parametersToTwig);
header('Location: AllProfiles.php');