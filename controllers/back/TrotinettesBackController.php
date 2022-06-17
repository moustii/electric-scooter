<?php
// require_once './models/TrotinetteManager.php';
// require_once './config/Tools.php';

class TrotinettesBackController extends TrotinettesFrontController {

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
        
        $files = $_FILES['image'];
        $dir = 'public/sources/images/trotinettes/';
        // imageName doit contenir les deux noms de fichiers
        $imagesName[] = Tools::addImage($files, $dir);
        var_dump($imagesName);


        // $lastIdImage = $this->trotManager->addImageTrotinetteInDataBase($imageName);

        // $lastIdTrot = $this->trotManager->addTrotinetteInDatabase($_POST['label'], $_POST['serialNumber'],$_POST['color'], $_POST['speed'], $_POST['battery'], $_POST['price'], $_POST['status'], $_POST['description']);

        // $imageTrot = $this->trotManager->bindImageToTrotInDataBase($lastIdImage, $lastIdTrot);
        
        // header('Location: index.php?page=dashboard');
        
    
        
    }





}

