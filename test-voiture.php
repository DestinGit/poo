<?php
require  'classes/Voiture.php';

try {
    $maVoiture = new Voiture('Peugeot', '307', 4, 1200, 5, new Moteur(4e4));

    echo $maVoiture->getPoids();

    echo '<br>';

    echo $maVoiture->getVitesseMax();

    $maVoiture->setMoteur(new Moteur(8e3));

    echo '<br>';
    $maVoiture->ajouterPassager(new Personne('Akira', 180));
    $maVoiture->ajouterPassager(new Personne('Suheiro', 220));
    $maVoiture->ajouterPassager(new Personne('Wakuro', 145));
    $maVoiture->ajouterPassager(new Personne('Toshiba', 175));
    $maVoiture->ajouterPassager(new Personne('Tokyo', 145));
//    $maVoiture->ajouterPassager(new Personne('Mokonzi', 145));

//    echo '<br>';

    echo $maVoiture;

} catch (Exception $ex) {
    echo $ex->getMessage();
}