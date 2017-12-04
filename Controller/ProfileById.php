<?php
$uri = "http://beerinator.azurewebsites.net/Service1.svc/Beerinatorprofiles/";
$id = $_POST['id'];
$jsondata = file_get_contents($uri  . $id);
$profile = json_decode($jsondata, true);
if (empty($profile)) {
    $profileArray = null;
}
else {
    $profileArray = array($profile);
}

require_once '../vendor/autoload.php';
Twig_Autoloader::register();
$loader = new Twig_Loader_Filesystem('../Views');
$twig = new Twig_Environment($loader, array(

    'auto_reload' => true
));
$template = $twig->loadTemplate('profiles.twig');
$parametersToTwig = array("profiles" => $profileArray);
echo $template->render($parametersToTwig);