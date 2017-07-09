<?php
class Commentaires
{
    private $_rang1 = [];
    private $_rang2 = [];
    private $_rang3 = [];
    private $_nombre = 0;        
    public function construct(){
        
    }
    
    //récupère les commentaires
    public function recuperer($bdd, $episode = ""){
        $dbh = new PDO($bdd[0],$bdd[1],$bdd[2]);
        $qEpisode = ($episode == "") ? '' : ' WHERE episode='.$episode;
        $query = 'SELECT * FROM commentaires' . $qEpisode . ' ORDER BY id DESC';
        $this->_nombre = 0;
        foreach($dbh->query($query) as $row){
            switch ($row[2]){
                case 1 :
                    $this->_rang1[$row[0]]= array($row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7]);
                    $this->_nombre++;
                    break;
                case 2 :
                    $this->_rang2[$row[0]]= array($row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7]);
                    $this->_nombre++;
                    break;
                case 3 :
                    $this->_rang3[$row[0]]= array($row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7]);
                    $this->_nombre++;
                    break;
            }
        }
        $dbh = NULL;
    }
    
    //affichage des commentaires en dessous d'un épisode.
    public function afficher(){
        foreach ($this->_rang1 as $keyRang1 => $rang1){
            echo "<div class=\"row\">";
            echo "\t<div class=\"col-xs-12 rang1\">";
            echo "<div class=\"panel panel-default\">
                    <div class=\"panel-heading\">
                        <h3 class=\"panel-title\">$rang1[3] par $rang1[6] - $rang1[5] - <button class=\"btn btn-info btn-xs buttonCommentaire\" onClick=\"".$this->lienJSCommentaire($rang1[2], 2, $keyRang1)."\">Répondre</button></h3>
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
                                <h3 class=\"panel-title\"><span class=\"glyphicon glyphicon-hand-up\"></span> $rang2[3] par $rang2[6] - $rang2[5] - <button class=\"btn btn-info btn-xs buttonCommentaire\" onClick=\"".$this->lienJSCommentaire($rang2[2], 3, $keyRang2)."\">Répondre</button></h3>
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
                                        <h3 class=\"panel-title\"><span class=\"glyphicon glyphicon-hand-up\"></span><span class=\"glyphicon glyphicon-hand-up\"></span> $rang3[3] par $rang3[6] - $rang3[5]</h3>
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
    
    //retourne le nombre de commentaires chargé par $this->recuperer()
    public function getNombre(){
        return $this->_nombre;
    }
    
    //permet d'afficher les liens JS d'ajout ou de réponse d'un commentaire
    public function lienJSCommentaire($episode, $rang=1, $parent=0){
        return "commentaireModal('&episode=$episode&rang=$rang&parent=$parent')";
        
    }
    static function verifCommentaire($pseudo, $commentaire, $titre)
    {
        if (($commentaire == "") || ($pseudo == "") || ($titre == "")){
            echo "<strong class=\"text-danger\">Tous les champs doivent être remplis.</strong>";
            return FALSE;
        }else
        {
            return TRUE;
        }
    }
    static function ajoutCommentaire($bdd, $pseudo, $titre, $commentaire, $rang, $parent, $episode){
        $dbh = new PDO($bdd[0],$bdd[1],$bdd[2]);
        $time = date('Y-m-d H:i:s', mktime());
        $dbh->exec("INSERT INTO commentaires (parent, rang, episode, titre, texte, date, pseudo) VALUES ($parent, $rang, $episode, \"".strip_tags(addslashes($titre))."\",\"".strip_tags(addslashes($commentaire))."\", \"$time\", \"".strip_tags(addslashes($pseudo))."\")") or die(print_r($dbh->errorInfo(), true));
        $dbh = NULL;
        return TRUE;
    }
}

