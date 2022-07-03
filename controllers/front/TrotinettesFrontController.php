<?php

class TrotinettesFrontController {
    protected $trotManager;

    
    public function __construct() {
        $this->trotManager = new TrotinetteManager();
        // $this->trotManager->generatorTrotinette();
    }

    public function getHome() {
        $trotinettes = $this->trotManager->getTrotinette();
        require 'views/front/home.view.php';
    }

    public function getNous() {
        require 'views/front/nous.view.php';
    }

    public function displayTrotinettes($url) {
        if (array_key_exists("2", $url)) {
            $page = $url[2];
        }
        $perPage = (int)3;
        $allTrotinettes = $this->trotManager->getAllTrotinettes();

        $numberOfTrotinettes = (int)count($allTrotinettes);
        $totalPage = (int)ceil($numberOfTrotinettes / $perPage);

        if (isset($page) && !empty($page) && $page <= $totalPage) {
            $currentPage = (int)htmlspecialchars($page);
        } else {
            $currentPage = 1;
        }
        $firstTrotPerPage = (int)($currentPage * $perPage) - $perPage;
        $trotinettes = array_slice($allTrotinettes, $firstTrotPerPage, $perPage);
        $images = $this->trotManager->getImages();
        require 'views/front/trotinettes.view.php';
    }

    public function showTrotinette($id, $page) {
        if (!empty($page)) {
            $currentPage = $page;
        }
    
        $trotinette = $this->trotManager->getTrotinetteById($id);
        $image = $this->trotManager->getImageTrotinetteById($id);
        require 'views/front/trotinette.view.php';
    }
}

