<?php
class Episodes {
    private $_episode;
    public function afficher($bdd, $id){
        $dbh = new PDO($bdd[0],$bdd[1],$bdd[2]);
        foreach($dbh->query('SELECT * FROM episode WHERE id='.$id) as $row){
            $this->_episode = array($row[0], $row[1], $row[2], $row[3], $row[4], $row[5]);
        }
        echo "<pre>";
        print_r($this->_episode);
        echo "</pre>";
    }
    
}

