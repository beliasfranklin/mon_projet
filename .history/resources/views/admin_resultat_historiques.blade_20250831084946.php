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
</style>
</head>
<body>
    <div class="conteneur_menus">
        <div class="conteneur_titre_logo_minsante">
            <img src="favicon.svg" alt="logo-minsante" class="logo-minsante"><br>
            <span>DEP-MINSANTE</span><br>
            @if($user->id==$users_roles->id_user && $users_roles->id_role==23)
                <span class="font-size: 15px;">ADMIN</span>
                <ul class="menus">
                <li><a href="/dashboard_dep"><i class="fa-solid fa-gauge"></i>Tableau de bord</a></li>
                <li><a href="/historiques"><i class="fa-solid fa-clock-rotate-left"></i>Consulter Historiques</a></li>
                <li><i class="fa-solid fa-users"></i><a href="/gerer_utilisateurs">Gérer Utilisateurs</a></li>
                <li><a href="/se deconnecter" onclick="seDeconnecter()"><span style="color: #ff0000;"><i class="fa-solid fa-right-from-bracket" style="color: #ff0000;"></i>Se deconnecter</span></a></li>
            </ul>
            @endif
        </div>    
    </div>
    <div class="barre">
        Bienvenue, {{$user->name}}
        <i class="fa-solid fa-circle-user"></i>
        <span>{{$user->name}}</span>
    </div>
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
                @switch($result)
                    @case("Aujourd'hui")
                        @foreach ($hist as $action)
                            @if (date('d',strtotime(now()))==date('d',strtotime($action->created_at)) && date('m',strtotime(now()))==date('m',strtotime($action->created_at)) && date('y',strtotime(now()))==date('y',strtotime($action->created_at)))
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
                            @endif  
                        @endforeach
                        @break
                    @case('Hier')
                        
                        
                        @break
                    @default
                        
                @endswitch
            </tbody>
        </table><br><br>
    </div>
    <script>
        function seDeconnecter(event){
            event.preventDefault();  //empêche la redirection par defaut du lien
            if(confirm("voulez vous deconnecter ?")){
                window.location.href="/se deconnecter";
            }
        }
    </script>
</body>
</html>