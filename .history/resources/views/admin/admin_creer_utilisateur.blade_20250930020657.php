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
    <link rel="icon" href="logo-minsante.png" type="image/x-icon">
    <title>Créer un nouvel utilisateur - DEP MINSANTE</title>
    <style>
        :root {
            --primary-color: darkslateblue;
            --secondary-color: lavender;
            --text-color: white;
            --background-color: rgb(236, 246, 246);
        }

        * {
            box-sizing: border-box;
        }

        body{
            font-family: 'Afacad Flux', 'Rubik', sans-serif;
            margin: 0;
            background-color: var(--background-color);
        }

        /* Menu latéral */
        .conteneur_menus{
            height: 100vh;
            width: 300px;
            background-color: var(--primary-color);
            position: fixed;
            left: 0;
            top: 0;
            color: var(--text-color);
            font-weight: bold;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            z-index: 1000;
            transition: transform 0.3s ease;
        }

        .conteneur_titre_logo_minsante{
            text-align: center;
            margin-top: 10px;
            padding: 10px;
        }

        .logo-minsante{
            width: 80px;
            height: 80px;
            max-width: 100%;
        }

        .conteneur_titre_logo_minsante span{
            font-size: 20px;
            display: block;
            margin-top: 10px;
        }

        .menus{
            list-style: none;
            padding: 0;
            margin-top: 40px;
        }

        .menus li{
            font-size: 16px;
            margin: 20px 0;
            padding: 10px 15px;
            transition: background-color 0.3s;
        }
        
        .menus li a {
            text-decoration: none;
            color: var(--text-color);
            display: block;
        }

        .menus li:hover{
            background-color: rgb(79, 55, 236);
        }

        .menus li i{
            margin-right: 15px;
            width: 20px;
            font-size: 16px;
        }

        /* Barre supérieure */
        .barre{
            background-color: var(--secondary-color);
            margin-left: 300px;
            padding: 15px 20px;
            position: fixed;
            font-weight: bold;
            font-size: 24px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            z-index: 999;
            width: calc(100% - 300px);
            top: 0;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }

        .barre span{
            font-size: 18px;
            color: var(--primary-color);
        }

        .barre i{
            color: var(--primary-color);
            font-size: 24px;
        }

        /* Espace de travail */
        .espace_travail{
            margin-left: 300px;
            padding: 100px 20px 20px 20px;
            width: calc(100% - 300px);
            min-height: calc(100vh - 100px);
        }

        .utilisateurs{
            font-size: 32px;
            color: var(--primary-color);
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 30px;
        }

        .a{
            color: var(--primary-color);
            font-weight: bold;
            font-size: 18px;
            display: block;
            margin-bottom: 8px;
        }

        /* Formulaire */
        .formulaire_creer_utilisateur {
            background: white;
            padding: 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.1);
            max-width: 600px;
        }

        .form-group {
            position: relative;
            margin-bottom: 25px;
        }

        .form-group i {
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-color);
            font-size: 16px;
            z-index: 1;
        }

        #nom, #email, #tel, #mdp {
            width: 100%;
            height: 45px;
            padding: 5px 5px 5px 35px;
            font-size: 16px;
            border: 2px solid #ddd;
            border-radius: 4px;
            transition: border-color 0.3s;
            font-family: inherit;
        }

        #nom:focus, #email:focus, #tel:focus, #mdp:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        #structure, #role {
            width: 100%;
            height: 45px;
            font-size: 16px;
            border: 2px solid #ddd;
            border-radius: 4px;
            padding: 0 10px;
            margin-bottom: 25px;
            font-family: inherit;
            background-color: white;
        }

        #structure:focus, #role:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        .bouton-validation{
            background-color: var(--primary-color);
            color: var(--text-color);
            height: 45px;
            font-weight: bold;
            font-family: 'Afacad flux';
            border: none;
            border-radius: 4px;
            cursor: pointer;
            padding: 0 30px;
            font-size: 16px;
            transition: opacity 0.3s;
            width: 100%;
            max-width: 300px;
        }

        .bouton-validation:hover{
            opacity: 0.9;
        }

        .error {
            color: #b91c1c;
            font-size: 0.95em;
            margin-top: 5px;
            display: block;
        }

        /* Menu toggle pour mobile */
        .menu-toggle {
            display: none;
            position: fixed;
            top: 15px;
            left: 15px;
            z-index: 1001;
            background: var(--primary-color);
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            font-size: 18px;
        }

        /* Media Queries */
        @media (max-width: 1200px) {
            .conteneur_menus {
                width: 250px;
            }
            
            .barre {
                margin-left: 250px;
                width: calc(100% - 250px);
            }
            
            .espace_travail {
                margin-left: 250px;
                width: calc(100% - 250px);
            }
        }

        @media (max-width: 992px) {
            .conteneur_menus {
                transform: translateX(-100%);
            }
            
            .conteneur_menus.menu-open {
                transform: translateX(0);
            }
            
            .barre {
                margin-left: 0;
                width: 100%;
                padding: 15px 60px 15px 15px;
            }
            
            .espace_travail {
                margin-left: 0;
                width: 100%;
                padding: 80px 15px 15px 15px;
            }
            
            .menu-toggle {
                display: block;
            }
            
            .utilisateurs {
                font-size: 28px;
            }
        }

        @media (max-width: 768px) {
            .utilisateurs {
                font-size: 24px;
            }
            
            .a {
                font-size: 16px;
            }
            
            .formulaire_creer_utilisateur {
                padding: 20px;
                margin: 0 -15px;
            }
            
            #nom, #email, #tel, #mdp, #structure, #role {
                height: 40px;
                font-size: 14px;
            }
            
            .bouton-validation {
                height: 40px;
                font-size: 14px;
            }
        }

        @media (max-width: 576px) {
            .utilisateurs {
                font-size: 20px;
                flex-direction: column;
                align-items: flex-start;
                gap: 5px;
            }
            
            .conteneur_menus {
                width: 280px;
            }
            
            .conteneur_titre_logo_minsante span {
                font-size: 18px;
            }
            
            .menus li {
                font-size: 14px;
                padding: 8px 10px;
            }
            
            .barre {
                font-size: 18px;
            }
            
            .barre span {
                font-size: 14px;
            }
        }

        /* Animation pour les champs de formulaire */
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .error-input {
            border-color: #b91c1c !important;
            animation: shake 0.3s ease-in-out;
        }
    </style>
