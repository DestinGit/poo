<?php
//require 'autoloader.php';
//require 'autoloader.php';
require 'vendor/autoload.php';

use POO\DAO\AuteurDAO;
use \POO\ConnexionPDO;

//$pdo = \POO\ConnexionPDO::getInstance(); sans le use \POO\ConnexionPDO
//ou ca avec le use \POO\ConnexionPDO
$pdo = ConnexionPDO::getInstance();

try {
    /*
     *  Persistance d'un element
     */
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

    /*
     *  Lecture d'un element par son id
     */
        // Instanciation du DAO
//        $dao = new AuteurDAO($pdo);
//        $ret = $dao->findOneById(20);
//
//        echo '<pre>';
//            var_dump($ret->getOneAsObject());
//        echo '</pre>';

    /*
     *  Lecture de tous les elements
     */
    $dao = new AuteurDAO($pdo);
    $data = $dao->findAll(['nom'=>'desc'], 3)->getAllAsObject();
    echo '<pre>';
    var_dump($data);
    echo '</pre>';

    foreach ($data as $item) {
        echo $item->getNom().'<br>';
    }

    $dataFind = $dao->find(['nom'=>'hugo'])->getAllAsObject();
    echo '<pre>';
    var_dump($dataFind);
    echo '</pre>';

}catch (PDOException $ex) {
    echo $ex->getMessage();
}