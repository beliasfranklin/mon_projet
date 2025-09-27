<button type="button" onclick="ajout()">appuie</button><br>

<div id="ajouter"></div>
<script>
    function ajout(){
        const a=document.getElementById('ajouter');
        a.innerHTML='<form method="post" action="/voir"> <textarea name="texte"></textarea> <input type="submit"> </form>';
    }
</script>