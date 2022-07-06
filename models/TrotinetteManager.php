<?php

class TrotinetteManager extends ConnexionDb {
    // private $trotinettes;

    // private function AddTrotinette($trotinette) {
    //     $this->trotinettes[] = $trotinette;
    // }

    // public function getTrotinettes() {
    //     return $this->trotinettes;
    // }

    // public function generatorTrotinette() {
    //     $connexionDb = $this->getConnexionDb();
    //     $sql = "SELECT  trotinettes.id_trotinette, label_trotinette, serial_number, date_service, color,
    //                     speed, battery_life, 
    //                     price, description_trotinette, id_status ,images.id_image, label_image, url_image, description_image
    //             FROM `possede` 
    //             INNER JOIN trotinettes ON possede.id_trotinette = trotinettes.id_trotinette
    //             INNER JOIN images ON possede.id_image = images.id_image";
    //     $query = $connexionDb->prepare($sql);
    //     $query->execute();
    //     $trotinettes = $query->fetchAll(PDO::FETCH_ASSOC);
    //     $query->closeCursor();
        
    //     foreach ($trotinettes as $trotinette) {
    //         $trot = new Trotinette($trotinette['id_trotinette'], $trotinette['label_trotinette'], $trotinette['serial_number'], $trotinette['date_service'], $trotinette['color'], $trotinette['speed'], $trotinette['battery_life'], $trotinette['price'], $trotinette['description_trotinette'], $trotinette['id_status'], $trotinette['label_image'], $trotinette['url_image'], $trotinette['description_image']);
    //         $this->AddTrotinette($trot); 
    //     }
    // }

    // method pour les images de home
    public function getTrotinette() {
        $connexionDb = $this->getConnexionDb();
        $sql = "SELECT *
                FROM `images` 
                WHERE url_image LIKE'varla%'
                LIMIT 3";
        $stmt = $connexionDb->prepare($sql);
        $stmt->execute();
        $trotinette = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $trotinette;
    }

    public function getTrotinetteById($id) {
        $connexionDb = $this->getConnexionDb();
        $sql = 'SELECT `id_trotinette`,`label_trotinette`,`serial_number`,`date_service`,`color`,`speed`,`battery_life`,`price`,`description_trotinette`,`id_status`
                FROM `trotinettes`
                WHERE id_trotinette = :id';
        $stmt = $connexionDb->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $trotinette = $stmt->fetch(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $trotinette;
    }
    
    public function getImageTrotinetteById($id) {
        $connexionDb = $this->getConnexionDb();
        $sql = 'SELECT i.id_image, i.label_image, i.url_image, id_trotinette
                FROM `possede` p 
                INNER JOIN images i ON i.id_image = p.id_image
                WHERE id_trotinette = :id';
        $stmt = $connexionDb->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $images;
    }

    public function addTrotinetteInDatabase($label, $serialNumber, $color, $speed, $battery_life, $price, $status, $description) {
        $connexionDb = $this->getConnexionDb();
        $sql = 'INSERT INTO trotinettes (label_trotinette, serial_number, date_service, color, 
                                            speed, battery_life, price, description_trotinette, id_status)
                VALUES (:label, :serialNumber, DATE(NOW()), :color, :speed, :battery_life, :price, :description, :status)';
        $stmt = $connexionDb->prepare($sql);
        $stmt->bindValue(':label', $label, PDO::PARAM_STR);
        $stmt->bindValue(':serialNumber', $serialNumber, PDO::PARAM_STR);
        $stmt->bindValue(':color', $color, PDO::PARAM_STR);
        $stmt->bindValue(':speed', $speed, PDO::PARAM_INT);
        $stmt->bindValue(':battery_life', $battery_life, PDO::PARAM_INT);
        $stmt->bindValue(':price', $price, PDO::PARAM_INT);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':status', $status, PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();
    }

    public function addImageTrotinetteInDataBase($imageName) {
        $connexionDb = $this->getConnexionDb();
        $sql = 'INSERT INTO images (url_image) VALUES (:imageName)';
        $stmt = $connexionDb->prepare($sql);
        $stmt->bindValue(':imageName', $imageName, PDO::PARAM_STR);
        $result = $stmt->execute();

        if ($result) {
            $idImage = $this->getConnexionDb()->lastInsertId();
            return $idImage;
        }
    }

