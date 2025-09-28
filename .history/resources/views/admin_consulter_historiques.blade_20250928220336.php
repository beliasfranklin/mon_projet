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
    <title>Historique des actions - DEP MINSANTE</title>
    <style>
        body{
            font-family: 'Afacad Flux', 'Rubik', sans-serif;
            margin: 0;
            background-color: rgb(236, 246, 246);
        }
        .conteneur_menus{
            height: 1080px;
            width: 300px;
            background-color: darkslateblue;
            position: fixed;
            left: 0px;
            top: 0px;
            color: white;
            font-weight: bold;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            z-index: 1000;
        }
        .conteneur_titre_logo_minsante{
            text-align: center;
            margin-top: 10px;
        }
        .logo-minsante{
            width: 120px;
            height: 120px;
        }
        .conteneur_titre_logo_minsante span{
            font-size: 25px;
        }
        .menus{
            list-style: none;
            padding: 0;
            margin-top: 80px;
        }
        .menus li{
            font-size: 20px;
            margin: 35px 0;
        }
        .menus li i{
            margin-right: 15px;
            width: 20px;
            height: 20px;
            font-size: 20px;
        }
        .menus li a {
            text-decoration: none;
            color: white;
        }
        .menus li:hover{
            background-color: rgb(79, 55, 236);
            height: 30px;
        }
        .barre{
            width: 1200px;
            height: 50px;
            background-color: lavender;
            margin-top: 0px;
            margin-left: 300px;
            padding: 20px;
            position: fixed;
            font-weight: bold;
            font-size: 40px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            z-index: 1000;
        }
        .barre span{
            font-size: 30px;
            margin-right: 5px;
        }
        .barre span,.barre i{
            float: right;
            color: darkslateblue;
        }
        .espace_travail{
            margin-left: 300px;
            position: absolute;
            top: 120px;
            left: 20px;
        }
        .conteneurs-stats-users{
            display: flex;
        }
        .historiques{
            font-size: 55px;
            color: darkslateblue;
            font-weight: bold;
        }
        .historiques .texte_historique{
            margin-left: 10px;
        }
        .filtre,.liste-historiques{
            color: darkslateblue;
            font-size: 30px;
            font-weight: bold;
        }
        .date-filt{
            font-size: 30px;
            color: darkslateblue;
            font-weight: bold;
        }
        #date_historiques{
            width: 200px;
            height: 30px;
            font-size: 20px;
            border-color: darkslateblue;
            margin-bottom: 10px;
        }
        #heure_historiques{
            height: 30px;
            font-size: 20px;
            border-color: darkslateblue;
        }
        #date_opt{
            width: 180px;
            height: 30px;
            font-size: 20px;
            border-color: darkslateblue;
            margin-bottom: 10px;
            font-family: 'Afacad Flux', 'Rubik', sans-serif;
        }
        #bouton_filtre2{
            background-color: darkslateblue;
            color: white;
            border: none;
            border-color: darkslateblue;
            width: 150px;
            height: 30px;
            font-family: 'Afacad flux', sans-serif;
            font-weight: bold;
        }
        #bouton_filtre{
            background-color: darkslateblue;
            color: white;
            border: none;
            border-color: darkslateblue;
            height: 30px;
            width: 100px;
            font-family: 'Afacad flux', sans-serif;
            font-weight: bold
        }
        table tbody{
            background-color: white;
        }
        table{
            width:  120%;
            height: 50%;
            border-collapse: collapse;
            border-style: none;
            border-top-left-radius: 30px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        table th{
            background-color: darkslateblue;
            color: white;
        }
        table th,td{
            text-align: center;
        }
        table tr:nth-child(even) {
            background-color: #f2f2f2; /* Lignes paires en gris clair */
        }
        /* Responsive styles */
        @media (max-width: 1200px) {
            .conteneur_menus {
                width: 200px;
            }
            .barre {
                margin-left: 200px;
                width: calc(100% - 200px);
                font-size: 28px;
            }
            .espace_travail {
                margin-left: 200px;
                width: calc(100% - 220px);
            }
            .historiques {
                font-size: 36px;
            }
        }
        @media (max-width: 900px) {
            .conteneur_menus {
                position: static;
                width: 100vw;
                height: auto;
                left: 0;
                top: 0;
                z-index: 1000;
                box-shadow: none;
                display: flex;
                flex-direction: row;
                align-items: center;
                justify-content: space-between;
                padding: 10px 0;
            }
            .conteneur_titre_logo_minsante {
                margin-top: 0;
                display: flex;
                align-items: center;
                gap: 10px;
            }
            .logo-minsante {
                width: 60px;
                height: 60px;
            }
            .menus {
                display: flex;
                flex-direction: row;
                margin-top: 0;
                gap: 10px;
            }
            .menus li {
                margin: 0 10px;
                font-size: 16px;
            }
            .barre {
                margin-left: 0;
                width: 100vw;
                left: 0;
                top: 80px;
                font-size: 22px;
                padding: 10px;
            }
            .espace_travail {
                margin-left: 0;
                top: 140px;
                left: 5vw;
                width: 90vw;
                position: relative;
            }
            table {
                min-width: 400px;
                font-size: 14px;
            }
            .historiques, .filtre, .liste-historiques, .date-filt {
                font-size: 22px;
            }
        }
        @media (max-width: 700px) {
            .conteneur_menus {
                flex-direction: column;
                align-items: flex-start;
                padding: 10px;
            }
            .conteneur_titre_logo_minsante {
                flex-direction: column;
                align-items: flex-start;
            }
            .logo-minsante {
                width: 40px;
                height: 40px;
            }
            .menus {
                flex-direction: column;
                gap: 0;
            }
            .menus li {
                margin: 8px 0;
                font-size: 14px;
            }
            .barre {
                top: 70px;
                font-size: 16px;
                padding: 8px;
            }
            .espace_travail {
                top: 120px;
                left: 2vw;
                width: 96vw;
                font-size: 13px;
            }
            table {
                min-width: 300px;
                font-size: 12px;
                overflow-x: auto;
                display: block;
            }
            table thead, table tbody, table tr, table th, table td {
                display: block;
            }
            table thead {
                display: none;
            }
            table tr {
                margin-bottom: 15px;
                border-bottom: 1px solid #ccc;
            }
            table td {
                text-align: left;
                padding-left: 50%;
                position: relative;
            }
            table td:before {
                position: absolute;
                left: 10px;
                width: 45%;
                white-space: nowrap;
                font-weight: bold;
            }
            table td:nth-child(1):before { content: "#"; }
            table td:nth-child(2):before { content: "Action"; }
            table td:nth-child(3):before { content: "Effectué par"; }
            table td:nth-child(4):before { content: "Email"; }
            table td:nth-child(5):before { content: "Date et Heure"; }
        }
</style>
</head>
<body>
    <div class="conteneur_menus">
        <div class="conteneur_titre_logo_minsante">
            <img src="logo-minsante.png" alt="logo-minsante" class="logo-minsante"><br>
            <span>DEP-MINSANTE</span><br>
            @if($user->id==$users_roles->id_user && $users_roles->id_role==23)
                <span class="font-size: 15px;">ADMIN</span>
                <ul class="menus">
                <li><a href="/dashboard_dep"><i class="fa-solid fa-gauge"></i>Tableau de bord</a></li>
                <li><a href="/historiques"><i class="fa-solid fa-clock-rotate-left"></i>Consulter Historiques</a></li>
                <li><i class="fa-solid fa-users"></i><a href="/gerer_utilisateurs">Gérer Utilisateurs</a></li>
                <li><a href="/se deconnecter/{{$user->id}}" onclick="seDeconnecter(event)"><span style="color: #ff0000;"><i class="fa-solid fa-right-from-bracket" style="color: #ff0000;"></i>Se deconnecter</span></a></li>
            </ul>
            @endif
            @if($user->id==$users_roles->id_user && $users_roles->id_role==16)
                <span class="font-size: 15px;">Mr le Ministre</span>
                <ul class="menus">
                <li><a href="/dashboard_dep"><i class="fa-solid fa-gauge"></i>Tableau de bord</a></li>
                <li><a href="/historiques"><i class="fa-solid fa-clock-rotate-left"></i>Envoyer dossier interne</a></li>
                <li><a href="/se deconnecter/{{$user->id}}" onclick="seDeconnecter(event)"><span style="color: #ff0000;"><i class="fa-solid fa-right-from-bracket" style="color: #ff0000;"></i>Se deconnecter</span></a></li>
            @endif
        </div>    
    </div>
    @include('components.barre', ['user' => $user])
    <div class="espace_travail">
        <span class="historiques"><i class="fa-solid fa-clock-rotate-left"></i><span class="texte_historique">Historiques des actions</span></span><br>
        <p>   
            <form method="post" action="/resultat-filtre">
                @csrf
                <span class="filtre">Filtrer historiques </span><br>
                <select name="date_opt" id="date_opt">
                    <option value="Aujourd'hui">Aujourd'hui</option>
                    <option value="Hier">Hier</option>
                    <option value="Il y'a 7 jours">Il y'a 7 jours</option>
                    <option value="Il y'a 1 mois">Il y'a 1 mois</option>
                    <option value="Il y'a 1 an">Il y'a 1 an</option>
                </select>
                <input type="submit" value="Filtrer" id="bouton_filtre">
            </form>
        </p>
        <p>
            <form method="post" action="/resultat-filtre-par-date-et-heure">
                @csrf
                <span class="date-filt">Definir une date</span><br>
                <input type="date" name="date_historiques" id="date_historiques">
                <input type="time" name="heure_historiques" id="heure_historiques">
                <input type="submit" value="Filtrer par date et heure" id="bouton_filtre2">
            </form>
        </p>
        
        <span class="liste-historiques">
            Liste des Historiques
        </span><br>
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
                @foreach ($hist as $action)
                  <tr>
                    <td>{{$action->id}}</td>
                    <td>{{$action->nomAction}}</td>
                    <td>
                        @foreach ($users_hist as $user)
                            @if ($user->id==$action->id_user)
                                {{$user->name}}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        @foreach ($users_hist as $user)
                            @if ($user->id==$action->id_user)
                                {{$user->email}}
                            @endif
                        @endforeach
                    </td>
                    <td>{{$action->created_at}}</td>
                </tr>  
                @endforeach
            </tbody>
        </table><br><br>
    </div>
    <script>
        function seDeconnecter(event){
            event.preventDefault();  //empêche la redirection par defaut du lien
            if(confirm("voulez vous deconnecter ?")){
                window.location.href="/se deconnecter/{{$user->id}}";
            }
        }
    </script>
</body>
</html>