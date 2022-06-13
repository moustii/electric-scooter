<?php
// require_once './models/TrotinetteManager.php';
// require_once './config/Tools.php';

class TrotinettesBackController extends TrotinettesController {

    public function displayTrotinettes() {
        $perPage = (int)10;
        $numberOfTrotinettes = (int)count($this->trotManager->getTrotinettes());
        $totalPage = (int)ceil($numberOfTrotinettes / $perPage);

        if (isset($_GET['p']) && !empty($_GET['p']) && $_GET['p'] <= $totalPage) {
            $currentPage = (int)htmlspecialchars($_GET['p']);
        } else {
            $currentPage = 1;
        }
        $firstTrotPerPage = (int)($currentPage * $perPage) - $perPage;
        $allTrotinettes = $this->trotManager->getTrotinettes();
        $trotinettes = array_slice($allTrotinettes, $firstTrotPerPage, $perPage);
        require 'views/back/list.trotinettes.view.php';
    }
    
    public function addTrotinette() {
        require 'views/back/addTrotinette.view.php';
    }

    public function addTrotinetteValidate() {
        // $file = $_FILES['image'];
        // $dir = 'public/images/';
        // $imageName = Tools::addImage($file, $dir);

        $this->trotManager->addTrotinetteInDatabase($_POST['label'], $_POST['serialNumber'],$_POST['color'], $_POST['speed'], $_POST['battery'], $_POST['price'], $_POST['status'], $_POST['description']);
        
        header('Location: index.php?page=dashboard');
        
        
        
    }





}

