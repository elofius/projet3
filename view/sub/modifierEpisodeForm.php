<script src="static/tinymce/tinymce.min.js?apiKey=8rx8637nkzdr8tv070ogou0avgla2hzaonbjmynvineun4gj"></script>
<script>
    tinymce.init({ 
        selector:'textarea', 
        language : "fr_FR", 
        branding : false,
        setup: function (editor) {
            editor.on('change', function () {
                tinymce.triggerSave();
            });
        }
    });
</script>
<?php
$episode = new Episodes($bdd, FALSE,$_GET['id']);
?>
<p><input type="text" name="titreEpisode" id="titreEpisode" placeholder="Titre de l'épisode" style="width:100%" value="<?=$episode->getEpisode(2);?>"/></p>

        <p><input type="text" name="numeroEpisode" id="numeroEpisode" value="<?=$episode->getEpisode(1);?>" placeholder="Veuillez entrer le numéro de l'épisode (dernier épisode : <?=Episodes::dernierEpisode($bdd)?>)" style="width:100%"/></p>
        <p><label><input type="radio" name="affichage" value="1" checked="checked"/> Publier</label> - <label><input type="radio" name="affichage" value="0"/> Brouillon</label></p>

        <p><textarea id="texteEpisode" name="texteEpisode"><?=$episode->getEpisode(3);?></textarea></p>

        <p><input type="submit" class="btn btn-primary" value="Sauvegarder"></p>
        

