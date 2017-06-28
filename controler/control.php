<?php
//vérification et renvoi vers SSL le cas échéant
if (empty($_SERVER['HTTPS'])) {
    header('Location: https://www.matthieu-deparis.fr/p3');
    exit; 
}
//Autoload dans l'espace Global
require ('model/class/Autoloader.php');
Autoloader::register();

//appel du fichier de fonctions
require('model/fonctions.php');

if (!isset($_SESSION['admin'])){
    if (filter_input(INPUT_GET,'chapitre',FILTER_SANITIZE_STRING)== NULL)
    {
    $contenu = Front::intro($bdd); // Affichage de l'intro
    $menuFront = Front::menu($bdd); //Affichage du menu
    }
    require('view/front.php');
}else
{
    $contenu = Back::intro($bdd);
    require('view/back.php');
}
