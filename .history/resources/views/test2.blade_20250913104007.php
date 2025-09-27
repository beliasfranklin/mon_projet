<style>
    #commentaires{
        font-family: 'Afacad Flux', 'Rubik', sans-serif;
        border-color: darkslateblue;
        border-width: 2px;
    }
    .a{
        color: darkslateblue;
        font-weight: bold;
        font-size: 25px;
    }
    .bouton-validation{
        background-color: darkslateblue;
        color: white;
        height: 40px;
        font-weight: bold;
        font-family: 'Afacad flux';
        border: none;
        border-color: darkslateblue;
        cursor: pointer;
    }
</style>
<button type="button" onclick="ajout()">appuie</button><br>

<div id="ajouter"></div>
<script>
    function ajout(){
        const a=document.getElementById('ajouter');
        a.innerHTML='<span class="a">Motif du rejet:<br></span><form method="post" action="/voir">@csrf<textarea name="texte"cols="70" rows="10" placeholder="motif du rejet"></textarea><br><br><input type="submit" class="bouton-validation"></form>';
    }
</script>