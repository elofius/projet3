<?php
$commentaireAModerer = new Commentaires($bdd,'',0, $_GET['id']);
$aModerer = $commentaireAModerer->getCommentaire();

?>
<form action="link.php?page=ajoutCommentaire" method="POST" id="commentaireFormulaire">
    <div class="form-group">
        <label for="pseudo">Pseudo</label>
        <input type="text" class="form-control" id="pseudo" name="pseudo" placeholder="Votre pseudo" value="<?=$aModerer[7];?>">
    </div>
    <div class="form-group">
        <label for="pseudo">Sujet</label>
        <input type="text" class="form-control" id="pseudo" name="titre" placeholder="Le sujet de votre commentaire" value="<?=$aModerer[4];?>">
    </div>
    <div class="form-group">
        <label for="pseudo">Commentaire</label>
        <textarea class="form-control" rows="5" id="commentaire" name="commentaire" placeholder="Votre commentaire..."><?=$aModerer[5];?></textarea>
    </div>
    <input type="hidden" name="rang" value="<?=$aModerer[2]?>" />
    <input type="hidden" name="parent" value="<?=$aModerer[1]?>" />
    <input type="hidden" name="episode" value="<?=$aModerer[3]?>" />
    <input type="hidden" name="id" value="<?=$_GET['id']?>" />
    <input type="hidden" name="date" value="<?=$aModerer[6]?>" />
</form>
<div id="commentaireXHR"></div>
<script>
    envoiFormulaire('#commentaireFormulaire', '#commentaireXHR');
</script>

