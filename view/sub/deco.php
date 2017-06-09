<h1>Deconnection</h1>
<p>Vous êtes maintenant déconnecté.<br />
    <a href="/p3">Cliquez ici</a> pour revenir à l'accueil.</p>
<?php
session_destroy();
?>
<script>
setTimeout(function(){window.location = "/p3";}, 2000);
</script>
