<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="connexion-style.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <title>Accueil - DEP MINSANTE</title>
</head>
<style>
    body{
        font-family: 'Afacad Flux', 'Rubik', sans-serif;
        margin: 0; 
    }
    .barre{
        background-color: pink;
        height: 80px;
    }
    .titre{
        font-size: 25px;
        margin: 20px;
    }
    .auth{
        float: right;
        margin: 20px;
    }
    .auth button{
        margin-left: 20px;
        width: 120px;
        height: 40px;
    }
    #login{
        background-color: darkslateblue;
        color: white;
        border: solid;
        border-color: darkslateblue;
    }
    #register{
        background-color: white;
        color: darkslateblue;
        border: solid 2px darkslateblue;
    }
    #register:hover{
        background-color: darkslateblue;
        color: white; 
        transition-duration: 1s;
        transition-timing-function: cubic-bezier(0.075, 0.82, 0.165, 1);
    }
    #login:hover{
        background-color: white;
        color: darkslateblue;
        transition-duration: 1s;
        transition-timing-function: cubic-bezier(0.075, 0.82, 0.165, 1);
    }
</style>
<body>
    <div class="barre">
        <span class="titre">
        <img src="favicon.ico" alt="logo_dep">DEP - MINSANTE
        </span>
        <div class="auth">
            <a href="/s'inscrire"><button id="register">S'inscrire</button></a>
            <a href="/connexion"><button id="login">Se connecter</button></a>
        </div>
    </div>
    
</body>
</html>