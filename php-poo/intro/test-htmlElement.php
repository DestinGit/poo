<?php
require "classes/HtmlElement.php";
require "classes/InputElement.php";

$titre = new HtmlElement("h1", [], "Bonjour");

echo $titre;

$form = new HtmlElement("form");
$form->addChild(new InputElement("text", "firstName", "Albert"))
    ->addChild(new InputElement("text", "lastName", "Tondu"))
    ->addChild(new HtmlElement("button", ["type" =>"submit"], "Valider"));
echo $form;