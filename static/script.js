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
function charger(nom,param = ""){
    $("#centre").fadeToggle(function(){
        $("#centre").load(nom+'.php'+param,function(){
           $("#centre").fadeToggle(); 
        });
    });
    return false;
}
