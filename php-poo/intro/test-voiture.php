<?php
require "classes/Voiture.php";

try {
    $maVoiture = new Voiture("Peugeot", "307", 4, 1200, 5, new Moteur(4e5));

    echo $maVoiture->getPoids()."<br>";

    echo $maVoiture->getVitesseMax()."<br>";

    $maVoiture->setMoteur(new Moteur(8e3));

    $maVoiture->ajouterPassager(new Personne("Akira", 180))
    ->ajouterPassager(new Personne("suheiko", 220))
    ->ajouterPassager(new Personne("Wakuko", 45))
    //->ajouterPassager(new Personne("Noriko", 60))
    ->ajouterPassager(new Personne("Toshiro", 150))
    ->ajouterPassager(new Personne("Totoro", 450));

    echo $maVoiture;


} catch (Exception $ex){
    echo $ex->getMessage();
}
