<?php
class Commentaires
{
    private $_rang1 = [];
    private $_rang2 = [];
    private $_rang3 = [];
    private $_moderation = [];
    private $_nombre = 0;    
    private $_nombreModeres = 0;
    private $_commentaire = "";
    private $_arbre = [];
    
    public function __construct($bdd, $episode= "",$moderation = 0,$id=""){
        if ($moderation == 0){
            if ($id != ""){
               $this->commentaire($bdd, $id); 
            }else{
               $this->recuperer($bdd, $episode); 
            }
            
        }else
        {
            $this->aModerer($bdd); 
        }
        
    }
    //stock un commentaire précis
    public function commentaire($bdd, $id){
        $dbh = new PDO($bdd[0],$bdd[1],$bdd[2]);
        $query = "SELECT * FROM commentaires WHERE id = $id";
        foreach($dbh->query($query) as $row){
            $this->_commentaire = array($row[0],$row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]);
        }
    }
    //Getter pour le commentaire récupéré dans la méthode ci-dessus
    public function getCommentaire(){
        return $this->_commentaire;
    }
    //récupère les commentaires à modérer puis les affiche
    public function aModerer($bdd){
        $dbh = new PDO($bdd[0],$bdd[1],$bdd[2]);
        $query = "SELECT * FROM commentaires WHERE signale = 1 ORDER BY id DESC";
        foreach($dbh->query($query) as $row){
            $this->_moderation[$row[0]]= array($row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]);
            echo "<div class=\"panel panel-default\">
                    <div class=\"panel-heading\">
                        <h3 class=\"panel-title\">$row[4] par $row[7] - $row[6] - <button class=\"btn btn-info btn-xs buttonCommentaire\" onClick=\"commentaireModal('&id=$row[0]','moderationCommentaireModal');\">Modifier</button> <button class=\"btn btn-danger btn-xs\" onClick=\"charger('page=supprimerCommentaire&id=$row[0]','#boutonSupprimer_$row[0]');\" id=\"boutonSupprimer_$row[0]\">Supprimer</button></h3>
                    </div>
                    <div class=\"panel-body\">
                        $row[5]
                    </div>
                </div>";
        }
        
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
                    $this->_rang1[$row[0]]= array($row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]);
                    $this->_nombre++;
                    break;
                case 2 :
                    $this->_rang2[$row[0]]= array($row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]);
                    $this->_nombre++;
                    break;
                case 3 :
                    $this->_rang3[$row[0]]= array($row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]);
                    $this->_nombre++;
                    break;
            }
        }
        $dbh = NULL;
    }
    
    //affichage des commentaires en dessous d'un épisode.
    public function afficher(){
        foreach ($this->_rang1 as $keyRang1 => $rang1){
            //ligne à dégriser si l'on souhaite bloquer le signalement d'un commentaire après l'avoir signalé
            //$signalement = ($rang1[7] == 0) ? "<button class=\"btn btn-warning btn-xs\" onClick=\"charger('page=signalement&id=$keyRang1', '#signalement$keyRang1');\" id=\"signalement$keyRang1\">Signaler</button>" : "<button class=\"btn btn-warning btn-xs\" disabled=\"disabled\">Commentaire signalé</button>";
            $signalement = "<button class=\"btn btn-warning btn-xs\" onClick=\"charger('page=signalement&id=$keyRang1', '#signalement$keyRang1');\" id=\"signalement$keyRang1\">Signaler</button>";
            echo "<div class=\"row\">";
            echo "\t<div class=\"col-xs-12 rang1\">";
            echo "<div class=\"panel panel-default\">
                    <div class=\"panel-heading\">
                        <h3 class=\"panel-title\">$rang1[3] par $rang1[6] - $rang1[5] - <button class=\"btn btn-info btn-xs buttonCommentaire\" onClick=\"".$this->lienJSCommentaire($rang1[2], 2, $keyRang1)."\">Répondre</button> $signalement</h3>
                    </div>
                    <div class=\"panel-body\">
                        $rang1[4]
                    </div>
                </div>";
            foreach($this->_rang2 as $keyRang2 => $rang2){
                if ($rang2[0] == $keyRang1){
                    //ligne à dégriser si l'on souhaite bloquer le signalement d'un commentaire après l'avoir signalé
                    //$signalement2 = ($rang2[7] == 0) ? "<button class=\"btn btn-warning btn-xs\" onClick=\"charger('page=signalement&id=$keyRang2', '#signalement$keyRang2');\" id=\"signalement$keyRang2\">Signaler</button>" : "<button class=\"btn btn-warning btn-xs\" disabled=\"disabled\">Commentaire signalé</button>";
                    $signalement2 = "<button class=\"btn btn-warning btn-xs\" onClick=\"charger('page=signalement&id=$keyRang2', '#signalement$keyRang2');\" id=\"signalement$keyRang2\">Signaler</button>";
                    echo "<div class=\"row\">";
                    echo "\t<div class=\"col-xs-12 rang2\">";
                    echo "<div class=\"panel panel-default\">
                            <div class=\"panel-heading\">
                                <h3 class=\"panel-title\"><span class=\"glyphicon glyphicon-hand-up\"></span> $rang2[3] par $rang2[6] - $rang2[5] - <button class=\"btn btn-info btn-xs buttonCommentaire\" onClick=\"".$this->lienJSCommentaire($rang2[2], 3, $keyRang2)."\">Répondre</button> $signalement2</h3>
                            </div>
                            <div class=\"panel-body\">
                                $rang2[4]
                            </div>
                        </div>";
                    foreach($this->_rang3 as $keyRang3 => $rang3){
                        if ($rang3[0] == $keyRang2){
                            //ligne à dégriser si l'on souhaite bloquer le signalement d'un commentaire après l'avoir signalé
                            //$signalement3 = ($rang3[7] == 0) ? "<button class=\"btn btn-warning btn-xs\" onClick=\"charger('page=signalement&id=$keyRang3', '#signalement$keyRang3');\" id=\"signalement$keyRang3\">Signaler</button>" : "<button class=\"btn btn-warning btn-xs\" disabled=\"disabled\">Commentaire signalé</button>";
                            $signalement3 = "<button class=\"btn btn-warning btn-xs\" onClick=\"charger('page=signalement&id=$keyRang3', '#signalement$keyRang3');\" id=\"signalement$keyRang3\">Signaler</button>";
                            echo "<div class=\"row\">";
                            echo "\t<div class=\"col-xs-12 rang3\">";
                            echo "<div class=\"panel panel-default\">
                                    <div class=\"panel-heading\">
                                        <h3 class=\"panel-title\"><span class=\"glyphicon glyphicon-hand-up\"></span><span class=\"glyphicon glyphicon-hand-up\"></span> $rang3[3] par $rang3[6] - $rang3[5] - $signalement3</h3>
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
        }elseif ((strtolower ($pseudo) == "admin") || (strtolower ($pseudo) == "adminitrateur")){
            echo "<strong class=\"text-danger\">Désolé ce pseudo est reservé</strong>";
        }else
        {
            return TRUE;
        }
    }
    
    //ajoute un commentaire à la BDD
    static function ajoutCommentaire($bdd, $pseudo, $titre, $commentaire, $rang, $parent, $episode, $id=0, $date=0){
        $dbh = new PDO($bdd[0],$bdd[1],$bdd[2]);
        //si id=0 alors nouveau commentaire, sinon on l'update
        if($id==0){
            
            $time = date('Y-m-d H:i:s', mktime());
            $dbh->exec("INSERT INTO commentaires (parent, rang, episode, titre, texte, date, pseudo) VALUES ($parent, $rang, $episode, \"".strip_tags(addslashes($titre))."\",\"".strip_tags(addslashes($commentaire))."\", \"$time\", \"".strip_tags(addslashes($pseudo))."\")") or die(print_r($dbh->errorInfo(), true));
        }else{
            $dbh->exec("UPDATE commentaires SET parent=$parent, rang=$rang, episode=$episode, titre=\"".strip_tags(addslashes($titre))."\", texte=\"".strip_tags(addslashes($commentaire))."\", pseudo=\"".strip_tags(addslashes($pseudo))."\", signale=0, date=\"$date\" WHERE id=$id") or die(print_r($dbh->errorInfo(), true));
        }
        $dbh = NULL;
        return TRUE;
    }
   
    //signale  un commentaire
    static function signalement($bdd, $id){
        $dbh = new PDO($bdd[0],$bdd[1],$bdd[2]);
        $dbh->exec("UPDATE commentaires SET signale=1 WHERE id=$id");
        $dbh = NULL;
        echo "commentaire signalé";
    }
    
    static function commentairesSignales($bdd){
        $dbh = new PDO($bdd[0],$bdd[1],$bdd[2]);
        $qEpisode = ($episode == "") ? '' : ' WHERE episode='.$episode;
        $query = 'SELECT * FROM commentaires' . $qEpisode . ' ORDER BY id DESC';
        $this->_nombre = 0;
        foreach($dbh->query($query) as $row){
            switch ($row[2]){
                case 1 :
                    $this->_rang1[$row[0]]= array($row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]);
                    $this->_nombre++;
                    break;
                case 2 :
                    $this->_rang2[$row[0]]= array($row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]);
                    $this->_nombre++;
                    break;
                case 3 :
                    $this->_rang3[$row[0]]= array($row[1],$row[2],$row[3],$row[4],$row[5],$row[6],$row[7],$row[8]);
                    $this->_nombre++;
                    break;
            }
        }
        $dbh = NULL;
    }
    
    static function supprimerCommentaire($bdd,$id){
        $dbh = new PDO($bdd[0],$bdd[1],$bdd[2]);
        $arbre = self::arbreCommentaire($bdd, $id);
        foreach ($arbre as $key => $value){
            $dbh->exec("DELETE FROM commentaires WHERE id=$value") or die(print_r($dbh->errorInfo(), true));
        }
       // $dbh->exec("DELETE FROM commentaires WHERE id=$id") or die(print_r($dbh->errorInfo(), true));
        $dbh = NULL;
        echo "Commentaire(s) supprimé(s)";
    }
    
    static function arbreCommentaire($bdd, $id){
        $_arbre[] = $id;
        $dbh = new PDO($bdd[0],$bdd[1],$bdd[2]);
        $dbh2 = new PDO($bdd[0],$bdd[1],$bdd[2]);
        $query = "SELECT * FROM commentaires WHERE parent = $id";
         
        foreach($dbh->query($query) as $row){
            $_arbre[] = $row[0];
            $query2 = "SELECT * FROM commentaires WHERE parent = $row[0]";
            foreach($dbh2->query($query2) as $row2){
                $_arbre[] = $row2[0];
            }
        }
    return $_arbre;    
    }
}

