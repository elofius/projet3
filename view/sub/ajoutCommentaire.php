<p>
<?php
if (Commentaires::verifCommentaire($_POST['pseudo'], $_POST['commentaire'], $_POST['titre'])){
    
   if (isset($_POST['id'])){
        if (Commentaires::ajoutCommentaire($bdd, $_POST['pseudo'], $_POST['titre'], $_POST['commentaire'], $_POST['rang'], $_POST['parent'], $_POST['episode'], $_POST['id'], $_POST['date'])){
            echo "<strong class=\"text-success\">Le commentaire a été correctement modéré.</strong>";
            echo "<script>"
                ."\tsetTimeout(function(){"
                ."$('#myModal').modal('toggle')"    
                ."}, 2000);"
                ."\tsetTimeout(\"charger('page=moderationCommentaire','#centre')\", 2500);"
            . "</script>";
        }else
        {
            echo"<strong class=\"text-danger\">Il y a eu une erreur lors de l'enregistrement...</strong>";
        }
   }else{
        if (Commentaires::ajoutCommentaire($bdd, $_POST['pseudo'], $_POST['titre'], $_POST['commentaire'], $_POST['rang'], $_POST['parent'], $_POST['episode'])){
            echo "<strong class=\"text-success\">Le commentaire a été correctement ajouté.</strong>";
            echo "<script>"
            ."\tcharger('page=afficheCommentaire&id=$_POST[episode]','#loadCommentaires');"
                ."\tsetTimeout(function(){"
                ."$('#myModal').modal('toggle')"    
                ."}, 2000);"
            . "</script>";
        }else
        {
            echo"<strong class=\"text-danger\">Il y a eu une erreur lors de l'enregistrement...</strong>";
        }
   }
}
?>
</p>