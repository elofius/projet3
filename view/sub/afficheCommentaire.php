<?php
//rechargement des commentaires
$commentaire = new Commentaires($bdd, $_GET['id']);
$commentaire->afficher();
