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
function charger(param = "", id = "#centre"){
    $(id).fadeToggle(function(){
        $(id).load('link.php?'+param,function(){
           $(id).fadeToggle(); 
        });
    });
    return false;
}
function chargerModifEpisode(param="", id="#centre"){
    if ($(id).is(":hidden")){
    $(id).load('link.php?'+param,function(){
           $(id).fadeToggle(); 
        });   
    }else
    {
       charger(param, id);
    }
    
}
//Envoi du formulaire pour les ajout/modifications d'épisodes.
function envoiFormulaire(formulaire = '#formEpisode', XHR = '#reponseXHR')
{
    $(document).ready(function() {
        // Lorsque je soumets le formulaire
        $(formulaire).on('submit', function(e) {
            e.preventDefault(); // J'empêche le comportement par défaut du navigateur, c-à-d de soumettre le formulaire

        var $this = $(this); // L'objet jQuery du formulaire
            // Envoi de la requête HTTP en mode asynchrone
            $.ajax({
                url: $this.attr('action'), // Le nom du fichier indiqué dans le formulaire
                type: $this.attr('method'), // La méthode indiquée dans le formulaire (get ou post)
                data: $this.serialize(), // Je sérialise les données (j'envoie toutes les valeurs présentes dans le formulaire)
                success: function(html) { // Je récupère la réponse du fichier PHP
                    //alert(html); // J'affiche cette réponse
                     $(XHR).html(html); // J'affiche cette réponse
                }
            });
        });
    });
}

//affichage du modal d'ajout de comentaire
function commentaireModal(param="",page="commentaire"){
    $("#commentaireAjout").load('link.php?page='+page+param,function(){
          $('#myModal').modal('toggle');  
        })
}

//chargement de perfect scrollbar 
$(document).ready(function() {
    $('#sidebar-wrapper').perfectScrollbar();
});