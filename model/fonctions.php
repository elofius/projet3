<?php
//amorçage de la BDD dans un fichier séparé
require('model/bdd.php');

//récupération de l'intro dans la BDD
function affichageIntro($bdd){
    $dbh = new PDO($bdd[0],$bdd[1],$bdd[2]);
    foreach($dbh->query('SELECT * from intro') as $row) {
        $contenu = utf8_encode($row[1]);
        return $contenu;
    }
}

//vérification login/pass
function connexion($dbh)
{
    if ((filter_input(INPUT_GET,'login',FILTER_SANITIZE_STRING)== NULL) || (filter_input(INPUT_GET,'password',FILTER_SANITIZE_STRING)== NULL)){
        return false;
    }else
    {
        $login = filter_input(INPUT_GET,'login',FILTER_SANITIZE_STRING);
        $pass = filter_input(INPUT_GET,'password',FILTER_SANITIZE_STRING);
        $utilisateur = $dbh->query('SELECT * FROM admin WHERE login="'.$login.'"');
        print_r($utilisateur);
    }
}

$dbh = NULL;
