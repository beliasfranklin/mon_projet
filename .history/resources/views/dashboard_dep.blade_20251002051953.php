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
    <link rel="icon" href="logo-minsante.png" type="image/x-icon">
    <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
    <title>Dashboard - DEP MINSANTE</title>
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

        .menus li a{
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
        }

        /* Stats containers */
        .conteneurs-stats-users{
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin-bottom: 30px;
        }

        .conteneurs-stats-users div{
            flex: 1;
            min-width: 250px;
            height: 200px;
            background: white;
            color: var(--primary-color);
            font-weight: bold;
            font-size: 18px;
            padding: 20px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 8px;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            text-align: center;
        }

        .conteneurs-stats-users div span{
            font-size: 60px;
            margin-top: 10px;
            display: block;
        }

        /* Titres des sections */
        .users-ext, .users-dep, .users-cpp, .users-cei{
            font-size: 28px;
            font-weight: bold;
            color: var(--primary-color);
            margin: 30px 0 15px 0;
            display: block;
        }

        /* Tables */
        .table-container {
            overflow-x: auto;
            margin: 20px 0;
            background: white;
            border-radius: 8px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }

        table{
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        table th{
            background-color: var(--primary-color);
            color: var(--text-color);
            padding: 15px 10px;
            text-align: center;
            font-weight: bold;
        }

        table td{
            padding: 12px 10px;
            text-align: center;
            border-bottom: 1px solid #ddd;
        }

        table tr:nth-child(even) {
            background-color: #f8f9fa;
        }

        table tr:hover {
            background-color: #e9ecef;
        }

        /* Actions */
        .actions-list {
            display: flex;
            justify-content: center;
            align-items: center;
            list-style: none;
            padding: 0;
            margin: 0;
            flex-wrap: wrap;
            gap: 8px;
        }

        .actions-list li{
            background-color: var(--primary-color);
            color: var(--text-color);
            padding: 8px 12px;
            border-radius: 4px;
            font-weight: bold;
            cursor: pointer;
            transition: background-color 0.3s;
            font-size: 14px;
            display: flex;
            align-items: center;
            gap: 5px;
            white-space: nowrap;
        }

        .actions-list li:hover{
            background-color: rgb(79, 55, 236);
        }

        .actions-list a{
            text-decoration: none;
            color: inherit;
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
            
            .users-ext, .users-dep, .users-cpp, .users-cei {
                font-size: 24px;
            }
            
            .conteneurs-stats-users div {
                min-width: 200px;
                height: 180px;
                font-size: 16px;
            }
            
            .conteneurs-stats-users div span {
                font-size: 50px;
            }
        }

        @media (max-width: 768px) {
            .users-ext, .users-dep, .users-cpp, .users-cei {
                font-size: 20px;
            }
            
            .conteneurs-stats-users {
                flex-direction: column;
            }
            
            .conteneurs-stats-users div {
                min-width: auto;
                width: 100%;
            }
            
            .barre {
                font-size: 20px;
            }
            
            .barre span {
                font-size: 16px;
            }
            
            table th, table td {
                padding: 10px 8px;
                font-size: 14px;
            }
            
            .actions-list {
                flex-direction: column;
                align-items: stretch;
            }
            
            .actions-list li {
                justify-content: center;
            }
        }

        @media (max-width: 576px) {
            .historiques {
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
                padding: 10px 50px 10px 10px;
                flex-direction: column;
                gap: 5px;
                align-items: flex-start;
            }
            
            .barre span {
                font-size: 14px;
            }
            
            .conteneurs-stats-users div {
                height: 150px;
                padding: 15px;
            }
            
            .conteneurs-stats-users div span {
                font-size: 40px;
            }
            
            /* Table responsive pour mobile */
            .table-container {
                border-radius: 0;
                margin: 20px -15px;
                width: calc(100% + 30px);
            }
            
            table {
                min-width: 100%;
            }
            
            table thead {
                display: none;
            }
            
            table tr {
                display: block;
                margin-bottom: 15px;
                border: 1px solid #ddd;
                border-radius: 8px;
                background: white;
                padding: 10px;
            }
            
            table td {
                display: block;
                text-align: left;
                padding: 8px 15px 8px 40%;
                position: relative;
                border-bottom: 1px solid #eee;
            }
            
            table td:last-child {
                border-bottom: none;
            }
            
            table td:before {
                content: attr(data-label);
                position: absolute;
                left: 15px;
                width: 35%;
                font-weight: bold;
                color: var(--primary-color);
            }
            
            .actions-list {
                flex-direction: row;
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .actions-list li {
                flex: 1;
                min-width: 120px;
                justify-content: center;
                text-align: center;
            }
        }

        /* Badge de statut de connexion */
        .status-connected {
            color: #10b981;
            font-weight: bold;
        }

        .status-disconnected {
            color: #ef4444;
            font-weight: bold;
        }

        .role-badge {
            font-size: 12px;
            background: rgba(255,255,255,0.2);
            padding: 2px 8px;
            border-radius: 12px;
            margin-left: 5px;
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
            <img src="logo-minante.png" alt="logo-minsante" class="logo-minsante">
            <span>DEP-MINSANTE</span>
            <!-- nav bar de l'administrateur-->
            @if($user->id==$users_roles->id_user && $users_roles->id_role==00)
                <span style="font-size: 14px;">ADMIN</span>
                <ul class="menus">
                    <li><a href="/dashboard_dep"><i class="fa-solid fa-gauge"></i>Tableau de bord</a></li>
                    <li><a href="/historiques"><i class="fa-solid fa-clock-rotate-left"></i>Consulter Historiques</a></li>
                    <li><a href="/gerer_utilisateurs"><i class="fa-solid fa-users"></i>Gérer Utilisateurs</a></li>
                    <li><a href="/se deconnecter/{{$user->id}}" onclick="seDeconnecter(event)"><span style="color: #ff0000;"><i class="fa-solid fa-right-from-bracket" style="color: #ff0000;"></i>Se deconnecter</span></a></li>
                </ul>
            @endif
            <!-- navbar du Ministre -->
            @if($user->id==$users_roles->id_user && $users_roles->id_role==26)
                <span style="font-size: 14px;">Mr le Ministre</span>
                <ul class="menus">
                    <li><a href="/dashboard_dep"><i class="fa-solid fa-gauge"></i>Tableau de bord</a></li>
                    <li><a href="/ministre_envoyer_dossier_interne"><i class="fa-solid fa-paper-plane"></i>Envoyer dossier interne</a></li>
                    <li><a href="/se deconnecter/{{$user->id}}" onclick="seDeconnecter(event)"><span style="color: #ff0000;"><i class="fa-solid fa-right-from-bracket" style="color: #ff0000;"></i>Se deconnecter</span></a></li>
                </ul>
            @endif
            <!-- nav bar de l'usager externe-->
            @if($user->id==$users_roles->id_user && $users_roles->id_role==00)
                <span style="font-size: 14px;">Usager Externe</span>
                <ul class="menus">
                    <li><a href="/dashboard_dep"><i class="fa-solid fa-gauge"></i>Tableau de bord</a></li>
                    <li><a href="/usager_externe_envoyer_dossier_externe"><i class="fa-solid fa-paper-plane"></i>Envoyer dossier externe</a></li>
                    <li><a href="/consulter_résultats"><i class="fa-solid fa-bell"></i>Consulter résultats</a></li>
                    <li><a href="/se deconnecter/{{$user->id}}" onclick="seDeconnecter(event)"><span style="color: #ff0000;"><i class="fa-solid fa-right-from-bracket" style="color: #ff0000;"></i>Se deconnecter</span></a></li>
                </ul>
            @endif
            <!-- nav bar du membre du courrier de la DEP-->
            @if ($user->id==$users_roles->id_user && $users_roles->id_role==00)
                <span style="font-size: 14px;">Courrier DEP</span>
                <ul class="menus">
                    <li><a href="/dashboard_dep"><i class="fa-solid fa-gauge"></i>Tableau de bord</a></li>
                    <li><a href="/courrier_dep_voir_dossier_externe"><i class="fa-solid fa-inbox"></i>Consulter dossiers recus</a></li>
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

    @php
        use App\Models\User;
        use App\Models\StatutConnexion;
        use App\Models\Dossier;
        use App\Models\PiecesJointes;
        $nb_total_dossiers_internes_envoyes=Dossier::where('typeDossier','interne')->where('statutDossier','recu par dep')->count();
        $dossiers_internes=Dossier::where('statutDossier','interne')->get();
        $pieces=PiecesJointes::all();
        $conn=StatutConnexion::where('estConnecte',1)->count();
        $users=User::all();
    @endphp

    <!-- espace de travail de l'admin-->
    @if($user->id==$users_roles->id_user && $users_roles->id_role==00)
        <div class="espace_travail">
            <div class="conteneurs-stats-users">
                <div>
                    Nombres d'utilisateurs
                    <span>{{$users->count()}}</span>
                </div>
                <div>
                    Nombres d'utilisateurs connectés
                    <span>{{$conn}}</span>  
                </div>
            </div>

            
               
    @endif

    <!-- espace de travail du ministre-->
    @if ($user->id==$users_roles->id_user && $users_roles->id_role==26)
       <div class="espace_travail">
            <div class="conteneurs-stats-users">
                <div>
                    Nombres total de dossiers internes envoyés
                    <span>{{$nb_total_dossiers_internes_envoyes}}</span>
                </div>
            </div>

            <span class="users-ext">Tous les dossiers internes envoyés</span>
            <div class="table-container">
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NumeroMinistre</th>
                            <th>Intitulé</th>
                            <th>Date et heure d'envoi</th>
                            <th>Type dossier</th>
                            <th>Priorité</th>
                            <th>Commentaires</th>
                            <th>Actions</th>
                        </tr>      
                    </thead>
                    <tbody>
                        @foreach ($dossiers_internes as $d)
                            <tr>
                                <td data-label="#">{{$d->id}}</td>
                                <td data-label="NumeroMinistre">{{$d->numeroMinistre}}</td>
                                <td data-label="Intitulé">{{$d->intitule}}</td>
                                <td data-label="Date et heure d'envoi">{{$d->dateHeureEnvoiMinistre}}</td>
                                <td data-label="Type dossier">{{$d->typeDossier}}</td>
                                <td data-label="Priorité">{{$d->priorite}}</td>
                                <td data-label="Commentaires">{{$d->commentaires}}</td>
                                <td data-label="Actions">
                                    <ul class="actions-list">
                                        <a href="/ministre_voir_dossier_interne/{{$d->id}}">
                                            <li><i class="fa-solid fa-eye"></i>Voir détails</li>
                                        </a>
                                    </ul>
                                </td>
                            </tr> 
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    @endif

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
    </script>
</body>
</html>