<button onclick="ajout()">appuie</button><br>
<div id="ajouter"></div>
<script>
    function ajout(){
        console.log(elt);
        let textarea=document.createElement('textarea');
        textarea.placeholder='motif du rejet';
        document.getElementById('ajout').appendChild(textarea);
    }
</script>