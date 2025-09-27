<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>DEP - MINSANTE | Accueil</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: 'Afacad Flux', 'Rubik', sans-serif;
            margin: 0;
            background: linear-gradient(120deg, #f6f6ff 0%, #e9e6fa 100%);
            color: #1e293b;
        }
        .navbar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            background: lavender;
            padding: 0 2vw;
            height: 70px;
            box-shadow: 0 2px 8px rgba(71,61,131,0.07);
            position: sticky;
            top: 0;
            z-index: 100;
        }
        .navbar .logo {
            display: flex;
            align-items: center;
            font-size: 1.3em;
            font-weight: 700;
            color: #473d83;
        }
        .navbar .logo img {
            width: 36px;
            margin-right: 10px;
        }
        .navbar nav {
            display: flex;
            align-items: center;
            gap: 2vw;
        }
        .navbar nav .dropdown {
            position: relative;
        }
        .navbar nav .dropdown:hover .dropdown-content {
            display: block;
        }
        .navbar nav a, .navbar nav button {
            background: none;
            border: none;
            color: #473d83;
            font-size: 1em;
            font-family: inherit;
            font-weight: 500;
            cursor: pointer;
            padding: 8px 12px;
            text-decoration: none;
        }
        .navbar nav a:hover, .navbar nav button:hover {
            color: darkslateblue;
        }
        .dropdown-content {
            display: none;
            position: absolute;
            top: 38px;
            left: 0;
            background: #fff;
            min-width: 200px;
            box-shadow: 0 2px 8px rgba(71,61,131,0.07);
            border-radius: 8px;
            z-index: 10;
        }
        .dropdown-content a {
            display: block;
            padding: 10px 18px;
            color: #473d83;
            text-decoration: none;
            font-size: 1em;
        }
        .dropdown-content a:hover {
            background: #f6f6ff;
            color: darkslateblue;
        }
        .navbar .actions {
            display: flex;
            gap: 12px;
        }
        .navbar .actions a {
            text-decoration: none;
        }
        .navbar .actions .btn {
            padding: 10px 22px;
            border-radius: 8px;
            font-size: 1em;
            font-weight: 600;
            border: 2px solid darkslateblue;
            background: white;
            color: darkslateblue;
            transition: background 0.2s, color 0.2s;
        }
        .navbar .actions .btn.primary {
            background: darkslateblue;
            color: #fff;
        }
        .navbar .actions .btn.primary:hover {
            background: #fff;
            color: darkslateblue;
        }
        .navbar .actions .btn:hover {
            background: darkslateblue;
            color: #fff;
        }
        .main-section {
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: center;
            gap: 40px;
            max-width: 1200px;
            margin: 60px auto 0 auto;
            padding: 30px 2vw 0 2vw;
        }
        .main-left {
            flex: 1 1 350px;
            min-width: 300px;
            max-width: 500px;
        }
        .main-left h1 {
            font-size: 2.2em;
            color: #473d83;
            font-weight: 800;
            margin-bottom: 0.3em;
            line-height: 1.2;
        }
        .main-left p {
            font-size: 1.15em;
            color: #1e293b;
            margin-bottom: 1.5em;
        }
        .main-left .btn.primary {
            font-size: 1.1em;
            padding: 14px 32px;
        }
        .main-center {
            flex: 1 1 320px;
            min-width: 260px;
            max-width: 420px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        .main-center img {
            max-width: 100%;
            height: auto;
            border-radius: 14px;
            box-shadow: 0 2px 8px rgba(71,61,131,0.09);
        }
        .testimonial-section {
            max-width: 700px;
            margin: 40px auto 0 auto;
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 2px 8px rgba(71,61,131,0.07);
            padding: 32px 24px;
            text-align: center;
        }
        .testimonial-section .quote {
            font-size: 1.1em;
            color: #1e293b;
            margin-bottom: 1em;
        }
        .testimonial-section .author {
            color: #473d83;
            font-weight: 600;
            font-size: 1em;
        }
        @media (max-width: 900px) {
            .main-section {
                flex-direction: column;
                gap: 24px;
                margin-top: 90px;
            }
            .main-left, .main-center {
                max-width: 98vw;
                min-width: 0;
            }
        }
        @media (max-width: 600px) {
            .main-left h1 {
                font-size: 1.2em;
            }
            .main-left {
                padding: 0 2vw;
            }
            .main-center img {
                max-width: 95vw;
            }
        }
    </style>
</head>
<body>
    <div class="navbar">
        <div class="logo">
            <img src="favicon.ico" alt="logo_dep"> DEP - MINSANTE
        </div>
        <nav>
            <div class="dropdown">
                <button>Fonctionnalités <i class="fa fa-chevron-down" style="font-size:0.8em;"></i></button>
                <div class="dropdown-content">
                    <a href="#">QR code de dossier</a>
                    <a href="#">GED/Boîte à plans</a>
                    <a href="#">Planning des travaux</a>
                    <a href="#">Contrôle qualité</a>
                    <a href="#">Suivi de l'avancement</a>
                </div>
            </div>
            <a href="#">Tarifs</a>
            <div class="dropdown">
                <button>Ressources <i class="fa fa-chevron-down" style="font-size:0.8em;"></i></button>
                <div class="dropdown-content">
                    <a href="#">Boîte à outils</a>
                    <a href="#">F.A.Q</a>
                    <a href="#">Documentation</a>
                </div>
            </div>
        </nav>
        <div class="actions">
            <a href="/connexion" class="btn">Se connecter</a>
            <a href="/s'inscrire" class="btn primary">Essayer DEP</a>
        </div>
    </div>
    <div class="main-section">
        <div class="main-left">
            <h1>La plateforme pour piloter vos dossiers.</h1>
            <p>Anticipez les problèmes, évitez les retards et travaillez plus sereinement.<br>
            <span style="color: #473d83; font-size:1.1em;">Essayez gratuitement pendant 14 jours.</span></p>
            <a href="/s'inscrire" class="btn primary">Essayer DEP</a>
        </div>
        <div class="main-center">
            <img src="/build/flux_dossier.png" alt="Aperçu application DEP">
        </div>
    </div>
    <div class="testimonial-section">
        <div class="quote">
            “Pour notre équipe, DEP est un outil de travail. On planifie les tâches, on suit l’avancement, et tout se met à jour dans le planning. Cela permet de savoir exactement où on en est.”
        </div>
        <div class="author">
            Florent<br>
            Ingénieur Projets
        </div>
    </div>
</body>
</html>