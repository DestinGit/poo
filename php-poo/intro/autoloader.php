<?php

/**
 * Chargement d'une classe
 * @param string $className
 * @throws Exception
 */
function autoload(string $className){
    $classPath = "classes/{$className}.php";
    if(file_exists($classPath)){
        require_once $classPath;
    } else {
        throw new Exception("La classe $classPath n'existe pas");
    }
}

spl_autoload_register("autoload");