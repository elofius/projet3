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

<div id="page-content-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                    <h1>Ajouter un épisode</h1>
                    <form id="formEpisode" action="link.php?page=ajoutEpisode" method="POST">
                        <p><input type="text" name="titreEpisode" id="titreEpisode" placeholder="Titre de l'épisode" style="width:100%"/></p>

                            <p><input type="text" name="numeroEpisode" id="numeroEpisode" placeholder="Veuillez entrer le numéro de l'épisode (dernier épisode : <?=Episodes::dernierEpisode($bdd)?>)" style="width:100%"/></p>

                        <p><textarea id="texteEpisode" name="texteEpisode"></textarea></p>

                        <p><input type="submit" class="btn btn-primary" value="Ajouter cet épisode"></p>
                    </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12" id="reponseXHR">
            </div>
        </div>
    </div>
</div>
<script>
    envoiFormulaire(); //Appel d'Ajax pour le traitement du formulaire.
</script>