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
            echo "<div class=\"row\">";
            echo "\t<div class=\"col-xs-12 rang1\">";
            echo "<div class=\"panel panel-default\">
                    <div class=\"panel-heading\">
                        <h3 class=\"panel-title\">$rang1[3] par $rang1[6] - $rang1[5] - <a href=\"\" onClick=\"\" data-toggle=\"tooltip\" title=\"Répondre\"><span class=\"glyphicon glyphicon-share-alt\"></span></a></h3>
                    </div>
                    <div class=\"panel-body\">
                        $rang1[4]
                    </div>
                </div>";
            foreach($this->_rang2 as $keyRang2 => $rang2){
                if ($rang2[0] == $keyRang1){
                    echo "<div class=\"row\">";
                    echo "\t<div class=\"col-xs-12 rang2\">";
                    echo "<div class=\"panel panel-default\">
                            <div class=\"panel-heading\">
                                <h3 class=\"panel-title\"><span class=\"glyphicon glyphicon-hand-up\"></span> $rang2[3] par $rang2[6] - $rang2[5]</h3>
                            </div>
                            <div class=\"panel-body\">
                                $rang2[4]
                            </div>
                        </div>";
                    foreach($this->_rang3 as $keyRang3 => $rang3){
                        if ($rang3[0] == $keyRang2){
                            echo "<div class=\"row\">";
                            echo "\t<div class=\"col-xs-12 rang3\">";
                            echo "<div class=\"panel panel-default\">
                                    <div class=\"panel-heading\">
                                        <h3 class=\"panel-title\"><span class=\"glyphicon glyphicon-hand-up\"></span><span class=\"glyphicon glyphicon-hand-up\"></span> $rang3[3] par $rang3[6] - $rang3[5] -33333</h3>
                                    </div>
                                    <div class=\"panel-body\">
                                        $rang3[4]
                                    </div>
                                </div>";
                            echo "\t</div>";
                            echo"</div>";
                        }
                    }
                    echo "\t</div>";
                    echo"</div>";  
                }
            }
            echo "\t</div>";
            echo"</div>";
        }
    }
}

