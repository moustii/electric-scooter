<?php

require_once 'controllers/front/TrotinettesController.php';

$trotController = new TrotinettesController();

// verifie si la variable passé en get existe et vide
// si oui affiche la page accueil
try {
    if (empty($_GET['page'])) {
        $trotController->getHome();
    } else {
        switch($_GET['page']) {
            case 'home': $trotController->getHome();
            break;
            case 'trotinettes': 
                if (empty($_GET['action'])&& empty($_GET['id'])) {
                    $trotController->displayTrotinettes();
                } else {
                    switch($_GET['action']) {
                        case 'r' : $trotController->showTrotinette($_GET['id']);
                        break; 
                    }
                }      
            break;
            case 'nous': $trotController->getNous();
            break;
        }
    }
} catch(Exception $e) {
    echo $e->getMessage();
}