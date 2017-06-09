<?php
session_start();
if (filter_input(INPUT_GET,'page',FILTER_SANITIZE_STRING) == NULL){
    echo "<h1>Erreur 404!</h1>";
    echo "La page demandée n'existe pas !";
}else{
    if (file_exists('view/sub/'.filter_input(INPUT_GET,'page',FILTER_SANITIZE_STRING).'.php')){
        require('view/sub/'.filter_input(INPUT_GET,'page',FILTER_SANITIZE_STRING).'.php');
    }else
    {
      echo "<h1>Erreur 404!</h1>";
      echo "La page demandée n'existe pas !";
    }
    
}

