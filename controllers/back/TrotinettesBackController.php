<?php

class TrotinettesBackController {
    protected $trotManager;

    public function __construct() {
            $this->trotManager = new TrotinetteManager();
            // $this->trotManager->generatorTrotinette();
    }

    public function displayTrotinettes($url) {
        if (array_key_exists("1", $url)) {
            $page = $url[1];
        }
        $perPage = (int)6;
        // $allTrotinettes = $this->trotManager->getAllTrotinettes();
        $allTrotinettes = $this->trotManager->getAllTrotinettes();
        
        $numberOfTrotinettes = (int)count($allTrotinettes);
        $totalPage = (int)ceil($numberOfTrotinettes / $perPage);

        if (isset($page) && !empty($page) && $page <= $totalPage) {
            $currentPage = (int)htmlspecialchars($page);
        } else {
            $currentPage = 1;
        }
        $firstTrotPerPage = (int)($currentPage * $perPage) - $perPage;
        $images = $this->trotManager->getImages();
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
        $imagesName = Tools::addImage($files, $dir);

        $this->trotManager->addTrotinetteInDatabase($_POST['label'], $_POST['serialNumber'],$_POST['color'], $_POST['speed'], $_POST['battery'], $_POST['price'], $_POST['status'], $_POST['description']);

        $trotinettes = $this->trotManager->getAllTrotinettes();
        $lastTrotinette = array_key_last($trotinettes);
        $lastIdTrot = (int)$trotinettes[$lastTrotinette]['id_trotinette'];

        // insert les images
        foreach ($imagesName as $key => $imageName) {
            $idImage[] = (int)$this->trotManager->addImageTrotinetteInDataBase($imageName);  
            $this->trotManager->bindImageToTrotInDataBase($idImage[$key], $lastIdTrot);
        }
        header('Location: '.URL.'dashboard');
    }

    public function deleteTrotinette($id) {
        // on recupere l'image ou les images correspondant à la trotinette
        $imageName = $this->trotManager->getImageTrotinetteById($id);
        // on la supprimer du dossier
        foreach ($imageName as $key => $img) {
            unlink('public/sources/images/trotinettes/'.$img['url_image']);
        }
        // on supprimer le(s) bind(s) et l'image ou les images dans la bd
        $this->trotManager->deleteImageTrotinetteInDataBase($id);
        // // ensuite on supprime la trotinette dans le bd
        $this->trotManager->deleteTrotinetteInDatabase($id);
        header('Location: '.URL.'dashboard');
    }

    public function updateTrotinette($id) {
        $trotinette = $this->trotManager->getTrotinetteById($id);
        $image = $this->trotManager->getImageTrotinetteById($id);
        require 'views/back/update.trotinette.view.php';
    }


}

