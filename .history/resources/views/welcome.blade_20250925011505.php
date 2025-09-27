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
    <link rel="icon" href="user_2321232.png">
    <title>Accueil - DEP MINSANTE</title>
</head>
<style>
    body {
        font-family: 'Afacad Flux', 'Rubik', sans-serif;
        margin: 0;
        background-color: rgb(236, 246, 246);
    }
    .barre {
        background-color: lavender;
        min-height: 70px;
        box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        position: fixed;
        width: 100vw;
        z-index: 1000;
        top: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 2vw;
    }
    .titre {
        font-size: 1.5em;
        display: flex;
        align-items: center;
        gap: 10px;
    }
    .menus {
        list-style: none;
        display: flex;
        gap: 2vw;
        margin: 0;
        padding: 0;
    }
    .menus li {
        font-weight: bold;
        cursor: pointer;
        color: #473d83;
        transition: color 0.2s;
    }
    .menus li:hover {
        color: #1e293b;
    }
    .auth {
        display: flex;
        gap: 10px;
        align-items: center;
    }
    .auth button {
        width: 110px;
        height: 38px;
        border-radius: 6px;
        font-size: 1em;
        cursor: pointer;
    }
    #login {
        background-color: darkslateblue;
        color: white;
        border: solid 1.5px darkslateblue;
    }
    #register {
        background-color: white;
        color: darkslateblue;
        border: solid 1.5px darkslateblue;
    }
    #register:hover {
        background-color: darkslateblue;
        color: white;
        transition: 0.3s;
    }
    #login:hover {
        background-color: white;
        color: darkslateblue;
        transition: 0.3s;
    }
    .conteneur1 {
        min-height: 350px;
        margin-top: 110px;
        background-color: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 2vw 4vw;
        border-radius: 18px;
        box-shadow: 0 4px 24px 0 rgba(0,0,0,0.08);
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
    }
    .bienvenue {
        font-size: 2.2em;
        color: #473d83;
        margin-bottom: 0.5em;
        text-align: center;
    }
    .description_bienvenue {
        font-size: 1.2em;
        color: #1e293b;
        text-align: center;
        margin-bottom: 1.5em;
    }
    .services-section {
        background: #f6f6ff;
        padding: 40px 0 20px 0;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 30px;
    }
    .service-card {
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        padding: 30px 24px;
        width: 260px;
        text-align: center;
        transition: transform 0.2s;
    }
    .service-card:hover {
        transform: translateY(-8px) scale(1.03);
    }
    .service-card i {
        font-size: 2.5em;
        color: #473d83;
        margin-bottom: 10px;
    }
    .service-title {
        font-size: 1.2em;
        font-weight: bold;
        margin-bottom: 8px;
    }
    .service-desc {
        font-size: 1em;
        color: #555;
    }
    .about-section, .contact-section {
        max-width: 900px;
        margin: 40px auto 0 auto;
        background: white;
        border-radius: 12px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.07);
        padding: 32px 24px;
    }
    .about-section h2, .contact-section h2 {
        color: #473d83;
        margin-bottom: 12px;
    }
    .about-section p, .contact-section p {
        color: #1e293b;
        font-size: 1.1em;
    }
    @media (max-width: 900px) {
        .conteneur1, .about-section, .contact-section {
            max-width: 98vw;
            padding: 2vw 2vw;
        }
        .barre {
            flex-direction: column;
            height: auto;
            padding: 10px 0;
        }
        .menus {
            flex-direction: column;
            gap: 10px;
        }
        .auth {
            margin-top: 10px;
            gap: 20px;
            
        }
    }
    @media (max-width: 600px) {
        .bienvenue {
            font-size: 1.3em;
        }
        .conteneur1 {
            padding: 2vw 1vw;
        }
        .service-card {
            width: 95vw;
        }
    }
</style>
<body>
    <div class="barre">
        <span class="titre">
            <img src="favicon.ico" alt="logo_dep" style="width:38px;vertical-align:middle;"> DEP - MINSANTE
        </span>
        <ul class="menus">
            <li><a href="#" style="text-decoration:none;color:inherit;">Accueil</a></li>
            <li><a href="#about" style="text-decoration:none;color:inherit;">À propos</a></li>
            <li><a href="#services" style="text-decoration:none;color:inherit;">Services</a></li>
            <li><a href="#contact" style="text-decoration:none;color:inherit;">Contacts</a></li>
        </ul>
        <div class="auth">
            <a href="/s'inscrire"><button id="register">S'inscrire</button></a>
            <a href="/connexion"><button id="login">Se connecter</button></a>
        </div>
    </div>
    <div class="conteneur1">
        <h2 class="bienvenue">Bienvenue sur notre plateforme de gestion de dossiers</h2>
        <p class="description_bienvenue">Un système moderne et efficace pour la gestion et le suivi des dossiers au sein de la Division des Études et des Projets.</p>
    </div>
    <div class="services-section" id="services">
        <div class="service-card">
            <i class="fa-solid fa-folder-open"></i>
            <div class="service-title">Gestion des dossiers</div>
            <div class="service-desc">Centralisez, suivez et archivez tous vos dossiers administratifs en toute sécurité.</div>
        </div>
        <div class="service-card">
            <i class="fa-solid fa-bell"></i>
            <div class="service-title">Notifications & Suivi</div>
            <div class="service-desc">Recevez des alertes et suivez l'évolution de chaque dossier en temps réel.</div>
        </div>
        <div class="service-card">
            <i class="fa-solid fa-users"></i>
            <div class="service-title">Gestion des utilisateurs</div>
            <div class="service-desc">Gérez les accès, les rôles et la sécurité de tous les membres de votre équipe.</div>
        </div>
        <div class="service-card">
            <i class="fa-solid fa-shield-halved"></i>
            <div class="service-title">Sécurité & Confidentialité</div>
            <div class="service-desc">Vos données sont protégées grâce à des protocoles de sécurité avancés.</div>
        </div>
    </div>
    <div class="about-section" id="about">
        <h2>À propos</h2>
        <p>La plateforme DEP-MINSANTE vise à moderniser la gestion des dossiers au sein de la Division des Études et des Projets. Elle offre une interface intuitive, des outils de suivi performants et une sécurité renforcée pour répondre aux besoins des agents et des responsables.</p>
    </div>
    <div class="contact-section" id="contact">
        <h2>Contact</h2>
        <p><i class="fa-solid fa-envelope"></i> Email : dep-minsante@example.com</p>
        <p><i class="fa-solid fa-phone"></i> Téléphone : +237 699 00 00 00</p>
        <p><i class="fa-solid fa-location-dot"></i> Adresse : Yaoundé, Cameroun</p>
    </div>
</body>
</html>