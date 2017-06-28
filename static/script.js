function getID(id){
    var chose = window.getElementById(id);
    return chose;
}
$(".menu-toggle").click(function(e) {
    e.preventDefault();
    $("#wrapper").toggleClass("toggled", function(){
        alert('ok');
    });
});
//Chargement Ajax des pages
function charger(param = ""){
    $("#centre").fadeToggle(function(){
        $("#centre").load('link.php?'+param,function(){
           $("#centre").fadeToggle(); 
        });
    });
    return false;
}

//Envoi du formulaire pour les ajout/modifications d'épisodes.
function envoiFormulaire()
{
    $(document).ready(function() {
        // Lorsque je soumets le formulaire
        $('#formEpisode').on('submit', function(e) {
            e.preventDefault(); // J'empêche le comportement par défaut du navigateur, c-à-d de soumettre le formulaire

            var $this = $(this); // L'objet jQuery du formulaire

            // Je récupère les valeurs
            var titreEpisode = $('#titreEpisode').val();
            var numeroEpisode = $('#numeroEpisode').val();
            var texteEpisode = $('#texteEpisode').val();

            // Je vérifie une première fois pour ne pas lancer la requête HTTP
            // si je sais que mon PHP renverra une erreur
            if(titreEpisode === '' || numeroEpisode === '' || texteEpisode === '') {
                alert('Les champs doivent êtres remplis');
            } else {
                alert($this.serialize());
                // Envoi de la requête HTTP en mode asynchrone
                $.ajax({
                    url: $this.attr('action'), // Le nom du fichier indiqué dans le formulaire
                    type: $this.attr('method'), // La méthode indiquée dans le formulaire (get ou post)
                    data: $this.serialize(), // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                    success: function(html) { // Je récupère la réponse du fichier PHP
                        //alert(html); // J'affiche cette réponse
                         $('#reponseXHR').html(html); // J'affiche cette réponse
                    }
                });
            }
        });
    });
}