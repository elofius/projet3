<?php

echo "<p>";
if (Episodes::verificationAjoutEpisode($bdd, $_POST['titreEpisode'], $_POST['numeroEpisode'], $_POST['texteEpisode'])) {
    if(Episodes::ajoutEpisode($bdd, $_POST['titreEpisode'], $_POST['numeroEpisode'], $_POST['texteEpisode'], $_POST['affichage'])){
        echo "<strong class=\"text-success\">L'épisode a été correctement ajouté dans la base.</strong>";
    }else
    {
        echo"<strong class=\"text-danger\">Il y a eu une erreur lors de l'enregistrement...</strong>";
    }
}
echo "</p>";

