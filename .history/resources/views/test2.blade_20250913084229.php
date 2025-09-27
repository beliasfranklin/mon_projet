<button onclick="ajout()">appuie</button><br>
<div id="ajout"></div>
<textarea name="" id="" cols="30" rows="10"></textarea>
<script>
    function ajout(){
        console.log(elt);
        let textarea=document.createElemnt('textarea');
        textarea.placeholder='motif du rejet';
        document.getElementById('ajout').appendChild(textarea);

    }
</script>