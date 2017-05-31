<?php
require('model/fonctions.php');
if (filter_input(INPUT_GET,'admin',FILTER_SANITIZE_STRING)== NULL){
    if (filter_input(INPUT_GET,'chapitre',FILTER_SANITIZE_STRING)== NULL)
    {
    $contenu = affichageIntro($bdd);
    }
    require('view/front.php');
}else
{
    require('view/back.php');
}
