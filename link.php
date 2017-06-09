<?php
session_start();
if (filter_input(INPUT_GET,'page',FILTER_SANITIZE_STRING) == NULL){
    echo "<h1>Erreur 404!</h1>";
    echo "La page demandée n'existe pas !";
}else{
    if (file_exists('view/sub/'.filter_input(INPUT_GET,'page',FILTER_SANITIZE_STRING).'.php')){
        $params = explode("&", filter_input(INPUT_GET,'page',FILTER_SANITIZE_STRING));
        $filtre = 0;
        $parametres = "";
        foreach($params as $key => $value){
            if ($filtre != 0){
                if ($filtre == 1){
                    $parametres = "?$value";
                    $filtre = 2;
                }else{
                    $parametres .= "&$value";
                }
            }
            $filtre = 1;
        }
        require('view/sub/'.$params[0].'.php'.$parametres);
    }else
    {
      echo "<h1>Erreur 404!</h1>";
      echo "La page demandée n'existe pas !";
    }
    
}

