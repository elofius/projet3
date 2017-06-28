<!DOCTYPE html>
<html>
<head>
  <script src="static/tinymce/tinymce.min.js?apiKey=8rx8637nkzdr8tv070ogou0avgla2hzaonbjmynvineun4gj"></script>
  <script>tinymce.init({ selector:'textarea', language : "fr_FR", branding : false});</script>
</head>
<body>
  <textarea id="texte"></textarea>
  <button onClick="afficher(); return false;">Click!</button>
  <div id="resultat"></div>
  <?php
  $url = "http://www.google.fr/index.php?page=taRace&chapitre=1";
  var_dump(parse_url($url));
  ?>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  
  <script>
      function afficher(){
          $("#resultat").html("Résultat :"+tinymce.activeEditor.getContent());
      }
  </script>
</body> 
</html>
