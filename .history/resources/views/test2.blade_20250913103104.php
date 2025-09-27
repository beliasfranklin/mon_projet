<style>
    .a{
        background-color: red;
    }
</style>
<button type="button" onclick="ajout()">appuie</button><br>

<div id="ajouter"></div>
<script>
    function ajout(){
        const a=document.getElementById('ajouter');
        a.innerHTML='<span class="a" style="color: darkslateblue;font-weight: bold;font-size: 25px;">Motif du rejet:<br></span><form method="post" action="/voir">@csrf<textarea name="texte"cols="70" rows="10" placeholder="motif du rejet"></textarea><br><input type="submit"></form>';
    }
</script>