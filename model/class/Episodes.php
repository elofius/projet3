<?php
class Episodes {
    private $_episode;
    //méthode permettant d'afficher un épisode
    public function afficher($bdd, $id){
        $dbh = new PDO($bdd[0],$bdd[1],$bdd[2]);
        foreach($dbh->query('SELECT * FROM episode WHERE id='.$id) as $row){
            $this->_episode = array($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
        }
        $dbh = NULL;
        echo "<pre>";
        print_r($this->_episode);
        echo "</pre>";
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
}

