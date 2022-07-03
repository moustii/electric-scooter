<?php

class Trotinette {
    private $id;
    private $label;
    private $serialNumber;
    private $dateService;
    private $color;
    private $speed;
    private $batteryLife;
    private $price;
    private $descriptionTrotinette;
    private $idStatus;
    private $labelImage;
    private $urlImage;
    private $descriptionImage;


    public function __construct($id, $label, $serialNumber, $dateService, $color, $speed, $batteryLife, $price, $descriptionTrotinette, $idStatus, $labelImage, $urlImage, $descriptionImage) {
        $this->id = $id;
        $this->label = $label;
        $this->serialNumber = $serialNumber;
        $this->dateService = $dateService;
        $this->color = $color;
        $this->speed = $speed;
        $this->batteryLife = $batteryLife;
        $this->price = $price;
        $this->descriptionTrotinette = $descriptionTrotinette;
        $this->idStatus = $idStatus;
        $this->labelImage = $labelImage;
        $this->urlImage = $urlImage;
        $this->descriptionImage = $descriptionImage;
    }

    public function getId(){return $this->id;}
    public function getLabel(){return $this->label;}
    public function getSerialNumber(){return $this->serialNumber;}
    public function getDateService(){return $this->dateService;}
    public function getColor(){return $this->color;}
    public function getSpeed(){return $this->speed;}
    public function getBatteryLife(){return $this->batteryLife;}
    public function getPrice(){return $this->price;}
    public function getDescriptionTrotinette(){return $this->descriptionTrotinette;}
    public function getIdStatus(){return $this->idStatus;}
    public function getLabelImage(){return $this->labelImage;}
    public function getUrlImage(){return $this->urlImage;}
    public function getDescriptionImage(){return $this->descriptionImage;}

    public function setId($id){$this->id = $id;}
    public function setName($label){$this->label = $label;}
    public function setSerialNumber($serialNumber){$this->serialNumber = $serialNumber;}
    public function setDateService($dateService){$this->dateService = $dateService;}
    public function setColor($color){$this->color = $color;}
    public function setSpeed($speed){$this->speed = $speed;}
    public function setBatteryLife($batteryLife){$this->batteryLife = $batteryLife;}
    public function setPrice($price){$this->price = $price;}
    public function setDescriptionTrotinette($descriptionTrotinette){$this->descriptionTrotinette = $descriptionTrotinette;}
    public function setIdStatus($idStatus){$this->idStatus = $idStatus;}
    public function setLabelImage($labelImage){$this->labelImage = $labelImage;}
    public function setUrlImage($urlImage){$this->urlImage[] = $urlImage;}
    public function setDescriptionImage($descriptionImage){$this->descriptionImage = $descriptionImage;}

}