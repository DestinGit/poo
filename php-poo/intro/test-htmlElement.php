<?php
require "autoloader.php";

$titre = new HtmlElement("h1", [], "Bonjour");

echo $titre;

$form = new HtmlElement("form");
$form->addChild(new InputElement("text", "firstName", "Albert"))
    ->addChild(new InputElement("text", "lastName", "Tondu"))
    ->addChild(new HtmlElement("button", ["type" =>"submit"], "Valider"));
echo $form;

$teufTeuf = new Voiture("pigeot", "104",4, 400, 5, new Moteur(7000));

$glob = new GlobIterator(__DIR__."/classes/*.php");

$fileNumber = $glob->count();
$fileIndex = 0;

while ($fileIndex < $fileNumber){
    echo $glob->current()->getFileName();
    $glob->next();
    $fileIndex++;
}