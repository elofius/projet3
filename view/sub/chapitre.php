<?php
echo "ok boy tu veux voir le chapitre dont l'ID dans la base est $_GET[c]";
$commentaire = new Commentaires();
$commentaire->recuperer($bdd, $_GET[c]);
$episode = new Episodes();
$episode->afficher($bdd, $_GET[c]);


?>
<hr />
<h3>Commentaires</h3>
<?php
$commentaire->afficher();

