<?php
require "autoloader.php";

$pdo = new PDO(
    "mysql:host=localhost;dbname=bibliotheque;charset=utf8",
    "root",
    "",
    [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
);

try {

    /*
    //DTO auteur
    $auteur = new Auteur("Auster", "Paul");
    //Instanciation du DAO
    $dao = new AuteurDAO($pdo);

    //Persistence de l'auteur
    $dao->save($auteur);

    var_dump($auteur);
    */
    $dao = new AuteurDAO($pdo);

    var_dump($dao->findOneById(20)->getOneAsArray());

    $data = $dao->findAll(["nom"=>"desc"],5,4)->getAllAsObjects();

    foreach ($data as $auteur){
        echo $auteur->getNom(). "<br>";
    }


}catch (PDOException $ex){
    echo $ex->getMessage();
}