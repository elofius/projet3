<?php
class Commentaires
{
    private $_listeCommentaires = [];
            
    public function construct(){
        
    }
    
    public function recuperer($bdd, $episode = ""){
        $dbh = new PDO($bdd[0],$bdd[1],$bdd[2]);
        if ($episode == ""){
           $query = 'SELECT * FROM commentaires'; 
        }else
        {
            $query = 'SELECT * FROM commentaires WHERE episode='.$episode;
        }
        foreach($dbh->query($query) as $row){
            $this-> _listeCommentaires[$row[0]]= array($row[1],$row[2],$row[3],$row[4],$row[5],$row[6]);
        }
        $dbh = NULL;
        return $menu;
    }
    
    public function afficher(){
        foreach ($this->_listeCommentaires as $tab){
            echo "<pre>";
            print_r($tab);
            echo "</pre>";  
        }    
    }
}

