<p>
<?php
if (Commentaires::verifCommentaire($_POST['pseudo'], $_POST['commentaire'], $_POST['titre'])){
   if (Commentaires::ajoutCommentaire($bdd, $_POST['pseudo'], $_POST['titre'], $_POST['commentaire'], $_POST['rang'], $_POST['parent'], $_POST['episode'])){
        echo "<strong class=\"text-success\">L'épisode a été correctement ajouté dans la base.</strong>";
    }else
    {
        echo"<strong class=\"text-danger\">Il y a eu une erreur lors de l'enregistrement...</strong>";
    } 
}
?>
</p>