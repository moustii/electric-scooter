<?php

abstract class ConnexionDb {
    private static $connexionDb;

    private static function setConnexionDb() {
        try {
            self::$connexionDb = new PDO("mysql:host=localhost;dbname=scooter;charset=utf8","root","");
            self::$connexionDb->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
        } catch(Exception $e) {
            echo "Erreur : ".$e->getMessage();
            die();
        }
    }

    protected function getConnexionDb() {
        if (self::$connexionDb === null) {
            self::setConnexionDb();
        }
        return self::$connexionDb;
    }
}