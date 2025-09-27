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
    <link rel="icon" href="logo-minsante.png" type="image/x-icon">
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
            align-items: center;
            min-height: 100vh;
            padding: 0 10px;
        }
        .boite-secondaire{
            display: flex;
            width: 1000px;
            max-width: 100%;
            height: 550px;
            background-color: white;
            margin: 40px 0;
            border-radius: 18px;
            box-shadow: 0 4px 24px 0 rgba(0,0,0,0.08);
            overflow: hidden;
        }
        .boite-secondaire-boite-1{
            width: 380px;
            min-width: 220px;
            background-color: darkslateblue;
            height: 100%;
            color: white;
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
        .boite-secondaire-boite1-logo-minsante{
            margin: 0 auto 20px auto;
            width: 120px;
        }
        .boite-secondaire-boite-1-formulaire{
            margin: 40px 20px;
            width: 100%;
            max-width: 420px;
        }
        .boite-secondaire-boite-1-formulaire h1{
            margin-top: 0;
        }
        .boite-secondaire-boite1-nom-structure{
            text-align: center;
        }
        .champ-email, .champ-mdp{
            margin-top: 10px;
            position: relative;
        }
        .champ-email i, .champ-mdp i{
            position: absolute;
            left: 15px;
            top: 38px;
            color: #473d83;
            width: 18px;
            height: 18px;
        }
        .champ-email input, .champ-mdp input{
            width: 100%;
            min-width: 0;
            max-width: 400px;
            height: 40px;
            padding-left: 45px;
            border-radius: 8px;
            border: 1px solid #e0e0e0;
            font-size: 1em;
            box-sizing: border-box;
        }
        .champ-email input:hover, .champ-mdp input:hover{
            border: solid 1.5px darkslateblue;
        }
        .bouton-validation input{
            width: 150px;
            height: 38px;
            background-color: darkslateblue;
            color: white;
            border: none;
            border-radius: 8px;
            font-size: 1.1em;
            cursor: pointer;
        }
        .bouton-validation input:hover{
            color: white;
            background-color: #473d83cc;
        }
        .case-se-souvenir input{
            width: 18px;
            height: 18px;
        }
        .case-se-souvenir input:checked{
            background-color: darkslateblue;
        }
        @media (max-width: 900px) {
            .boite-secondaire {
                flex-direction: column;
                width: 95vw;
                height: auto;
                min-width: 0;
            }
            .boite-secondaire-boite-1 {
                width: 100%;
                height: 160px;
                flex-direction: row;
                justify-content: flex-start;
                align-items: center;
                border-radius: 18px 18px 0 0;
            }
            .boite-secondaire-boite1-logo-minsante {
                margin: 0 20px 0 20px;
                width: 80px;
            }
            .boite-secondaire-boite1-nom-structure {
                margin: 0;
                text-align: left;
            }
        }
        @media (max-width: 600px) {
            .boite-secondaire {
                width: 100vw;
                margin: 10px 0;
                border-radius: 0;
                box-shadow: none;
            }
            .boite-secondaire-boite-1 {
                height: 100px;
                font-size: 1em;
                border-radius: 0;
            }
            .boite-secondaire-boite-1-formulaire {
                margin: 20px 5px;
                max-width: 100vw;
            }
            .champ-email input, .champ-mdp input {
                font-size: 0.95em;
                height: 36px;
            }
            .bouton-validation input {
                width: 100%;
                font-size: 1em;
                height: 36px;
            }
        }
    </style>
</head>
<body>
    <div class="boite-erreur-ids" id="boite-erreur-ids" style="width: 100%; min-height: 50px; background-color: rgb(255, 204, 204); color: darkred; display: flex; justify-content: center; align-items: center; font-size: 20px; font-weight: bold;">
        <i class="fa-solid fa-circle-xmark"></i> Email ou mot de passe incorrects
    </div>
    <div class="boite-principale">
        <div class="boite-secondaire">
            <div class="boite-secondaire-boite-1">
                <div class="boite-secondaire-boite1-logo-minsante">
                    <img src="logo-minsante.png" alt="logo-minsante" style="width:100%;max-width:120px;"/>
                </div>
                <div class="boite-secondaire-boite1-nom-structure">
                    <h1>DEP-MINSANTE</h1>
                </div>
            </div>
            <form method="post" action="/traiter_login" style="flex:1;display:flex;align-items:center;justify-content:center;">
                @csrf
                <div class="boite-secondaire-boite-1-formulaire">
                    <h1 style="font-size: 2.2em; color:#473d83;">Connexion</h1><br>
                    <p class="champ-email">
                        <b><span style="font-size: 1.1em; color:#473d83;">Email</span></b><br>
                        <i class="fa-solid fa-envelope"></i>
                        <input type="text" name="email" placeholder="Votre email" required/>
                    </p>
                    <p class="champ-mdp">
                        <b><span style="font-size: 1.1em; color:#473d83;">Mot de passe</span></b><br>
                        <i class="fa-solid fa-lock"></i>
                        <input type="password" name="password" placeholder="Mot de passe" required/>
                    </p>
                    <p class="case-se-souvenir">
                        <input type="checkbox">
                        <span style="color: #473d83; font-size: 1.1em;"><b>Se souvenir de moi</b></span>
                    </p>
                    <p>
                        <a href="/motDePasseOublie" style="text-decoration: none; color: darkslateblue; font-size: 1em;">Mot de passe oublié ?</a>
                    </p>
                    <p>
                        <a href="/s'inscrire" style="text-decoration: none; color: darkslateblue; font-size: 1em;"> Pas de compte ? Créer un compte</a>
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