</head>
<body>
    <!-- Bouton menu mobile -->
    <button class="menu-toggle" id="menuToggle">
        <i class="fa-solid fa-bars"></i>
    </button>

    <div class="conteneur_menus" id="sideMenu">
        <div class="conteneur_titre_logo_minsante">
            <img src="logo-minsante.png" alt="logo-minsante" class="logo-minsante">
            <span>DEP-MINSANTE</span>
            @if($user->id==$users_roles->id_user && $users_roles->id_role==26)
                <span style="font-size: 14px;">ADMIN</span>
                <ul class="menus">
                    <li><a href="/dashboard_dep"><i class="fa-solid fa-gauge"></i>Tableau de bord</a></li>
                    <li><a href="/historiques"><i class="fa-solid fa-clock-rotate-left"></i>Consulter Historiques</a></li>
                    <li><a href="/gerer_utilisateurs"><i class="fa-solid fa-users"></i>Gérer Utilisateurs</a></li>
                    <li><a href="/se deconnecter/{{$user->id}}" onclick="seDeconnecter(event)"><span style="color: #ff0000;"><i class="fa-solid fa-right-from-bracket" style="color: #ff0000;"></i>Se deconnecter</span></a></li>
                </ul>
            @endif
        </div>    
    </div>

    <div class="barre">
        <span>Bienvenue, {{$user->name}}</span>
        <div>
            <span>{{$user->name}}</span>
            <i class="fa-solid fa-circle-user"></i>
        </div>
    </div>

    <div class="espace_travail">
        <div class="utilisateurs">
            <i class="fa-solid fa-user-plus"></i>
            <span class="users">Créer Utilisateur</span>
        </div>
        
        <div class="formulaire_creer_utilisateur">
            <form action="/traiter_formulaire_creation_utilisateur" method="post" id="creationForm">
                @csrf
                
                <div class="form-group">
                    <span class="a">Nom complet</span>
                    <i class="fa-solid fa-user"></i>
                    <input type="text" name="nom" id="nom" placeholder="Nom complet" value="{{old('nom')}}">
                    @error('nom')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <span class="a">Email</span>
                    <i class="fa-solid fa-envelope"></i>
                    <input type="email" name="email" id="email" placeholder="Email" value="{{old('email')}}">
                    @error('email')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <span class="a">Numéro de Téléphone (Pour Whatsapp de préférence)</span>
                    <i class="fa-solid fa-phone"></i>
                    <input type="tel" name="tel" id="tel" placeholder="Numéro de téléphone" value="{{old('tel')}}">
                    @error('tel')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <span class="a">Mot de passe</span>
                    <i class="fa-solid fa-lock"></i>
                    <input type="password" name="mdp" id="mdp" placeholder="Mot de passe">
                    @error('mdp')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <span class="a">Role</span>
                    <select name="role" id="role">
                        @foreach ($roles as $r)
                            <option value="{{$r->nomRole}}" {{ old('role') == $r->nomRole ? 'selected' : '' }}>
                                {{$r->nomRole}}
                            </option>  
                        @endforeach
                    </select>
                    @error('role')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div class="form-group">
                    <span class="a">Structure</span>
                    <select name="structure" id="structure">
                        @foreach ($structure as $s)
                            <option value="{{$s->nomStructure}}" {{ old('structure') == $s->nomStructure ? 'selected' : '' }}>
                                {{$s->nomStructure}}
                            </option>
                        @endforeach
                    </select>
                    @error('structure')
                        <div class="error">{{ $message }}</div>
                    @enderror
                </div>

                <div style="text-align: center; margin-top: 30px;">
                    <input type="submit" value="Créer nouvel utilisateur" class="bouton-validation">
                </div>
            </form>
        </div>
    </div>

    <script>
        // Menu mobile toggle
        document.getElementById('menuToggle').addEventListener('click', function() {
            document.getElementById('sideMenu').classList.toggle('menu-open');
        });

        function seDeconnecter(event){
            event.preventDefault();
            if(confirm("Voulez-vous vous déconnecter ?")){
                window.location.href = "/se deconnecter/{{$user->id}}";
            }
        }

        // Animation d'erreur sur les champs
        document.addEventListener('DOMContentLoaded', function() {
            const errorElements = document.querySelectorAll('.error');
            errorElements.forEach(error => {
                const input = error.previousElementSibling;
                if (input && (input.tagName === 'INPUT' || input.tagName === 'SELECT')) {
                    input.classList.add('error-input');
                    
                    // Retirer l'animation après un certain temps
                    setTimeout(() => {
                        input.classList.remove('error-input');
                    }, 1000);
                }
            });
        });

        // Fermer le menu en cliquant à l'extérieur (mobile)
        document.addEventListener('click', function(event) {
            const sideMenu = document.getElementById('sideMenu');
            const menuToggle = document.getElementById('menuToggle');
            
            if (window.innerWidth <= 992 && 
                !sideMenu.contains(event.target) && 
                !menuToggle.contains(event.target) &&
                sideMenu.classList.contains('menu-open')) {
                sideMenu.classList.remove('menu-open');
            }
        });

        // Validation côté client basique
        document.getElementById('creationForm').addEventListener('submit', function(e) {
            const nom = document.getElementById('nom').value.trim();
            const email = document.getElementById('email').value.trim();
            const tel = document.getElementById('tel').value.trim();
            const mdp = document.getElementById('mdp').value;
            
            if (!nom || !email || !tel || !mdp) {
                e.preventDefault();
                alert('Veuillez remplir tous les champs obligatoires.');
            }
        });
    </script>
</body>
</html>