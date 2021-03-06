<!-- Ajout de TinyMCE -->
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

<div class="col-xs-12">
    <h1>Modifier un épisode</h1>
</div>


<div class="col-xs-12">
    <p>Merci de selectionner dans la liste ci-dessous l'épisode à modifier</p>
    <!--affichage de la liste des épisodes-->
    <?=Episodes::listerEpisode($bdd);?>
    <form id="formEpisode" action="link.php?page=ajoutEpisode" method="POST" >
        <p><input type="text" name="titreEpisode" id="titreEpisode" placeholder="Titre de l'épisode" style="width:100%"/></p>
        <p><input type="text" name="numeroEpisode" id="numeroEpisode" placeholder="Veuillez entrer le numéro de l'épisode (dernier épisode : <?=Episodes::dernierEpisode($bdd)?>)" style="width:100%"/></p>
        <p><label><input type="radio" name="affichage" value="1" checked="checked"/> Publier</label> - <label><input type="radio" name="affichage" value="0"/> Brouillon</label></p>

        <p><textarea id="texteEpisode" name="texteEpisode"></textarea></p>

        <p><input type="submit" class="btn btn-primary" value="Modifier cet épisode"></p>
    </form>
</div>
<div class="col-xs-12" id="reponseXHR">
</div>
<script>
    $('#formEpisode').hide();
    envoiFormulaire();
</script>
    
<?php

