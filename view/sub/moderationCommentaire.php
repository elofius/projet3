<h1>Modération des commentaires</h1>
<p>Vous trouverez ci-dessous la liste des commentaires signalés par les visiteurs.</p>
<?php
$commentaires = new Commentaires($bdd, "", 1);
?>

<div id="reponseXHR"></div>
<!--Modal pour les commentaires-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Modération de commentaire</h4>
      </div>
      <div class="modal-body" id="commentaireAjout">
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Annuler</button>
        <button type="button" class="btn btn-primary" onClick="$('#commentaireFormulaire').submit();return false;">Modérer le commentaire</button>
      </div>
    </div>
  </div>
</div>