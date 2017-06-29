<?php
echo "<p>";
if (($_POST['titreEpisode'] == "") || ($_POST['numeroEpisode'] == "") || ($_POST['texteEpisode'] == "")){
    echo "<strong class=\"text-danger\">Tous les champs doivent être remplis.</strong>";;
}elseif (!ctype_digit($_POST['numeroEpisode'])){
    echo "<strong class=\"text-danger\">le champ <em>Numéro d'épisode</em> doit être un nombre entier.</strong>";
}elseif (Episodes::rechercheConflit($bdd, $_POST['numeroEpisode']))
{
    echo "<strong class=\"text-danger\">le numéro d'épisode entré est déjà existant</strong>";
}else{
    echo "<strong class=\"text-success\">ok</strong>";
}
echo "</p>";

