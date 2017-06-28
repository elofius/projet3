<?php
/*
 * Classe pour le front comportant :
 *  - Menu dynamique à ajouter
 *  - Affichage de l'intro
 */
class Front
{
    //création du menu dynamique pour le front
    static function menu($bdd){
        $menu = "";
        $dbh = new PDO($bdd[0],$bdd[1],$bdd[2]);
        foreach($dbh->query('SELECT * FROM episode ORDER BY numero') as $row){
            $menu .= "\r\n\t\t\t\t\t<li>\r\n\t\t\t\t\t\t<a href=\"#\" onClick=\"charger('page=chapitre&c=$row[0]');\">$row[1] : ".utf8_encode($row[2])."</a>\r\n\t\t\t\t\t</li>\r\n";
        }
        $dbh = NULL;
        return $menu;
    }
    
    //affichage de l'intro
    static function intro($bdd){
        $dbh = new PDO($bdd[0],$bdd[1],$bdd[2]);
        foreach($dbh->query('SELECT * from intro WHERE id=1') as $row) {
            $contenu = utf8_encode($row[1]);
            $dbh = NULL;
            return $contenu;
        }
    }
    
}

