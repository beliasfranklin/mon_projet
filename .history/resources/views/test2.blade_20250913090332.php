<button type="button" onclick="ajout()">appuie</button><br>

<div id="ajouter"></div>
<script>
    function ajout(){
        const a=document.getElementById('ajouter');
        a.innerHTML+="<textarea name="" id="" cols="30" rows="10"></textarea>";
    }
</script>