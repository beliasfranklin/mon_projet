<button onclick="ajout()">appuie</button><br>
<div id="ajout"></div>
<script>
    function ajout(){
        console.log(elt);
        let textarea=document.createElement('textarea');
        document.getElementById('ajout').appendChild(textarea);
    }
</script>