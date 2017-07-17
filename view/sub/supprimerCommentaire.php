<?php
Commentaires::supprimerCommentaire($bdd, $_GET['id']);
?>
<script>
    setTimeout("charger('page=moderationCommentaire');",1500);
</script>

