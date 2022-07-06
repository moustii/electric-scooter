<?php
define('URL', str_replace('index.php', '', isset($_SERVER['HTTPS'])? 'https':'http'.'://'.$_SERVER['HTTP_HOST'].$_SERVER['PHP_SELF']));

require_once 'config/autoload.php';
// faire en sorte d'éviter une liste de controller
$trotFrontController = new TrotinettesFrontController();
$trotBackController = new TrotinettesBackController();

try {
    if (empty($_GET['page'])) {
        $trotFrontController->getHome();
    } else {
        $url = explode('/', filter_var($_GET['page']), FILTER_SANITIZE_URL);
        switch($url[0]) {
            case 'home': $trotFrontController->getHome();
            break;
            case 'trotinettes': 
                if (empty($url[1])) {
                    $trotFrontController->displayTrotinettes($url);
                } else {
                    switch($url[1]) {
                        case 'r': $trotFrontController->showTrotinette($url[2], $url[3]);
                        break; 
                        case 'c': $trotBackController->addTrotinette();
                        break;
                        case 'cv': $trotBackController->addTrotinetteValidate();
                        break; 
                        case 'page': $trotFrontController->displayTrotinettes($url);
                        break;
                        case 'u' : $trotBackController->updateTrotinette($url[2]);
                        break;
                        case 'uv' : $trotBackController->updateTrotinetteValidate();
                        break;  
                        case 'd' : $trotBackController->deleteTrotinette($url[2]);
                        break;
                        default : throw new Exception("La page n'existe pas");
                    }
                }      
            break;
            case 'nous': $trotFrontController->getNous();
            break;
            case 'dashboard': $trotBackController->displayTrotinettes($url);
            break;
            default : throw new Exception("La page n'existe pas");
        }
    }
} catch(Exception $e) {
    echo $e->getMessage();
}