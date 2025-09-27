<button type="button" onclick="ajout()">appuie</button><br>
<div id="ajouter"></div>
<script>
        window.ajout=function(){
            console.log(elt);
            let textarea=document.createElement('textarea');
            textarea.placeholder='motif du rejet';
            document.getElementById('ajouter').appendChild(textarea);
            textarea.focus();
        };
        
</script>