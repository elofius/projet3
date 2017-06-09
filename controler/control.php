<?php
//vérification et renvoi vers SSL le cas échéant
if (empty($_SERVER['HTTPS'])) {
    header('Location: https://www.matthieu-deparis.fr/p3');
    exit; 
}
require('model/fonctions.php');

if (!isset($_SESSION['admin'])){
    if (filter_input(INPUT_GET,'chapitre',FILTER_SANITIZE_STRING)== NULL)
    {
    $contenu = affichageIntro($bdd);
    $menuFront = menuFront($bdd);
    }
    require('view/front.php');
}else
{
    require('view/back.php');
}
