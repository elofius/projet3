<?php
class Commentaires
{
    private $_rang1 = [];
    private $_rang2 = [];
    private $_rang3 = [];
            
    public function construct(){
        
    }
    
    public function recuperer($bdd, $episode = ""){
        $dbh = new PDO($bdd[0],$bdd[1],$bdd[2]);
        $qEpisode = ($episode == "") ? '' : ' WHERE episode='.$episode;
        $query = 'SELECT * FROM commentaires' . $qEpisode;
        foreach($dbh->query($query) as $row){
            switch ($row[2]){
                case 1 :
                    $this->_rang1[$row[0]]= array($row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7]);
                    break;
                case 2 :
                    $this->_rang2[$row[0]]= array($row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7]);
                    break;
                case 3 :
                    $this->_rang3[$row[0]]= array($row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7]);
                    break;
            }
        }
        $dbh = NULL;
    }
    
    public function afficher(){
        foreach ($this->_rang1 as $keyRang1 => $rang1){
            echo "<p>$rang1[3]</p>";
            foreach($this->_rang2 as $keyRang2 => $rang2){
                if ($rang2[0] == $keyRang1){
                    echo "<p style=\"margin-left: 5em\">$rang2[3] est une réponse de $rang1[3]</p>";
                    foreach($this->_rang3 as $keyRang3 => $rang3){
                        if ($rang3[0] == $keyRang2){
                            echo "<p style=\"margin-left: 10em\">$rang[3] est une réponse de $rang2[3]</p>";
                        }
                    }
                }
            }
        }
    }
}

