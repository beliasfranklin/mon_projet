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
<form method="post" action="/voir">
    @csrf
    <input type="password" name="password" id="password"><br>
    @error('password')
        <span style="color: red">mot de passe !!!</span><br>
    @enderror
    <input type="submit" value="se connecter">
</form>


