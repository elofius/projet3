<!DOCTYPE html>
<html>
    <head>
        <title>Un billet simple pour l'alaska - Admin</title>
        <link rel="icon" type="image/png" href="static/img/favico.png" />
        <meta charset="utf-8">
        
        <!--Ajout des meta et inclusions bootstrap-->
        <meta name="viewport" content="width=device-width initial-scale=1">
   
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" href="static/style.css">
       
    </head>
    <body>
        <button type="button" class="boutonMenu menu-toggle active">Sommaire</button>
        <div id="wrapper">
        <!-- Sidebar -->
            <div id="sidebar-wrapper">
                <ul class="sidebar-nav">
                    <li>
                        <img src="static/img/logo.jpg" style="cursor: pointer;" alt="logo train" class="img-thumbnail" onClick="window.location='http://www.matthieu-deparis.fr/P3';"/>
                    </li>
                    <li>&nbsp;</li>
                    <li>Épisodes</li>
                    <!--Chargement des chapitres ici -->
                    <li>
                        <a href="#" onclick="charger('chapitre','c=1');">Ajouter un épisode</a>
                    </li>
                    <li>
                        <a href="#" onclick="charger('chapitre','c=2');">Modifier un épisode</a>
                    </li>
                    <li>
                        <a href="#" onclick="charger('chapitre','c=3');">Supprimer un épisode</a>
                    </li>
                    <li>
                        <a href="#" onclick="charger('chapitre','c=4');">Modérer les commentaires</a>
                    </li>
                    <li>&nbsp;</li>
                    <li>Site</li>
                    <li>
                        <a href="#" onClick="charger('page=deco');">Se déconnecter</a>
                    </li>
                    
                    <li>
                        <a href="#" style="color:red;" class="menu-toggle ">Fermer le menu</a>
                    </li>
                </ul>
            </div>
            <!-- /#sidebar-wrapper -->

            <!-- Page Content -->
            <div id="page-content-wrapper">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-12">
                            <div id="centre">
                                <!-- contenu du site ici -->
                                <?=$contenu?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /#page-content-wrapper -->

        </div>
        
        
        <!--Inclusion des Js-->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!--<script src="static/bootstrap-filestyle.min.js"></script>-->
        <script src="static/script.js"></script>
    </body>
</html>
