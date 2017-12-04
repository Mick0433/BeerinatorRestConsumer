<?php
    $uri = "http://beerinator.azurewebsites.net/Service1.svc/Beerinatorprofiles/";
    $jsondata = file_get_contents($uri);

    $convertToAssociativeArray = true;
    $profiles = json_decode($jsondata, $convertToAssociativeArray);


    require_once '../vendor/autoload.php';
    Twig_Autoloader::register();
    $loader = new Twig_Loader_Filesystem('../Views');
    $twig = new Twig_Environment($loader, array(

        'auto_reload' => true
    ));
    $template = $twig->loadTemplate('profiles.twig');
    $parametersToTwig = array("profiles" => $profiles);
    echo $template->render($parametersToTwig);
