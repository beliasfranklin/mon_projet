<button type="button" onclick="ajout()">appuie</button><br>
<div id="ajouter"></div>
<script>
    function ajout(){
        window.ajout=function(){
            console.log(elt);
            let textarea=document.createElement('textarea');
            textarea.placeholder='motif du rejet';
            document.getElementById('ajouter').appendChild(textarea);
        };
        
    }
</script>