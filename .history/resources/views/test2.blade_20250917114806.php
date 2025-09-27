<style>
    #commentaires{
        font-family: 'Afacad Flux', 'Rubik', sans-serif;
        border-color: darkslateblue;
        border-width: 2px;
    }
    .a{
        color: darkslateblue;
        font-weight: bold;
        font-size: 25px;
    }
    .bouton-validation{
        background-color: darkslateblue;
        color: white;
        height: 40px;
        font-weight: bold;
        font-family: 'Afacad flux';
        border: none;
        border-color: darkslateblue;
        cursor: pointer;
    }
</style>
<form action="/traiter" method="post">
    <input type="password" name="pa" id="pa">
    @error('pa')
        
    @enderror
    <input type="submit" value="se connecter">
</form>