    public function bindImageToTrotInDataBase($idImage, $idTrot) {
        $connexionDb = $this->getConnexionDb();
        $sql = 'INSERT INTO possede (id_image, id_trotinette) VALUES (:idImage, :idTrot)';
        $stmt = $connexionDb->prepare($sql);
        $stmt->bindValue(':idImage', $idImage, PDO::PARAM_INT);
        $stmt->bindValue(':idTrot', $idTrot, PDO::PARAM_INT);
        $stmt->execute();

    }

    // method de secours
    public function getAllTrotinettes() {
        $connexionDb = $this->getConnexionDb();
        $sql = 'SELECT id_trotinette, label_trotinette, serial_number, date_service, color, speed, battery_life, price, description_trotinette, id_status
                FROM `trotinettes`';
        $stmt = $connexionDb->prepare($sql);
        $stmt->execute();
        $trotinettes = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $trotinettes;
    }

    public function getImages() {
        $connexionDb = $this->getConnexionDb();
        $sql = 'SELECT i.id_image, i.label_image, i.url_image, id_trotinette
                FROM `possede` p 
                INNER JOIN images i ON i.id_image = p.id_image
                GROUP BY id_trotinette';
        $stmt = $connexionDb->prepare($sql);
        $stmt->execute();
        $images = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $stmt->closeCursor();
        return $images;
    }

    public function deleteTrotinetteInDatabase($id) {
        $connexionDb = $this->getConnexionDb();
        $sql = "DELETE FROM trotinettes WHERE id_trotinette = :id";
        $stmt = $connexionDb->prepare($sql);
        $stmt->bindValue(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function deleteImageTrotinetteInDataBase($idTrot) {
        $connexionDb = $this->getConnexionDb();
        $sql = "DELETE images, possede
                FROM `images`
                INNER JOIN possede ON possede.id_image = images.id_image
                WHERE id_trotinette = :idtrot";
        $stmt = $connexionDb->prepare($sql);
        $stmt->bindValue(':idtrot', $idTrot, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function updateTrotinetteInDatabase($idTrot, $label, $serialNumber, $color, $speed, $battery_life, $price, $status, $description) {
        $connexionDb = $this->getConnexionDb();
        $sql = 'UPDATE trotinettes 
                SET label_trotinette = :label,
                    serial_number = :serialNumber,
                    date_service =  DATE(NOW()),
                    color = :color,
                    speed = :speed,
                    battery_life = :battery_life,
                    price = :price,
                    description_trotinette = :description,
                    id_status = :status
                WHERE id_trotinette = :idTrot';
        $stmt = $connexionDb->prepare($sql);
        $stmt->bindValue(':label', $label, PDO::PARAM_STR);
        $stmt->bindValue(':serialNumber', $serialNumber, PDO::PARAM_STR);
        $stmt->bindValue(':color', $color, PDO::PARAM_STR);
        $stmt->bindValue(':speed', $speed, PDO::PARAM_INT);
        $stmt->bindValue(':battery_life', $battery_life, PDO::PARAM_INT);
        $stmt->bindValue(':price', $price, PDO::PARAM_INT);
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
        $stmt->bindValue(':status', $status, PDO::PARAM_INT);
        $stmt->bindValue(':idTrot', $idTrot, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }

    public function updateImageTrotinetteInDataBase($idImage, $urlImage) {
        $connexionDb = $this->getConnexionDb();
        $sql = 'UPDATE images
                -- INNER JOIN possede ON possede.id_image = images.id_image
                SET url_image = :urlImage
                WHERE id_image = :idImage';
        $stmt = $connexionDb->prepare($sql);
        $stmt->bindValue(':urlImage', $urlImage, PDO::PARAM_STR);
        $stmt->bindValue(':idImage', $idImage, PDO::PARAM_INT);
        $stmt->execute();
        $stmt->closeCursor();
    }






   







}



