<div id="page-content-wrapper">
    <div class="container-fluid">
        <?php
        //appel des classes commentaires et episode
        $commentaire = new Commentaires($bdd, $_GET['c']);
        $episode = new Episodes($bdd, TRUE, $_GET['c']);
        ?>
        <hr />
       
        <div class="row">
            <div class="col-xs-12">
                <h1>Commentaires (<?=$commentaire->getNombre()?>)</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12">
                <p><button class="btn btn-primary btn-sm buttonCommentaire" onClick="<?=$commentaire->lienJSCommentaire($_GET['c'])?>">Nouveau commentaire</button></p>
            </div>
        </div>
        <!-- Divpermettant de recharger les commentaire après un ajout -->
        <div id="loadCommentaires">
        <?php
        //affichage des commentaires
        $commentaire->afficher();
        ?>
        </div>    
    </div>
</div>

<!--Modal pour les commentaires-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Ajout de commentaire</h4>
      </div>
      <div class="modal-body" id="commentaireAjout">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" onClick="$('#commentaireFormulaire').submit();">Enregistrer le commentaire</button>
      </div>
    </div>
  </div>
</div>
