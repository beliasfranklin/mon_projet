<button type="button" onclick="ajout()">appuie</button><br>

<div id="ajouter"></div>
<script>
    function ajout(){
        const a=document.getElementById('ajouter');
        a.innerHTML='
        {{$id=2}}<form method="post" action="/voir">@csrf<textarea name="texte" cols='70' rows='10'></textarea><input type="submit"></form>';
    }
</script>