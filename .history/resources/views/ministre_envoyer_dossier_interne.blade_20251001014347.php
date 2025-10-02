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
    <title>Ministre Envoyer Dossier - DEP MINSANTE</title>
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
            overflow-y: auto;
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

        .envoi_dossier_interne{
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
            max-width: 800px;
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

        #nom {
            width: 100%;
            max-width: 400px;
            height: 45px;
            padding: 5px 5px 5px 35px;
            font-size: 16px;
            border: 2px solid #ddd;
            border-radius: 4px;
            transition: border-color 0.3s;
            font-family: inherit;
        }

        #nom:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        #priorites {
            width: 100%;
            max-width: 300px;
            height: 45px;
            font-size: 16px;
            border: 2px solid #ddd;
            border-radius: 4px;
            padding: 0 10px;
            margin-bottom: 25px;
            font-family: inherit;
            background-color: white;
        }

        #priorites:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        #commentaires {
            width: 100%;
            max-width: 600px;
            font-family: 'Afacad Flux', 'Rubik', sans-serif;
            border: 2px solid #ddd;
            border-radius: 4px;
            padding: 12px;
            font-size: 16px;
            resize: vertical;
            min-height: 120px;
            transition: border-color 0.3s;
        }

        #commentaires:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        /* Upload de fichiers */
        .file-upload-container {
            margin: 15px 0;
        }

        .file-upload-label {
            display: inline-block;
            background: var(--primary-color);
            color: white;
            padding: 12px 20px;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
            font-weight: bold;
        }

        .file-upload-label:hover {
            background-color: rgb(79, 55, 236);
        }

        #files {
            display: none;
        }

        .file-list {
            margin-top: 10px;
            padding: 10px;
            background: #f8f9fa;
            border-radius: 4px;
            border-left: 4px solid var(--primary-color);
        }

        .file-item {
            display: flex;
            align-items: center;
            gap: 8px;
            padding: 5px 0;
            font-size: 14px;
        }

        .file-item i {
            color: var(--primary-color);
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
            color: #dc2626;
            font-size: 14px;
            margin-top: 5px;
            display: block;
        }

        /* Indicateurs de priorité */
        .priority-option {
            display: inline-block;
            padding: 4px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
            margin-left: 8px;
        }

        .priority-urgente { background: #fee2e2; color: #dc2626; }
        .priority-haute { background: #ffedd5; color: #ea580c; }
        .priority-moyenne { background: #fef3c7; color: #d97706; }
        .priority-basse { background: #dcfce7; color: #16a34a; }

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
            
            .envoi_dossier_interne {
                font-size: 28px;
            }
        }

        @media (max-width: 768px) {
            .envoi_dossier_interne {
                font-size: 24px;
            }
            
            .a {
                font-size: 16px;
            }
            
            .formulaire_creer_utilisateur {
                padding: 20px;
                margin: 0 -15px;
            }
            
            #nom, #priorites, #commentaires {
                font-size: 14px;
            }
            
            #nom, #priorites {
                height: 40px;
            }
            
            .bouton-validation {
                height: 40px;
                font-size: 14px;
            }
            
            .file-upload-label {
                padding: 10px 16px;
                font-size: 14px;
            }
        }

        @media (max-width: 576px) {
            .envoi_dossier_interne {
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
                flex-direction: column;
                gap: 5px;
                align-items: flex-start;
                padding: 10px 50px 10px 10px;
            }
            
            .barre span {
                font-size: 14px;
            }
            
            .form-group {
                margin-bottom: 20px;
            }
            
            #commentaires {
                min-height: 100px;
            }
        }

        /* Animation pour les erreurs */
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-5px); }
            75% { transform: translateX(5px); }
        }

        .error-input {
            border-color: #dc2626 !important;
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
            <span style="font-size: 14px;">Mr le Ministre</span>
            <ul class="menus">
                <li><a href="/dashboard_dep"><i class="fa-solid fa-gauge"></i>Tableau de bord</a></li>
                <li><a href="/envoyer_dossier_interne"><i class="fa-solid fa-paper-plane"></i>Envoyer dossier interne</a></li>
                <li><a href="/se deconnecter/{{$user->id}}" onclick="seDeconnecter(event)"><span style="color: #ff0000;"><i class="fa-solid fa-right-from-bracket" style="color: #ff0000;"></i>Se deconnecter</span></a></li>
            </ul>
        </div>    
    </div>

    <div class="barre">
        <span>Bienvenue, Ministre</span>
        <div>
            <span>Mr le Ministre</span>
            <i class="fa-solid fa-circle-user"></i>
        </div>
    </div>

    <div class="espace_travail">
        <div class="envoi_dossier_interne">
            <i class="fa-solid fa-paper-plane"></i>
            <span class="dossier_interne">Envoyer dossier interne</span>
        </div>
        
        <div class="formulaire_creer_utilisateur">
            <form action="/traiter_formulaire_envoi_dossier_interne" method="post" enctype="multipart/form-data" id="dossierForm">
                @csrf
                
                <div class="form-group">
                    <span class="a">Intitulé du dossier</span>
                    <i class="fa-solid fa-folder"></i>
                    <input type="text" name="nom" id="nom" placeholder="Intitulé du dossier" value="{{ old('nom') }}">
                    @error('nom')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <span class="a">Pièces jointes</span>
                    <div class="file-upload-container">
                        <label for="files" class="file-upload-label">
                            <i class="fa-solid fa-upload"></i> Choisir les fichiers
                        </label>
                        <input type="file" name="files[]" id="files" multiple>
                        <div class="file-list" id="fileList" style="display: none;">
                            <div id="selectedFiles"></div>
                        </div>
                    </div>
                    @error('files')
                        <span class="error">{{ $message }}</span>
                    @enderror
                </div>

                <div class="form-group">
                    <span class="a">Définir la priorité</span>
                    <select name="priorites" id="priorites">
                        <option value="urgente">Urgente <span class="priority-option>URGENT</span></option>
                        <option value="haute">Haute <span class="priority-option priority-haute">HAUTE</span></option>
                        <option value="moyenne">Moyenne <span class="priority-option priority-moyenne">MOYENNE</span></option>
                        <option value="basse">Basse <span class="priority-option priority-basse">BASSE</span></option>
                    </select>
                </div>

                <div class="form-group">
                    <span class="a">Commentaires (optionnel)</span>
                    <textarea name="commentaires" id="commentaires" placeholder="Commentaires sur le dossier">{{ old('commentaires') }}</textarea>
                </div>

                <div style="text-align: center; margin-top: 30px;">
                    <input type="submit" value="Envoyer dossier interne à la DEP" class="bouton-validation">
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

        // Gestion de l'affichage des fichiers sélectionnés
        document.getElementById('files').addEventListener('change', function(e) {
            const fileList = document.getElementById('fileList');
            const selectedFiles = document.getElementById('selectedFiles');
            
            if (this.files.length > 0) {
                selectedFiles.innerHTML = '';
                
                for (let i = 0; i < this.files.length; i++) {
                    const file = this.files[i];
                    const fileItem = document.createElement('div');
                    fileItem.className = 'file-item';
                    fileItem.innerHTML = `
                        <i class="fa-solid fa-file"></i>
                        <span>${file.name} (${(file.size / 1024 / 1024).toFixed(2)} MB)</span>
                    `;
                    selectedFiles.appendChild(fileItem);
                }
                
                fileList.style.display = 'block';
            } else {
                fileList.style.display = 'none';
            }
        });

        // Validation du formulaire
        document.getElementById('dossierForm').addEventListener('submit', function(e) {
            const nom = document.getElementById('nom').value.trim();
            const files = document.getElementById('files').files;
            
            if (!nom) {
                e.preventDefault();
                alert('Veuillez saisir l\'intitulé du dossier.');
                return false;
            }
            
            if (files.length === 0) {
                e.preventDefault();
                alert('Veuillez sélectionner au moins un fichier.');
                return false;
            }
            
            // Validation de la taille des fichiers (max 10MB par fichier)
            let validFiles = true;
            for (let i = 0; i < files.length; i++) {
                if (files[i].size > 10 * 1024 * 1024) { // 10MB
                    validFiles = false;
                    break;
                }
            }
            
            if (!validFiles) {
                e.preventDefault();
                alert('Un ou plusieurs fichiers dépassent la taille maximale autorisée (10MB).');
                return false;
            }
        });

        // Animation d'erreur sur les champs
        document.addEventListener('DOMContentLoaded', function() {
            const errorElements = document.querySelectorAll('.error');
            errorElements.forEach(error => {
                const input = error.previousElementSibling;
                if (input && (input.tagName === 'INPUT' || input.tagName === 'SELECT' || input.tagName === 'TEXTAREA')) {
                    input.classList.add('error-input');
                    
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

        // Pré-remplir les valeurs si elles existent
        document.addEventListener('DOMContentLoaded', function() {
            const priorites = document.getElementById('priorites');
            @if(old('priorites'))
                for (let i = 0; i < priorites.options.length; i++) {
                    if (priorites.options[i].value === "{{ old('priorites') }}") {
                        priorites.options[i].selected = true;
                        break;
                    }
                }
            @endif
        });
    </script>
</body>
</html>