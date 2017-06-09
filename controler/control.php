<?php
require('model/fonctions.php');

if (!isset($_SESSION['admin'])){
    if (filter_input(INPUT_GET,'chapitre',FILTER_SANITIZE_STRING)== NULL)
    {
    $contenu = affichageIntro($bdd);
    }
    require('view/front.php');
}else
{
    require('view/back.php');
}
