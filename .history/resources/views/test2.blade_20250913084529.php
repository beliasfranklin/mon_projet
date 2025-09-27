<form id="id">
    <button onclick="ajout()">appuie</button><br>
</form>
<div id="ajout"></div>
<script>
    function ajout(){
        console.log(elt);
        let textarea=document.createElemnt('textarea');
        textarea.placeholder='motif du rejet';
        document.getElementById('ajout').appendChild(textarea);
    }
</script>