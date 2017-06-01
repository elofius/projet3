<?php
//amorçage de la BDD dans un fichier séparé
require('model/bdd.php');

//récupération de l'intro dans la BDD
function affichageIntro($bdd){
    $dbh = new PDO($bdd[0],$bdd[1],$bdd[2]);
    foreach($dbh->query('SELECT * from intro') as $row) {
        $contenu = utf8_encode($row[1]);
        $dbh = NULL;
        return $contenu;
    }
}

//vérification login/pass
function connexion($bdd)
{
    if ((filter_input(INPUT_GET,'login',FILTER_SANITIZE_STRING)== NULL) || (filter_input(INPUT_GET,'password',FILTER_SANITIZE_STRING)== NULL)){
        return false;
    }else
    {
        $dbh = new PDO($bdd[0],$bdd[1],$bdd[2]);
        $login = filter_input(INPUT_GET,'login',FILTER_SANITIZE_STRING);
        $pass = filter_input(INPUT_GET,'password',FILTER_SANITIZE_STRING);
        $utilisateur = $dbh->query('SELECT * FROM admin WHERE login="'.$login.'"');
        foreach ($utilisateur as $key => $value){
            if (($value['login']) == $login && ($value['pass'] == md5($pass))){
                return true;
            }else{
                return false;
            }
        }
        $dbh = NULL;
        
    }
}
