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

        @php
            // Ces variables doivent être passées par le contrôleur :
            // $userCount, $activeUsers, $recentActions, $blockedUsers, $notifications, $chartLabels, $chartData, $rolesLabels, $rolesData
        @endphp
        <!DOCTYPE html>
        <html lang="fr">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Dashboard Administrateur - DEP</title>
            <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
            <link rel="stylesheet" href="connexion-style.css"/>
            <link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Afacad+Flux:wght@100..1000&family=Rubik:ital,wght@0,300..900;1,300..900&display=swap" rel="stylesheet">
            <link rel="icon" href="logo-minsante.png" type="image/x-icon">
            <style>
                body {
                    font-family: 'Afacad Flux', 'Rubik', sans-serif;
                    margin: 0;
                    background: linear-gradient(120deg, #f6f6ff 0%, #e9e6fa 100%);
                    color: #1e293b;
                }
                .dashboard-container {
                    max-width: 1200px;
                    margin: 40px auto;
                    background: #fff;
                    border-radius: 18px;
                    box-shadow: 0 2px 12px rgba(71,61,131,0.09);
                    padding: 32px 24px;
                }
                h1 {
                    color: #473d83;
                    font-size: 2.2em;
                    font-weight: 700;
                    margin-bottom: 18px;
                    text-align: center;
                }
                .stats-row {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 24px;
                    margin-bottom: 32px;
                    justify-content: center;
                }
                .stat-card {
                    flex: 1 1 220px;
                    background: #ede9fe;
                    border-radius: 12px;
                    padding: 24px 18px;
                    text-align: center;
                    color: #473d83;
                    box-shadow: 0 2px 8px rgba(71,61,131,0.06);
                }
                .stat-card h2 {
                    font-size: 2.1em;
                    margin: 0 0 8px 0;
                }
                .stat-card p {
                    margin: 0;
                    font-size: 1.1em;
                }
                .quick-links {
                    display: flex;
                    gap: 18px;
                    margin-bottom: 32px;
                    justify-content: center;
                }
                .quick-link {
                    background: darkslateblue;
                    color: #fff;
                    border-radius: 8px;
                    padding: 18px 28px;
                    font-size: 1.1em;
                    font-weight: 600;
                    text-decoration: none;
                    transition: background 0.2s;
                }
                .quick-link:hover {
                    background: #473d83;
                }
                .charts-row {
                    display: flex;
                    flex-wrap: wrap;
                    gap: 24px;
                    margin-bottom: 32px;
                    justify-content: center;
                }
                .chart-card {
                    flex: 1 1 350px;
                    background: #f6f6ff;
                    border-radius: 12px;
                    padding: 18px 12px;
                    box-shadow: 0 2px 8px rgba(71,61,131,0.06);
                }
                .notifications {
                    background: #ede9fe;
                    border-radius: 12px;
                    padding: 18px 18px;
                    margin-bottom: 18px;
                    color: #473d83;
                    box-shadow: 0 2px 8px rgba(71,61,131,0.06);
                }
                @media (max-width: 900px) {
                    .dashboard-container { padding: 12px 4vw; }
                    .stats-row, .charts-row, .quick-links { flex-direction: column; gap: 16px; }
                }
                @media (max-width: 600px) {
                    .dashboard-container { padding: 6px 2vw; }
                    h1 { font-size: 1.2em; }
                }
            </style>
        </head>
        <body>
            <div class="dashboard-container">
                <h1><i class="fa-solid fa-gauge"></i> Tableau de bord Administrateur</h1>
                <div class="stats-row">
                    <div class="stat-card">
                        <h2>{{ $userCount ?? 0 }}</h2>
                        <p>Utilisateurs inscrits</p>
                    </div>
                    <div class="stat-card">
                        <h2>{{ $activeUsers ?? 0 }}</h2>
                        <p>Utilisateurs actifs</p>
                    </div>
                    <div class="stat-card">
                        <h2>{{ $recentActions ?? 0 }}</h2>
                        <p>Actions récentes</p>
                    </div>
                    <div class="stat-card">
                        <h2>{{ $blockedUsers ?? 0 }}</h2>
                        <p>Utilisateurs bloqués</p>
                    </div>
                </div>
                <div class="quick-links">
                    <a href="/gerer_utilisateurs" class="quick-link"><i class="fa-solid fa-users"></i> Gérer Utilisateurs</a>
                    <a href="/historiques" class="quick-link"><i class="fa-solid fa-clock-rotate-left"></i> Historiques</a>
                    <a href="/reporting" class="quick-link"><i class="fa-solid fa-chart-line"></i> Reporting</a>
                    <a href="/settings" class="quick-link"><i class="fa-solid fa-gear"></i> Paramètres</a>
                </div>
                <div class="charts-row">
                    <div class="chart-card">
                        <h3>Statistiques d'utilisation</h3>
                        <canvas id="usageChart"></canvas>
                    </div>
                    <div class="chart-card">
                        <h3>Répartition des rôles</h3>
                        <canvas id="rolesChart"></canvas>
                    </div>
                </div>
                <div class="notifications">
                    <h4>Notifications importantes</h4>
                    <ul>
                        @foreach($notifications ?? [] as $notif)
                            <li>{{ $notif }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
            <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
            <script>
                var ctx = document.getElementById('usageChart').getContext('2d');
                var usageChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                        labels: {!! json_encode($chartLabels ?? []) !!},
                        datasets: [{
                            label: 'Utilisation',
                            data: {!! json_encode($chartData ?? []) !!},
                            backgroundColor: 'rgba(54, 162, 235, 0.2)',
                            borderColor: 'rgba(54, 162, 235, 1)',
                            borderWidth: 1
                        }]
                    },
                    options: {
                        responsive: true,
                        scales: {
                            y: { beginAtZero: true }
                        }
                    }
                });
                var ctx2 = document.getElementById('rolesChart').getContext('2d');
                var rolesChart = new Chart(ctx2, {
                    type: 'doughnut',
                    data: {
                        labels: {!! json_encode($rolesLabels ?? []) !!},
                        datasets: [{
                            data: {!! json_encode($rolesData ?? []) !!},
                            backgroundColor: [
                                'rgba(54, 162, 235, 0.7)',
                                'rgba(255, 99, 132, 0.7)',
                                'rgba(255, 206, 86, 0.7)',
                                'rgba(75, 192, 192, 0.7)',
                                'rgba(153, 102, 255, 0.7)'
                            ]
                        }]
                    },
                    options: {
                        responsive: true
                    }
                });
            </script>
        </body>
        </html>
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
            @if($user->id==$users_roles->id_user && $users_roles->id_role==26)
                <span style="font-size: 14px;">ADMIN</span>
                <ul class="menus">
                    <li><a href="/dashboard_dep"><i class="fa-solid fa-gauge"></i>Tableau de bord</a></li>
                    <li><a href="/historiques"><i class="fa-solid fa-clock-rotate-left"></i>Consulter Historiques</a></li>
                    <li><a href="/gerer_utilisateurs"><i class="fa-solid fa-users"></i>Gérer Utilisateurs</a></li>
                    <li><a href="/se deconnecter/{{$user->id}}" onclick="seDeconnecter(event)"><span style="color: #ff0000;"><i class="fa-solid fa-right-from-bracket" style="color: #ff0000;"></i>Se deconnecter</span></a></li>
                </ul>
            @endif
            <!-- navbar du Ministre -->
            @if($user->id==$users_roles->id_user && $users_roles->id_role==00)
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
        $nb_total_dossiers_internes_envoyes=Dossier::where('statutDossier','interne')->count();
        $dossiers_internes=Dossier::where('statutDossier','interne')->get();
        $pieces=PiecesJointes::all();
        $conn=StatutConnexion::where('estConnecte',1)->count();
        $users=User::all();
    @endphp

    <!-- espace de travail de l'admin-->
    @if($user->id==$users_roles->id_user && $users_roles->id_role==26)
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
    @if ($user->id==$users_roles->id_user && $users_roles->id_role==00)
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