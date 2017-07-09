<?php
if(ISSET($_SESSION['admin'])){
    $_SESSION['admin'] = ($_SESSION['admin'] == "front") ? "back" : "front";
}else
{
    echo "<p>Vous n'êtes pas autorisé à voir cette page</p>"; 
}
?>
<p>Si vous n'êtes pas redirigé, merci de <a href="/p3">cliquer ici</a></p> 
<script>
setTimeout(function(){window.location = "/p3";}, 1000);
</script>