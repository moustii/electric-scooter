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
        $trotinettes = $this->trotManager->getTrotinettes();
        require 'views/front/trotinettes.view.php';
    }

    public function showTrotinette($id) {
        $trotinette = $this->trotManager->getTrotinetteById($id);
        require 'views/front/trotinette.view.php';
    }
}

