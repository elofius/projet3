<?php
if (isset($_GET['supprimer']))
{
    Episodes::supprimerEpisode($bdd, $_GET['id']);
}else{
    ?>
    <div class="col-xs-12">
        <h3>Supprimer un épisode</h3>
    </div>
    <div class="col-xs-12">
        <p>Merci de selectionner dans la liste ci-dessous l'épisode à modifier</p>
        <?=Episodes::listerEpisode($bdd, 1);?>
    </div>
    <div id="reponseXHR"></div>
    <?php
}



