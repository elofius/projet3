<?php
//récupération de l'intro dans la BDD
function affichageIntro(){
    require('model/bdd.php');
    foreach($dbh->query('SELECT * from intro') as $row) {
        $contenu = utf8_encode($row[1]);
        return $contenu;
    }
}

