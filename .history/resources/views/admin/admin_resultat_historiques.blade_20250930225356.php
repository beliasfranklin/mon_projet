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
    <title>Historique des actions - DEP MINSANTE</title>
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
        }

        .historiques{
            font-size: 32px;
            color: var(--primary-color);
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .filtre, .liste-historiques, .date-filt{
            color: var(--primary-color);
            font-size: 24px;
            font-weight: bold;
            margin: 20px 0;
            display: block;
        }

        /* Formulaires de filtre */
        .filter-forms {
            display: flex;
            flex-wrap: wrap;
            gap: 20px;
            margin: 20px 0;
        }

        .filter-form {
            background: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            flex: 1;
            min-width: 300px;
        }

        #date_opt, #date_historiques, #heure_historiques {
            width: 100%;
            height: 40px;
            font-size: 16px;
            border: 2px solid #ddd;
            border-radius: 4px;
            padding: 0 10px;
            margin: 10px 0;
            font-family: inherit;
        }

        #date_opt:focus, #date_historiques:focus, #heure_historiques:focus {
            outline: none;
            border-color: var(--primary-color);
        }

        #bouton_filtre, #bouton_filtre2 {
            background-color: var(--primary-color);
            color: var(--text-color);
            border: none;
            border-radius: 4px;
            height: 40px;
            padding: 0 20px;
            font-family: 'Afacad flux', sans-serif;
            font-weight: bold;
            cursor: pointer;
            transition: opacity 0.3s;
            width: 100%;
            margin-top: 10px;
        }

        #bouton_filtre:hover, #bouton_filtre2:hover {
            opacity: 0.9;
        }

        /* Table */
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
            min-width: 600px;
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
            
            .historiques {
                font-size: 28px;
            }
            
            .filtre, .liste-historiques, .date-filt {
                font-size: 20px;
            }
        }

        @media (max-width: 768px) {
            .historiques {
                font-size: 24px;
            }
            
            .filtre, .liste-historiques, .date-filt {
                font-size: 18px;
            }
            
            .filter-forms {
                flex-direction: column;
                gap: 15px;
            }
            
            .filter-form {
                min-width: auto;
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
            
            .filter-form {
                padding: 15px;
            }
            
            #date_opt, #date_historiques, #heure_historiques {
                height: 35px;
                font-size: 14px;
            }
            
            #bouton_filtre, #bouton_filtre2 {
                height: 35px;
                font-size: 14px;
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
        }

        /* Styles pour les résultats de filtre */
        .filter-result-info {
            background: #e3f2fd;
            padding: 15px;
            border-radius: 8px;
            margin: 15px 0;
            border-left: 4px solid var(--primary-color);
        }

        .no-results {
            text-align: center;
            padding: 40px;
            color: #666;
            font-size: 18px;
        }

        .no-results i {
            font-size: 48px;
            margin-bottom: 15px;
            color: #ccc;
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
            <img src="favicon.svg" alt="logo-minsante" class="logo-minsante">
            <span>DEP-MINSANTE</span>
            @if($user->id==$users_roles->id_user && $users_roles->id_role==23)
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
        <div class="historiques">
            <i class="fa-solid fa-clock-rotate-left"></i>
            <span class="texte_historique">Historiques des actions</span>
        </div>
        
        <!-- Information sur le filtre actuel -->
        @if(isset($result) && $result)
        <div class="filter-result-info">
            <i class="fa-solid fa-filter"></i>
            Filtre actuel : <strong>{{ $result }}</strong>
            <a href="/historiques" style="margin-left: 15px; color: var(--primary-color); text-decoration: none;">
                <i class="fa-solid fa-times"></i> Supprimer le filtre
            </a>
        </div>
        @endif
        
        <div class="filter-forms">
            <form method="post" action="/resultat-filtre" class="filter-form">
                @csrf
                <span class="filtre">Filtrer historiques</span>
                <select name="date_opt" id="date_opt">
                    <option value="Aujourd'hui">Aujourd'hui</option>
                    <option value="Hier">Hier</option>
                    <option value="Il y'a 7 jours">Il y'a 7 jours</option>
                    <option value="Il y'a 1 mois">Il y'a 1 mois</option>
                    <option value="Il y'a 1 an">Il y'a 1 an</option>
                </select>
                <input type="submit" value="Filtrer" id="bouton_filtre">
            </form>
            
            <form method="post" action="/resultat-filtre-par-date-et-heure" class="filter-form">
                @csrf
                <span class="date-filt">Définir une date</span>
                <input type="date" name="date_historiques" id="date_historiques">
                <input type="time" name="heure_historiques" id="heure_historiques">
                <input type="submit" value="Filtrer par date et heure" id="bouton_filtre2">
            </form>
        </div>
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin: 20px 0;">
            <span class="liste-historiques">Liste des Historiques</span>
        </div>
        
        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Action</th>
                        <th>Effectué par</th>
                        <th>Email</th>
                        <th>Date et Heure</th>
                    </tr>      
                </thead>
                <tbody>
                    @php
                        $hasResults = false;
                    @endphp

                    @switch($result ?? '')
                        @case("Aujourd'hui")
                            @foreach ($hist as $action)
                                @if (date('d',strtotime(now()))==date('d',strtotime($action->created_at)) && date('m',strtotime(now()))==date('m',strtotime($action->created_at)) && date('y',strtotime(now()))==date('y',strtotime($action->created_at)))
                                    @php $hasResults = true; @endphp
                                    <tr>
                                        <td data-label="#">{{$action->id}}</td>
                                        <td data-label="Action">{{$action->nomAction}}</td>
                                        <td data-label="Effectué par">
                                            @foreach ($users_hist as $user)
                                                @if ($user->id==$action->id_user)
                                                    {{$user->name}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td data-label="Email">
                                            @foreach ($users_hist as $user)
                                                @if ($user->id==$action->id_user)
                                                    {{$user->email}}
                                                @endif
                                            @endforeach
                                        </td>
                                        <td data-label="Date et Heure">{{$action->created_at}}</td>
                                    </tr> 
                                @endif  
                            @endforeach
                            @break
                        @case('Hier')
                            <!-- Ajoutez votre logique pour Hier ici -->
                            @break
                        @default
                            <!-- Affichage de tous les historiques sans filtre -->
                            @foreach ($hist as $action)
                                @php $hasResults = true; @endphp
                                <tr>
                                    <td data-label="#">{{$action->id}}</td>
                                    <td data-label="Action">{{$action->nomAction}}</td>
                                    <td data-label="Effectué par">
                                        @foreach ($users_hist as $user)
                                            @if ($user->id==$action->id_user)
                                                {{$user->name}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td data-label="Email">
                                        @foreach ($users_hist as $user)
                                            @if ($user->id==$action->id_user)
                                                {{$user->email}}
                                            @endif
                                        @endforeach
                                    </td>
                                    <td data-label="Date et Heure">{{$action->created_at}}</td>
                                </tr> 
                            @endforeach
                    @endswitch

                    @if(!$hasResults)
                    <tr>
                        <td colspan="5">
                            <div class="no-results">
                                <i class="fa-solid fa-inbox"></i>
                                <div>Aucun historique trouvé</div>
                            </div>
                        </td>
                    </tr>
                    @endif
                </tbody>
            </table>
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

        // Pré-remplir les valeurs des filtres si elles existent
        document.addEventListener('DOMContentLoaded', function() {
            // Pré-remplir le select si un filtre est actif
            @if(isset($result) && $result)
                const dateOpt = document.getElementById('date_opt');
                if (dateOpt) {
                    for (let i = 0; i < dateOpt.options.length; i++) {
                        if (dateOpt.options[i].value === "{{ $result }}") {
                            dateOpt.options[i].selected = true;
                            break;
                        }
                    }
                }
            @endif
        });
    </script>
</body>
</html>