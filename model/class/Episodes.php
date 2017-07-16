<?php
class Episodes {
    private $_episode;
    
    public function __construct($bdd, $afficher = FALSE, $id){
        if ($afficher == TRUE){
            $this->afficher($bdd, $id);
        }else{
            $this->episode($bdd, $id);
        }
    }
    
    //methde permettant de mettre un épisode en variable
    public function episode ($bdd, $id){
        $dbh = new PDO($bdd[0],$bdd[1],$bdd[2]);
        foreach($dbh->query('SELECT * FROM episode WHERE id='.$id) as $row){
            $this->_episode = array($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
        }
        $dbh = NULL;
    }
    
    //méthode permettant d'afficher un épisode
    public function afficher($bdd, $id){
        $this->episode($bdd, $id);
        echo "\t\t<div class=\"row\">" .
        "\t\t\t<div class=\"col-xs-12\">" .
        "\t\t\t\t<h1>" . $this->_episode[2] . "</h1><small>Posté le : " . $this->_episode[5] . "</small> <a href=\"link.php?page=pdf&id=$id\" target=\"_BLANK\">Version PDF</a><p></p>" .
        "\t\t\t</div>" .
        "\t\t\t<div class=\"col-xs-12\">" .
        "\t\t\t\t" . html_entity_decode($this->_episode[3]) .
        "\t\t\t</div>" .
        "\t\t</div>";
    }
    //méthode de recherche du numéro d'épisode le plus grand
    static function dernierEpisode($bdd){
        $dbh = new PDO($bdd[0],$bdd[1],$bdd[2]);
        $dernierEpisode = 0;
        foreach($dbh->query('SELECT * FROM episode') as $row){
          $dernierEpisode = ($row[1] > $dernierEpisode) ? $row[1] : $dernierEpisode;
        }
        $dbh = NULL;
        return $dernierEpisode;
    }
    //méthode vérifiant qu'un numero d'épisode est présent ou non dans la base
    static function rechercheConflit($bdd, $numero){
        $dbh = new PDO($bdd[0],$bdd[1],$bdd[2]);
        $conflit = FALSE;
        foreach($dbh->query('SELECT * FROM episode') as $row){
          if ($numero == $row[1])
          {
              $conflit = TRUE;
              break;
          }
        }
        $dbh = NULL;
        return $conflit;
    }
    static function verificationAjoutEpisode($bdd, $titre, $numero, $texte)
    {
        if (($titre == "") || ($numero == "") || ($texte == "")){
            echo "<strong class=\"text-danger\">Tous les champs doivent être remplis.</strong>";
            return FALSE;
        }elseif (!ctype_digit($numero)){
            echo "<strong class=\"text-danger\">le champ <em>Numéro d'épisode</em> doit être un nombre entier.</strong>";
            return FALSE;
        }elseif (Self::rechercheConflit($bdd, $numero))
        {
            echo "<strong class=\"text-danger\">le numéro d'épisode entré est déjà existant</strong>";
            return FALSE;
        }else{
            return TRUE;
        }
   
    }
    
     static function titreEpisode($bdd,$numero){
         $titre = "";
         $dbh = new PDO($bdd[0],$bdd[1],$bdd[2]);
         foreach($dbh->query('SELECT * FROM episode WHERE id='.$numero) as $row){
         $titre = $row[2];
        }
        return $titre;
    }
    
    //méthode ajoutant un nouvel épisode dans la BDD
    static function ajoutEpisode($bdd, $titre, $numero, $texte,$publier){
        $dbh = new PDO($bdd[0],$bdd[1],$bdd[2]);
        $time = date('Y-m-d H:i:s', mktime());
        $dbh->exec("INSERT INTO episode (numero, titre, texte, affichage, date) VALUES ($numero, \"$titre\", \"".htmlentities($texte)."\", $publier, \"$time\")") or die(print_r($dbh->errorInfo(), true));
        $dbh = NULL;
        return TRUE;
    }
    
    //méthode permettant de lister dans un select les différents épisodes
    static function listerEpisode($bdd){
        $dbh = new PDO($bdd[0],$bdd[1],$bdd[2]);
        $liste =  "<p><select id=\"listeEpisode\" name=\"listeEpisode\"  class=\"form-control\" style=\"width:50%;\">";
        foreach($dbh->query('SELECT * FROM episode ORDER BY numero') as $row){
            $liste .= "<option value=\"$row[0]\">$row[1] : $row[2]</option>";
        }
        $liste .= "</select></p>"
                . "<p><button class=\"btn btn-primary\" onClick=\"chargerModifEpisode('page=modifierEpisodeForm&id='+$('#listeEpisode').val(),'#formEpisode');\">Modifier cet épisode</button></p>";
        return $liste;
    }
    
    public function getEpisode($colonne){
        echo $this->_episode[$colonne];
    }
}

