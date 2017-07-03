<div id="page-content-wrapper">
    <div class="container-fluid">

        <?php
        $commentaire = new Commentaires();
        $commentaire->recuperer($bdd, $_GET[c]);
        $episode = new Episodes();
        $episode->afficher($bdd, $_GET[c]);
        ?>
        <hr />
       
        <div class="row">
            <div class="col-xs-12">
                <h1>Commentaires</h1>
                <?php
                $commentaire->afficher();
                ?>
            </div>
        </div>
    </div>
</div>


