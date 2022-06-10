<?php
require_once './models/TrotinetteManager.php';

class TrotinettesController {
    private $trotManager;

    public function __construct() {
        $this->trotManager = new TrotinetteManager();
        $this->trotManager->generatorTrotinette();
    }

    public function getHome() {
        $trotinettes = $this->trotManager->getTrotinette();
        require 'views/front/home.view.php';
    }

    public function getNous() {
        require 'views/front/nous.view.php';
    }

    public function displayTrotinettes() {
        $perPage = (int)1;
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
        require 'views/front/trotinettes.view.php';
    }

    public function showTrotinette($id) {
        $trotinette = $this->trotManager->getTrotinetteById($id);
        require 'views/front/trotinette.view.php';
    }
}

