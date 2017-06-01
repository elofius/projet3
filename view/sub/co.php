<h1>Connexion à l'interface d'administration</h1>
<?php
require('model/fonctions.php');
if (connexion($bdd) == false){
    echo "Erreur de login/pass";
}else
{
    echo "ok!";
}

