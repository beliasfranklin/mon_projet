<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Connexion - DEP MINSANTE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="connexion-style.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <style>

        body{
            background-color: rgb(236, 246, 246);
            margin: 0;
            font-family: 'Afacad Flux', 'Rubik', sans-serif;
        }
        .boite-principale{
            display: flex;
            justify-content: center;
        }
        .boite-secondaire{
            display: flex;
            width: 1000px;
            height: 550px;
            background-color: white;
            margin: 120px;
        }
        .boite-secondaire-boite-1{
            width: 380px;
            background-color: darkslateblue;
            height: 550px;
            color: white;
        }
        .boite-secondaire-boite1-logo-minsante{
            margin-left: 100px;
            margin-top: 50px;
            width: 170px;
        }
        .boite-secondaire-boite-1-formulaire{
            margin: 50px;
        }
        .boite-secondaire-boite-1-formulaire h1{
            margin-top: 0;
        }
        .boite-secondaire-boite1-nom-structure{
            margin-left: 85px;  
        }
        .champ-email{
            margin-top: 0.5px;
        }
        .champ-email i{
            position: absolute;
            margin-left: 15px;
            margin-top: 13px;
            color: #473d83;
            width: 10px;
            height: 10px;
        }
        .champ-mdp i{
            position: absolute;
            margin-left: 15px;
            margin-top: 13px;
            color: #473d83;
            width: 10px;
            height: 10px;
        }
        .champ-email input{
            src: url("user_2321232.png");
        }
        .champ-email input, .champ-mdp input{
            width: 400px;
            height: 40px;
            padding-left: 50px;
        }
        .champ-email input:hover, .champ-mdp input:hover{
            border: solid;
            border-color: darkslateblue;
        }

        .bouton-validation input{
            width: 150px;
            height: 30px;
            background-color: darkslateblue;
            border-color: none;
            color: white;
            border: none;
        }
        .bouton-validation input:hover{
            color: white;
            background-color: rgba(71, 61, 139, 0.614);
            border: none;
        }
        .case-se-souvenir input{
            width: 18px;
            height: 18px;
        }
        .case-se-souvenir input:checked{
            background-color: darkslateblue;
        }
    </style>
</head>
<body>
    <div class="boite-erreur-ids" id="boite-erreur-ids" style="100%; height: 50px; background-color: rgb(255, 204, 204); color: darkred; display: flex; justify-content: center; align-items: center; font-size: 20px; font-weight: bold;">
        <i class="fa-solid fa-circle-xmark"></i> Utilisateur bloqué
    </div>
    <div class="boite-principale">
        <div class="boite-secondaire">
            <div class="boite-secondaire-boite-1">
                <div class="boite-secondaire-boite1-logo-minsante">
                    <img src="favicon.svg" alt="logo-minsante"/>
                </div>
                <div class="boite-secondaire-boite1-nom-structure">
                    <h1>DEP-MINSANTE</h1>
                </div>
            </div>
            <form method="post" action="/traiter_login">
                @csrf
                <div class="boite-secondaire-boite-1-formulaire">
                    <h1 style="font-size: 45px; color:#473d83;">Connexion</h1><br>
                    <p class="champ-email">
                        <b><span style="font-size: 20px; color:#473d83;">Email</span></b><br>
                        <i class="fa-solid fa-envelope" style="color: #473d83;"></i>
                        <input type="email" name="email" placeholder="Votre email" required/>
                    </p>
                    <p class="champ-mdp">
                        <b><span style="font-size: 20px; color:#473d83;">Mot de passe</span></b><br>
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" placeholder="Mot de passe" required/>
                    </p>
                    <p class="case-se-souvenir">
                        <input type="checkbox">
                        <span style="color: #473d83; font-size: 20px;"><b>Se souvenir de moi</b></span>
                    </p>
                    <p>
                        <a href="/motDePasseOublie" style="text-decoration: none; color: darkslateblue; font-size: 18px;">Mot de passe oublié ?</a>
                    </p>
                    <p>
                        <a href="/s'inscrire" style="text-decoration: none; color: darkslateblue; font-size: 18px;"> Pas de compte ? Créer un compte</a>
                    </p>
                    <p class="bouton-validation">
                        <input type="submit" value="Se connecter">
                    </p>
                </div>
            </form>
        </div>
    </div>    
</body>
</html>