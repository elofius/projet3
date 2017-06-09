
<h1>Connexion à l'interface d'administration</h1>
<?php
require('model/fonctions.php');
if (connexion($bdd) == false){
    echo "Erreur de login/pass";
}else
{
    ?>
<p>Vous êtes à présent connecté.</p>
<?php
    $_SESSION['admin'] = "ok";
    $_SESSION['page'] = "back";
    ?>
<script>
setTimeout(function(){window.location = "/p3";}, 2000);
</script>
<?php
}

