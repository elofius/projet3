<?php
//Ajout ou modification d'épisode
//si $_POST['id'] est présent alors on veut modifier, on ne doit donc pas tester le numero d'épisode sous peine de conflit
echo "<p>";
if (isset($_POST['id'])){
    if (Episodes::verificationAjoutEpisode($bdd, $_POST['titreEpisode'], $_POST['numeroEpisode'], $_POST['texteEpisode'], $_POST['id'])) {
        if(Episodes::requeteEpisode($bdd, $_POST['titreEpisode'], $_POST['numeroEpisode'], $_POST['texteEpisode'], $_POST['affichage'], $_POST['id'],1)){
            echo "<strong class=\"text-success\">L'épisode a été correctement modifié.</strong>";
        }else
        {
            echo"<strong class=\"text-danger\">Il y a eu une erreur lors de l'enregistrement...</strong>";
        }
    } 
}else{
    if (Episodes::verificationAjoutEpisode($bdd, $_POST['titreEpisode'], $_POST['numeroEpisode'], $_POST['texteEpisode'])) {
        if(Episodes::requeteEpisode($bdd, $_POST['titreEpisode'], $_POST['numeroEpisode'], $_POST['texteEpisode'], $_POST['affichage'])){
            echo "<strong class=\"text-success\">L'épisode a été correctement ajouté dans la base.</strong>";
        }else
        {
            echo"<strong class=\"text-danger\">Il y a eu une erreur lors de l'enregistrement...</strong>";
        }
    }
}

echo "</p>";

