<?php

class Tools {

    public static function addImage($files, $dir) {

        $filesName = $files['name'];
        $filesType = $files['type'];
        $filesTmpName = $files['tmp_name'];
        $filesType = $files['error'];
        $filesSize = $files['size'];

        if (!isset($files['name']) && empty($files['name'])) {
            throw new Exception('Vous devez renseigner une image');
        }

        if (!file_exists($dir)) {
            mkdir($dir,0777);
        }

        for($i = 0; $i < count($filesName); $i++) {
                $extensions[] = strtolower(pathinfo($filesName[$i], PATHINFO_EXTENSION));
                $target_files[] = $dir.$filesName[$i];
                $randoms[] = rand(0, 9999);

                if (!getimagesize($filesTmpName[$i])) {
                    throw new Exception("Le fichier n'est pas une image");
                }

                if ($extensions[$i] !== 'jpg' && $extensions[$i] !== 'jpeg' && $extensions[$i] !== 'png') {
                    throw new Exception("L'extension n'est pas accepté");
                }

                if ($filesSize[$i] > 500000) {
                    throw new Exception('Le fichier est trop volumineux');
                }

                if (file_exists($target_files[$i])) {
                    $target_files[$i] = $dir.$randoms[$i].'-'.$filesName[$i];
                    $filesName[$i] = $randoms[$i].'-'.$filesName[$i];
                }

                if (!move_uploaded_file($filesTmpName[$i], $target_files[$i])) {
                    throw new Exception("Echec telechargement de l'image");
                } else {
                        $imagesName[] = $filesName[$i]; 
                }
        }
        return $imagesName;
    }

}