<?php
require 'classes/htmlElement.php';
require 'classes/inputElement.php';

$titre = new HtmlElement('h1', ['style'=>'color:red;font-size:5.6rem'], 'Bonjour');

//var_dump($titre);

echo $titre;

//$champNom = new InputElement('text', 'name1', 'Albert');

$form = new HtmlElement('form');
$form->addChild(new InputElement('text', 'firstName', 'Albert'))
    ->addChild(new InputElement('text', 'lastName', 'Albert'))
    ->addChild(new InputElement('text', 'name1', 'Tordu'))
    ->addChild(new HtmlElement('button', ['type'=>'submit'], 'Valider'));

echo $form;