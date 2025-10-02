<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <title>Ministre - Dashboard MINSANTE</title>
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Afacad Flux', 'Rubik', sans-serif;
            background-color: #f0f8ff;
            color: #333;
            overflow-x: hidden;
        }

        /* Sidebar */
        .conteneur_menus {
            width: 280px;
            height: 100vh;
            background: linear-gradient(180deg, #483d8b 0%, #2c2453 100%);
            position: fixed;
            left: 0;
            top: 0;
            color: white;
            box-shadow: 4px 0 15px rgba(0, 0, 0, 0.1);
            z-index: 1000;
            overflow-y: auto;
        }

        .conteneur_titre_logo_minsante {
            text-align: center;
            padding: 20px 0;
            border-bottom: 1px solid rgba(255, 255, 255, 0.1);
        }

        .logo-minsante {
            width: 80px;
            height: 80px;
            margin-bottom: 10px;
        }

        .conteneur_titre_logo_minsante span {
            font-size: 18px;
            font-weight: 600;
        }

        .user-role {
            font-size: 14px;
            color: #b0b0ff;
            margin-top: 5px;
        }

        .menus {
            list-style: none;
            padding: 20px 0;
            margin-top: 20px;
        }

        .menus li {
            padding: 15px 25px;
            margin: 5px 0;
            transition: all 0.3s ease;
            border-left: 4px solid transparent;
        }

        .menus li.active {
            background: rgba(255, 255, 255, 0.1);
            border-left: 4px solid #ffd700;
        }

        .menus li:hover {
            background: rgba(255, 255, 255, 0.15);
            border-left: 4px solid #ffd700;
        }

        .menus li a {
            text-decoration: none;
            color: white;
            display: flex;
            align-items: center;
            font-size: 16px;
        }

        .menus li i {
            margin-right: 15px;
            width: 20px;
            text-align: center;
            font-size: 18px;
        }

        .logout {
            color: #ff6b6b !important;
        }

        /* Top Bar */
        .barre {
            margin-left: 280px;
            background: white;
            padding: 15px 30px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            position: fixed;
            top: 0;
            right: 0;
            left: 280px;
            z-index: 999;
            height: 80px;
        }

        .welcome-text {
            font-size: 24px;
            font-weight: 600;
            color: #483d8b;
        }

        .user-info {
            display: flex;
            align-items: center;
            gap: 10px;
            color: #483d8b;
            font-weight: 500;
        }

        .user-info i {
            font-size: 24px;
        }

        /* Main Content */
        .espace_travail {
            margin-left: 280px;
            padding: 100px 30px 30px 30px;
            min-height: 100vh;
        }

        .page-header {
            display: flex;
            align-items: center;
            gap: 15px;
            margin-bottom: 30px;
        }

        .envoi_dossier_interne {
            font-size: 32px;
            color: #483d8b;
            font-weight: 700;
        }

        .envoi_dossier_interne i {
            color: #483d8b;
        }

        /* Form Styles */
        .form-container {
            background: white;
            border-radius: 12px;
            padding: 30px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.08);
            max-width: 800px;
        }

        .form-group {
            margin-bottom: 25px;
        }

        .form-label {
            display: block;
            font-size: 18px;
            font-weight: 600;
            color: #483d8b;
            margin-bottom: 8px;
        }

        .input-with-icon {
            position: relative;
        }

        .input-with-icon i {
            position: absolute;
            left: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #483d8b;
            font-size: 18px;
        }

        .form-input {
            width: 100%;
            padding: 12px 15px 12px 45px;
            font-size: 16px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            transition: all 0.3s ease;
            font-family: 'Afacad Flux', sans-serif;
        }

        .form-input:focus {
            outline: none;
            border-color: #483d8b;
            box-shadow: 0 0 0 3px rgba(72, 61, 139, 0.1);
        }

        .form-select {
            width: 100%;
            padding: 12px 15px;
            font-size: 16px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            background: white;
            cursor: pointer;
            font-family: 'Afacad Flux', sans-serif;
        }

        .form-select:focus {
            outline: none;
            border-color: #483d8b;
        }

        .form-textarea {
            width: 100%;
            padding: 15px;
            font-size: 16px;
            border: 2px solid #e0e0e0;
            border-radius: 8px;
            resize: vertical;
            min-height: 120px;
            font-family: 'Afacad Flux', sans-serif;
        }

        .form-textarea:focus {
            outline: none;
            border-color: #483d8b;
            box-shadow: 0 0 0 3px rgba(72, 61, 139, 0.1);
        }

        .file-upload {
            border: 2px dashed #e0e0e0;
            border-radius: 8px;
            padding: 20px;
            text-align: center;
            transition: all 0.3s ease;
            cursor: pointer;
        }

        .file-upload:hover {
            border-color: #483d8b;
            background: #f8f9ff;
        }

        .file-upload input {
            display: none;
        }

        .file-upload-label {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 10px;
            cursor: pointer;
            color: #666;
        }

        .file-upload-label i {
            font-size: 24px;
            color: #483d8b;
        }

        .file-list {
            margin-top: 10px;
            font-size: 14px;
            color: #666;
        }

        .submit-btn {
            background: linear-gradient(135deg, #483d8b 0%, #5a4da3 100%);
            color: white;
            border: none;
            padding: 15px 30px;
            font-size: 18px;
            font-weight: 600;
            border-radius: 8px;
            cursor: pointer;
            transition: all 0.3s ease;
            font-family: 'Afacad Flux', sans-serif;
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .submit-btn:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(72, 61, 139, 0.3);
        }

        .submit-btn:active {
            transform: translateY(0);
        }

        /* Priority Badges */
        .priority-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 600;
            margin-left: 10px;
        }

        .priority-urgente { background: #ff4757; color: white; }
        .priority-haute { background: #ffa502; color: white; }
        .priority-moyenne { background: #2ed573; color: white; }
        .priority-basse { background: #57606f; color: white; }

        /* Error Messages */
        .error-message {
            color: #ff4757;
            font-size: 14px;
            margin-top: 5px;
            display: flex;
            align-items: center;
            gap: 5px;
        }

        /* Responsive */
        @media (max-width: 1024px) {
            .conteneur_menus {
                width: 250px;
            }
            
            .barre,
            .espace_travail {
                margin-left: 250px;
            }
        }

        @media (max-width: 768px) {
            .conteneur_menus {
                transform: translateX(-100%);
                transition: transform 0.3s ease;
            }
            
            .conteneur_menus.mobile-open {
                transform: translateX(0);
            }
            
            .barre,
            .espace_travail {
                margin-left: 0;
            }
            
            .menu-toggle {
                display: block;
            }
        }
    </style>
</head>
<body>
    <!-- Sidebar Navigation -->
    <div class="conteneur_menus">
        <div class="conteneur_titre_logo_minsante">
            <img src="favicon.svg" alt="logo-minsante" class="logo-minsante">
            <div>
                <span>DEP-MINSANTE</span>
                <div class="user-role">Mr le Ministre</div>
            </div>
        </div>
        
        <ul class="menus">
            <li><a href="/dashboard_minister"><i class="fa-solid fa-gauge-high"></i>Tableau de bord</a></li>
            <li class="active"><a href="/envoyer_dossier_interne"><i class="fa-solid fa-paper-plane"></i>Envoyer dossier interne</a></li>
            <li><a href="/suivi_dossiers"><i class="fa-solid fa-magnifying-glass"></i>Suivi des dossiers</a></li>
            <li><a href="/statistiques"><i class="fa-solid fa-chart-bar"></i>Statistiques</a></li>
            <li><a href="/se_deconnecter" onclick="seDeconnecter(event)" class="logout">
                <i class="fa-solid fa-right-from-bracket"></i>Se déconnecter
            </a></li>
        </ul>
    </div>

    <!-- Top Bar -->
    <div class="barre">
        <div class="welcome-text">Tableau de Bord Ministre</div>
        <div class="user-info">
            <span>Mr le Ministre</span>
            <i class="fa-solid fa-circle-user"></i>
        </div>
    </div>

    <!-- Main Content -->
    <div class="espace_travail">
        <div class="page-header">
            <i class="fa-solid fa-paper-plane"></i>
            <h1 class="envoi_dossier_interne">Envoyer un dossier interne</h1>
        </div>

        <div class="form-container">
            <form action="/traiter_formulaire_envoi_dossier_interne" method="post" enctype="multipart/form-data" id="dossierForm">
                @csrf
                
                <!-- Dossier Title -->
                <div class="form-group">
                    <label class="form-label">Intitulé du dossier</label>
                    <div class="input-with-icon">
                        <i class="fa-solid fa-folder"></i>
                        <input type="text" name="nom" class="form-input" placeholder="Ex: Réforme du système de santé rural" required>
                    </div>
                    @error('nom')
                        <div class="error-message">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <!-- File Upload -->
                <div class="form-group">
                    <label class="form-label">Pièces jointes</label>
                    <div class="file-upload" onclick="document.getElementById('files').click()">
                        <input type="file" name="files[]" id="files" multiple required>
                        <label class="file-upload-label">
                            <i class="fa-solid fa-cloud-arrow-up"></i>
                            <span>Cliquez pour sélectionner les fichiers</span>
                            <small>Formats acceptés: PDF, DOC, DOCX, JPEG, PNG</small>
                        </label>
                    </div>
                    <div class="file-list" id="fileList"></div>
                    @error('files')
                        <div class="error-message">
                            <i class="fa-solid fa-circle-exclamation"></i>
                            {{$message}}
                        </div>
                    @enderror
                </div>

                <!-- Priority -->
                <div class="form-group">
                    <label class="form-label">Définir la priorité</label>
                    <select name="priorites" class="form-select" id="priorites">
                        <option value="urgente">Urgente <span class="priority-badge priority-urgente">URGENT</span></option>
                        <option value="haute">Haute <span class="priority-badge priority-haute">HAUTE</span></option>
                        <option value="moyenne" selected>Moyenne <span class="priority-badge priority-moyenne">MOYENNE</span></option>
                        <option value="basse">Basse <span class="priority-badge priority-basse">BASSE</span></option>
                    </select>
                </div>

                <!-- Comments -->
                <div class="form-group">
                    <label class="form-label">Commentaires (optionnel)</label>
                    <textarea name="commentaires" class="form-textarea" placeholder="Instructions particulières pour le traitement de ce dossier..."></textarea>
                </div>

                <!-- Submit Button -->
                <button type="submit" class="submit-btn">
                    <i class="fa-solid fa-paper-plane"></i>
                    Envoyer le dossier à la DEP
                </button>
            </form>
        </div>
    </div>

    <script>
        // File upload display
        document.getElementById('files').addEventListener('change', function(e) {
            const fileList = document.getElementById('fileList');
            const files = e.target.files;
            
            if (files.length > 0) {
                fileList.innerHTML = `<strong>${files.length} fichier(s) sélectionné(s):</strong><br>`;
                for (let file of files) {
                    fileList.innerHTML += `• ${file.name} (${(file.size / 1024 / 1024).toFixed(2)} MB)<br>`;
                }
            } else {
                fileList.innerHTML = '';
            }
        });

        // Form submission
        document.getElementById('dossierForm').addEventListener('submit', function(e) {
            const dossierTitle = document.querySelector('input[name="nom"]').value.trim();
            const files = document.getElementById('files').files;
            
            if (!dossierTitle) {
                e.preventDefault();
                alert('Veuillez saisir un intitulé pour le dossier.');
                return;
            }
            
            if (files.length === 0) {
                e.preventDefault();
                alert('Veuillez sélectionner au moins un fichier.');
                return;
            }
            
            // Show loading state
            const submitBtn = this.querySelector('.submit-btn');
            submitBtn.innerHTML = '<i class="fa-solid fa-spinner fa-spin"></i> Envoi en cours...';
            submitBtn.disabled = true;
        });

        // Logout confirmation
        function seDeconnecter(event) {
            event.preventDefault();
            if (confirm('Êtes-vous sûr de vouloir vous déconnecter ?')) {
                window.location.href = event.target.closest('a').href;
            }
        }

        // Auto-refresh dashboard data every 30 seconds
        setInterval(() => {
            if (document.visibilityState === 'visible') {
                // You can add dashboard data refresh logic here
                console.log('🔄 Actualisation des données du dashboard...');
            }
        }, 30000);
    </script>
</body>
</html>