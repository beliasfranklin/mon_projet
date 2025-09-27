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
    <title>Accueil - DEP MINSANTE</title>
</head>
<style>
    body {
        font-family: 'Afacad Flux', 'Rubik', sans-serif;
        margin: 0;
        background-color: rgb(236, 246, 246);
    }
    .barre {
        background: linear-gradient(90deg, #e9e6fa 0%, #f6f6ff 100%);
        min-height: 62px;
        box-shadow: 0 2px 8px 0 rgba(71,61,131,0.07);
        position: fixed;
        width: 100vw;
        z-index: 1000;
        top: 0;
        display: flex;
        align-items: center;
        justify-content: space-between;
        padding: 0 2vw;
        border-bottom: 1.5px solid #e0e0f0;
    }
    .titre {
        font-size: 1.35em;
        display: flex;
        align-items: center;
        gap: 10px;
        font-weight: 700;
        color: #473d83;
        letter-spacing: 0.5px;
    }
    .menus {
        list-style: none;
        display: flex;
        gap: 2vw;
        margin: 0;
        padding: 0;
        align-items: center;
    }
    .menus li {
        font-weight: 500;
        cursor: pointer;
        color: #473d83;
        transition: color 0.2s, border-bottom 0.2s;
        padding-bottom: 2px;
        border-bottom: 2px solid transparent;
    }
    .menus li:hover {
        color: #1e293b;
        border-bottom: 2px solid #473d83;
    }
    .auth {
        display: flex;
        gap: 18px;
        align-items: center;
        justify-content: flex-end;
        margin-right: 10px;
    }
    .auth a {
        text-decoration: none;
        display: flex;
        align-items: center;
    }
    .auth button {
        min-width: 120px;
        max-width: 100vw;
        width: 130px;
        height: 42px;
        border-radius: 8px;
        font-size: 1.08em;
        font-weight: 500;
        cursor: pointer;
        box-shadow: 0 2px 8px rgba(71,61,131,0.07);
        transition: background 0.2s, color 0.2s, box-shadow 0.2s;
        border: 2px solid darkslateblue;
        overflow: visible;
        white-space: nowrap;
    }
    #login {
        background-color: darkslateblue;
        color: white;
    }
    #register {
        background-color: white;
        color: darkslateblue;
    }
    #register:hover {
        background-color: darkslateblue;
        color: white;
        box-shadow: 0 4px 16px rgba(71,61,131,0.13);
    }
    #login:hover {
        background-color: white;
        color: darkslateblue;
        box-shadow: 0 4px 16px rgba(71,61,131,0.13);
    }
    .conteneur1 {
        min-height: 320px;
        margin-top: 90px;
        background: white;
        display: flex;
        flex-direction: column;
        align-items: center;
        justify-content: center;
        padding: 2vw 4vw 2vw 4vw;
        border-radius: 18px;
        box-shadow: 0 4px 24px 0 rgba(71,61,131,0.08);
        max-width: 900px;
        margin-left: auto;
        margin-right: auto;
        margin-bottom: 30px;
    }
    .bienvenue {
        font-size: 2em;
        color: #473d83;
        margin-bottom: 0.4em;
        text-align: center;
        font-weight: 700;
        letter-spacing: 0.5px;
    }
    .description_bienvenue {
        font-size: 1.15em;
        color: #1e293b;
        text-align: center;
        margin-bottom: 1.2em;
        max-width: 700px;
    }
    .services-section {
        background: linear-gradient(90deg, #f6f6ff 0%, #e9e6fa 100%);
        padding: 40px 0 20px 0;
        display: flex;
        flex-wrap: wrap;
        justify-content: center;
        gap: 30px;
        border-radius: 18px;
        margin-bottom: 30px;
        box-shadow: 0 2px 8px rgba(71,61,131,0.06);
    }
    .service-card {
        background: white;
        border-radius: 14px;
        box-shadow: 0 2px 8px rgba(71,61,131,0.07);
        padding: 32px 22px 28px 22px;
        width: 260px;
        text-align: center;
        transition: transform 0.2s, box-shadow 0.2s;
        border: 1.5px solid #ece9fa;
    }
    .service-card:hover {
        transform: translateY(-8px) scale(1.03);
        box-shadow: 0 8px 24px rgba(71,61,131,0.13);
        border-color: #bdb6e6;
    }
    .service-card i {
        font-size: 2.3em;
        color: #473d83;
        margin-bottom: 10px;
    }
    .service-title {
        font-size: 1.13em;
        font-weight: bold;
        margin-bottom: 8px;
        color: #473d83;
    }
    .service-desc {
        font-size: 0.98em;
        color: #555;
    }
    .about-section, .contact-section {
        max-width: 900px;
        margin: 40px auto 0 auto;
        background: white;
        border-radius: 14px;
        box-shadow: 0 2px 8px rgba(71,61,131,0.07);
        padding: 32px 24px;
        margin-bottom: 30px;
    }
    .about-section h2, .contact-section h2 {
        color: #473d83;
        margin-bottom: 12px;
        font-weight: 700;
        letter-spacing: 0.5px;
    }
    .about-section p, .contact-section p {
        color: #1e293b;
        font-size: 1.08em;
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
            align-items: center;
        }
        .auth {
            margin-top: 12px;
            margin-bottom: 8px;
            margin-right: 0;
            justify-content: center;
        }
        .auth button {
            width: 90vw;
            max-width: 320px;
            min-width: 120px;
            margin-bottom: 4px;
            overflow: visible;
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
            <img src="logo-minsante.png" alt="logo_dep" style="width:38px;vertical-align:middle;"> DEP - MINSANTE
        </span>
        <ul class="menus">
            <li><a href="#" style="text-decoration:none;color:inherit;">Accueil</a></li>
            <li><a href="#fonctionnement" style="text-decoration:none;color:inherit;">Fonctionnement</a></li>
            <li><a href="#services" style="text-decoration:none;color:inherit;">Services</a></li>
            <li><a href="#contact" style="text-decoration:none;color:inherit;">Contact</a></li>
        </ul>
        <div class="auth">
            <a href="/s'inscrire"><button id="register">S'inscrire</button></a>
            <a href="/connexion"><button id="login">Se connecter</button></a>
        </div>
    </div>
    <div class="conteneur1">
    <h2 class="bienvenue">Bienvenue sur la plateforme de gestion des dossiers du Ministère de la Santé Publique du Cameroun</h2>
    <p class="description_bienvenue">Ce système moderne est conçu pour les agents du ministère <b>et pour les utilisateurs externes</b> (partenaires, citoyens, institutions). Il permet de gérer efficacement les dossiers internes et externes, d'assurer leur traçabilité, et d'automatiser la communication entre toutes les parties prenantes.</p>
    </div>
    <div class="about-section" id="fonctionnement">
        <h2>Fonctionnement du système</h2>
        <ul style="font-size:1.1em;line-height:1.7;color:#1e293b;">
            <li><b>Dossiers internes :</b> Initiés par le Ministre, envoyés à la DEP qui attribue un numéro, puis côté à la CPP ou CEI (sous-directions de la DEP). Un membre reçoit le dossier avec instruction et notification WhatsApp. Chaque étape enregistre la date d'envoi, de réception, l'heure et le responsable.</li>
            <li><b>Dossiers externes :</b> Les utilisateurs externes (citoyens, partenaires, institutions) peuvent soumettre directement leurs dossiers au courrier de la DEP, qui les intègre dans le circuit de traitement et de suivi.</li>
            <li><b>Traçabilité :</b> Le système enregistre qui possède le dossier, les dates/heures de chaque transfert, et le nombre de jours passés chez chaque membre.</li>
            <li><b>Validation :</b> Un dossier est considéré comme traité lorsqu'il a suivi toutes les étapes et a été validé par le dernier membre responsable.</li>
            <li><b>Notifications :</b> Lorsqu'un dossier est côté à un membre de la CPP ou CEI, il reçoit automatiquement la notification et le dossier par WhatsApp.</li>
            <li><b>Accès pour les externes :</b> Les utilisateurs externes peuvent suivre l'état de leur dossier, recevoir des notifications et interagir avec l'administration via la plateforme.</li>
        </ul>
        <div style="margin:30px 0;text-align:center;">
            <img src="/build/flux_dossier.png" alt="Schéma de flux des dossiers" style="max-width:100%;height:auto;border-radius:10px;box-shadow:0 2px 8px rgba(0,0,0,0.07);">
            <div style="font-size:0.95em;color:#555;margin-top:8px;">Schéma simplifié du cheminement d'un dossier interne et externe</div>
        </div>
    </div>
    <div class="services-section" id="statistiques">
        <div class="service-card">
            <i class="fa-solid fa-building"></i>
            <div class="service-title">Tableau de bord par structure</div>
            <div class="service-desc">Visualisez la situation des dossiers par structure (DEP, CPP, CEI), le nombre total de dossiers, et leur état (traité, en instance, en correction).</div>
        </div>
        <div class="service-card">
            <i class="fa-solid fa-user-check"></i>
            <div class="service-title">Suivi individuel</div>
            <div class="service-desc">Consultez le nombre de dossiers traités par chaque membre, le temps moyen de traitement, et les dossiers en cours.</div>
        </div>
        <div class="service-card">
            <i class="fa-solid fa-clock"></i>
            <div class="service-title">Temps de traitement</div>
            <div class="service-desc">Le système calcule le nombre de jours passés par dossier chez chaque membre, pour optimiser la gestion et la réactivité.</div>
        </div>
        <div class="service-card">
            <i class="fa-brands fa-whatsapp"></i>
            <div class="service-title">Notification WhatsApp</div>
            <div class="service-desc">Dès qu'un dossier est attribué à un membre, il reçoit instantanément la notification et le dossier par WhatsApp.</div>
        </div>
        <div class="service-card">
            <i class="fa-solid fa-globe"></i>
            <div class="service-title">Espace Externes</div>
            <div class="service-desc">Les utilisateurs externes disposent d'un espace dédié pour soumettre, suivre et recevoir des notifications sur leurs dossiers.</div>
        </div>
    </div>
    <div class="about-section" id="about">
        <h2>À propos du projet</h2>
        <p>Ce système a été conçu pour répondre aux besoins spécifiques du Ministère de la Santé Publique du Cameroun, en modernisant la gestion documentaire, en renforçant la traçabilité et la sécurité, et en facilitant la collaboration entre les différentes entités (DEP, CPP, CEI) <b>et les utilisateurs externes</b>.</p>
        <ul style="font-size:1.05em;color:#1e293b;line-height:1.6;">
            <li>La DEP est une sous-structure du Ministère, responsable de la création et de l'attribution initiale des dossiers.</li>
            <li>La CPP et la CEI sont les sous-directions qui reçoivent et traitent les dossiers, puis les attribuent à leurs membres.</li>
            <li>Les utilisateurs externes peuvent interagir avec l'administration, soumettre et suivre leurs dossiers en toute transparence.</li>
            <li>Un dossier traité a suivi toutes les étapes et a été validé par le dernier membre responsable.</li>
        </ul>
    </div>
    <div class="contact-section" id="contact">
        <h2>Contact</h2>
        <p><i class="fa-solid fa-envelope"></i> Email : dep-minsante@example.com</p>
        <p><i class="fa-solid fa-phone"></i> Téléphone : +237 699 00 00 00</p>
        <p><i class="fa-solid fa-location-dot"></i> Adresse : Yaoundé, Cameroun</p>
    </div>
</body>
</html>