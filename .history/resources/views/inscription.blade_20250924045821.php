<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>S'inscrire - DEP MINSANTE</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="stylesheet" href="connexion-style.css"/>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <link rel="icon" href="logo-minsante.png" type="image/x-icon">
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
            height: 650px;
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
                height: 180px;
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
                height: 120px;
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
            <form method="post" action="/traiter_creation_compte" style="flex:1;display:flex;align-items:center;justify-content:center;">
                @csrf
                    <!-- Affichage des règles de validation
                    <div class="validation-rules" style="margin-bottom: 1rem; background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 8px; padding: 1rem;">
                        <strong>Règles d'inscription :</strong>
                        <ul style="margin: 0.5rem 0 0 1.2rem;">
                            <li>Le nom doit contenir uniquement des lettres, espaces ou tirets.</li>
                            <li>L'email doit être valide et unique.</li>
                            <li>Le mot de passe doit contenir au moins 8 caractères, une majuscule, une minuscule et un chiffre.</li>
                            <li>La confirmation du mot de passe doit correspondre.</li>
                        </ul>
                    </div> -->

                    <!-- Affichage des erreurs de validation globales -->
                    @if ($errors->any())
                        <div class="alert alert-danger" style="color: #b91c1c; background: #fee2e2; border: 1px solid #fca5a5; border-radius: 8px; padding: 0.75rem; margin-bottom: 1rem;">
                            <ul style="margin: 0; padding-left: 1.2rem;">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <div class="boite-secondaire-boite-1-formulaire">
                        <h1 style="font-size: 2.2em; color:#473d83;">Inscription</h1><br>
                        <p class="champ-email">
                            <b><span style="font-size: 1.1em; color:#473d83;">Votre nom</span></b><br>
                            <i class="fa-solid fa-user"></i>
                            <input type="text" name="nom" placeholder="Votre nom" value="{{ old('nom') }}"/> <br>
                            @error('nom')
                                <div class="error" style="color: #b91c1c; font-size: 0.95em;">{{ $message }}</div>
                            @enderror
                        </p>
                        <p class="champ-email">
                            <b><span style="font-size: 1.1em; color:#473d83;">Email</span></b><br>
                            <i class="fa-solid fa-envelope"></i>
                            <input type="text" name="email" placeholder="Votre email" value="{{ old('email') }}"/>
                            @error('email')
                                <div class="error" style="color: #b91c1c; font-size: 0.95em;">{{ $message }}</div>
                            @enderror
                        </p>
                        <p class="champ-mdp">
                            <b><span style="font-size: 1.1em; color:#473d83;">Mot de passe</span></b><br>
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" name="password" placeholder="Mot de passe"/>
                            @error('password')
                                <div class="error" style="color: #b91c1c; font-size: 0.95em;">{{ $message }}</div>
                            @enderror
                        </p>
                        <p class="champ-mdp">
                            <b><span style="font-size: 1.1em; color:#473d83;">Confirmer votre mot de passe</span></b><br>
                            <i class="fa-solid fa-lock"></i>
                            <input type="password" name="confirm_password" placeholder="Mot de passe"/>
                        </p>
                        <p class="case-se-souvenir">
                            <input type="checkbox">
                            <span style="color: #473d83; font-size: 1.1em;"><b>Se souvenir de moi</b></span>
                        </p>
                        <p>
                            <a href="/connexion" style="text-decoration: none; color: darkslateblue; font-size: 1em;">Avez vous un compte ? Se connecter</a>
                        </p>
                        <p class="bouton-validation">
                            <input type="submit" value="S'inscrire">
                        </p>
                    </div>
            </form>
        </div>
    </div>    
</body>
</html>