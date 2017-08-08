<?php
require 'autoloader.php';

$pdo = new PDO(
        "mysql:host=localhost;dbname=bibliotheque;charset=utf8",
        "root",
        "",
        [PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]
    );

try {
    // DTO auteur
//    $auteur = new Auteur('Auster', 'Paul');
//    // Instanciation du DAO
//    $dao = new AuteurDAO($pdo);
//
//    // Persistance de l'auteur
//    $dao->save($auteur);
//    echo '<pre>';
//    var_dump($auteur);
//    echo '</pre>';

        // Instanciation du DAO
        $dao = new AuteurDAO($pdo);
    $ret = $dao->findOneById(20);

    echo '<pre>';
        var_dump($ret->getOneAsObject());
    echo '</pre>';
}catch (PDOException $ex) {
    echo $ex->getMessage();
}