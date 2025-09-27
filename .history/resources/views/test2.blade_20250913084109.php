<button onclick="ajout()">appuie</button><br>
<div id="ajout"></div>

<script>
    function ajout(){
        const elt=document.getElementById('ajout');
        console.log(elt);
        let textarea=document.createElemnt('textarea');
        textarea.placeholder='motif du rejet';
        document.getElementById('ajout').appendChild(textarea);

    }
</script>