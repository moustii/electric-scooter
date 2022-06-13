<?php

class Tools {

    public static function addImage($file, $dir) {
        if (!isset($file['name']) && empty($file['name'])) {
            throw new Exception('Vous devez renseigner une image');
        }
        if (!file_exists($dir)) {
            mkdir($dir,0777);
        }
        $extension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));
        $target_file = $dir.$file['name'];
        $random = rand(0, 9999);

        if (!getimagesize($file['tmp_name'])) {
            throw new Exception("Le fichier n'est pas une image");
        }
        if ($extension !== 'jpg' && $extension !== 'jpeg' && $extension !== 'png') {
            throw new Exception("L'extension n'est pas accepté");
        }
        if ($file['size'] > 500000) {
            throw new Exception('Le fichier est trop volumineux');
        }
        if (file_exists($target_file)) {
            $target_file = $dir.$random.'-'.$file['name'];
        }
        if (!move_uploaded_file($file['tmp_name'], $target_file)) {
            throw new Exception("Echec telechargement de l'image");
        } else {
            return $file['name'];
        }
    }

}