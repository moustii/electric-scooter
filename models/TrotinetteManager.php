<?php
require_once 'ConnexionDb.php';
require_once 'Trotinette.php';


class TrotinetteManager extends ConnexionDb {
    private $trotinettes;

    private function AddTrotinette($trotinette) {
        $this->trotinettes[] = $trotinette;
    }

    public function getTrotinettes() {
        return $this->trotinettes;
    }

    public function generatorTrotinette() {
        $connexionDb = $this->getConnexionDb();
        $sql = "SELECT  trotinettes.id_trotinette, label_trotinette, serial_number, date_service, color,
                        speed, battery_life, 
                        price, description_trotinette, id_status ,images.id_image, label_image, url_image, description_image
                FROM `possede` 
                INNER JOIN trotinettes ON possede.id_trotinette = trotinettes.id_trotinette
                INNER JOIN images ON possede.id_image = images.id_image";
        $query = $connexionDb->prepare($sql);
        $query->execute();
        $trotinettes = $query->fetchAll(PDO::FETCH_ASSOC);
        $query->closeCursor();
        
        foreach ($trotinettes as $trotinette) {
            $trot = new Trotinette($trotinette['id_trotinette'], $trotinette['label_trotinette'], $trotinette['serial_number'], $trotinette['date_service'], $trotinette['color'], $trotinette['speed'], $trotinette['battery_life'], $trotinette['price'], $trotinette['description_trotinette'], $trotinette['id_status'], $trotinette['label_image'], $trotinette['url_image'], $trotinette['description_image']);
            $this->AddTrotinette($trot); 
        }
    }

    public function getTrotinette() {
        $connexionDb = $this->getConnexionDb();
        $sql = ('SELECT * FROM images');
        $stmt = $connexionDb->prepare($sql);
        $stmt->execute();
        $trotinette = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $trotinette;
    }


}



