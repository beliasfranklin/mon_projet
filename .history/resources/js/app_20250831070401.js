setTimeout(function() {
    var box = document.getElementById('boite-erreur-ids');
    if (box) {
        box.style.display = 'none';
    }
}, 1000);

function seDeconnecter() {
    a=confirm("voulez vous deconnecter ?")
}