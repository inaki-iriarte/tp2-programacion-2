<?php
require_once __DIR__ . '/../vendor/autoload.php';

spl_autoload_register(function(string $className) {
    $classPath = __DIR__ . '/../classes/';

    $classFilepath = $classPath . $className . '.php';

    if(file_exists($classFilepath)) {
        require_once $classFilepath;
    }
});