<?php

spl_autoload_register(function($class_name){
    if (stristr($class_name, 'Front')) {
        require "controllers/front/$class_name.php";
    } else if (stristr($class_name, 'Back')) {
        require "controllers/back/$class_name.php";
    } else if (stristr($class_name, 'Tools')) {
        require "config/$class_name.php";
    } else {
        require "models/$class_name.php";
    }
});