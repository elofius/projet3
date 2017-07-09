<?php
//Définition des variables
$rang = ISSET($_GET['rang']) ? $_GET['rang'] : 1;
$parent = ISSET($_GET['parent']) ? $_GET['parent'] : 0;
?>
<p>Vous souaitez ajouter un commentaire à l'épisode <strong><em><?=Episodes::titreEpisode($bdd, $_GET['episode'])?></em></strong>.</p>
<form action="link.php?page=ajoutCommentaire" method="POST" id="commentaireFormulaire">
    <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Votre pseudo">
    </div>
    <div class="form-group">
        <label for="pseudo">Sujet</label>
        <input type="text" class="form-control" id="pseudo" name="titre" placeholder="Le sujet de votre commentaire">
    </div>
    <div class="form-group">
        <label for="pseudo">Commentaire</label>
        <textarea class="form-control" rows="5" id="commentaire" name="commentaire" placeholder="Votre commentaire..."></textarea>
    </div>
    <input type="hidden" name="rang" value="<?=$rang?>" />
    <input type="hidden" name="parent" value="<?=$parent?>" />
    <input type="hidden" name="episode" value="<?=$_GET['episode']?>" />
</form>
<div id="commentaireXHR"></div>
<script>
    envoiFormulaire('#commentaireFormulaire', '#commentaireXHR');
</script>
