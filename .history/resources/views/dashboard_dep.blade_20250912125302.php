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
    <title>Dashboard - DEP MINSANTE</title>
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
        .menus li a{
            text-decoration: none;
            color: white;
        }
        .menus li:hover{
            background-color: rgb(79, 55, 236);
            height: 30px;
        }
        .menus li i{
            margin-right: 15px;
            width: 20px;
            height: 20px;
            font-size: 20px;
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
        .conteneurs-stats-users div{
            width: 250px;
            height: 200px;
            margin: 10px;
            margin-left: 0;
            margin-top: 0px;
            background: white;
            color: darkslateblue;
            font-weight: bold;
            font-size: 20px;
            padding: 10px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
        }
        .users-ext,.users-dep,.users-cpp,.users-cei{
            font-size: 30px;
            font-weight: bold;
            color: darkslateblue;
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
        table ul{
            display: flex;
            justify-content: center;
            align-items: center;
            list-style: none;
            padding: 20px;
        }
        table ul li{
            margin-right: 30px;
            padding-left: 5px;
            background-color: darkslateblue;
            color: white;
            width: 120px;
            height: 35px;
            padding-top: 5px;
            font-weight: bold;
            padding-top: 5px;
            cursor: pointer;

        }
        table ul li i{
            padding-right: 5px;
        }
        table ul a{
            text-decoration: none;
            color: white;
        }
        table tr:nth-child(even) {
            background-color: #f2f2f2; /* Lignes paires en gris clair */
        }
        table tr{
            height: 80px;
        }   
</style>
</head>
<body>
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
    <div class="conteneur_menus">
        <div class="conteneur_titre_logo_minsante">
            <img src="favicon.svg" alt="logo-minsante" class="logo-minsante"><br>
            <span>DEP-MINSANTE</span><br>
            <!-- nav bar de l'administrateur-->
            @if($user->id==$users_roles->id_user && $users_roles->id_role==2)
                <span class="font-size: 15px;">ADMIN</span>
                <ul class="menus">
                <li><a href="/dashboard_dep"><i class="fa-solid fa-gauge"></i>Tableau de bord</a></li>
                <li><a href="/historiques"><i class="fa-solid fa-clock-rotate-left"></i>Consulter Historiques</a></li>
                <li><i class="fa-solid fa-users"></i><a href="/gerer_utilisateurs">Gérer Utilisateurs</a></li>
                <li><a href="/se deconnecter/{{$user->id}}" onclick="seDeconnecter(event)"><span style="color: #ff0000;"><i class="fa-solid fa-right-from-bracket" style="color: #ff0000;"></i>Se deconnecter</span></a></li>
            </ul>
            @endif
            <!-- navbar du Ministre -->
            @if($user->id==$users_roles->id_user && $users_roles->id_role==2) 
                <span class="font-size: 15px;">Mr le Ministre</span>
                <ul class="menus">
                    <li><a href="/dashboard_dep"><i class="fa-solid fa-gauge"></i>Tableau de bord</a></li>
                    <li><a href="/ministre_envoyer_dossier_interne"><i class="fa-solid fa-paper-plane"></i>Envoyer dossier interne</a></li>
                    <li><a href="/se deconnecter/{{$user->id}}" onclick="seDeconnecter(event)"><span style="color: #ff0000;"><i class="fa-solid fa-right-from-bracket" style="color: #ff0000;"></i>Se deconnecter</span></a></li>
                </ul>
            @endif
            <!-- nav bar de l'usager externe-->
            @if($user->id==$users_roles->id_user && $users_roles->id_role==3)
                <span class="font-size: 15px;"></span>
                <ul class="menus">
                    <li><a href="/dashboard_dep"><i class="fa-solid fa-gauge"></i>Tableau de bord</a></li>
                    <li><a href="/usager_externe_envoyer_dossier_externe"><i class="fa-solid fa-paper-plane"></i>Envoyer dossier externe</a></li>
                    <li><a href="/consulter_résultats"><i class="fa-solid fa-bell"></i>Consulter résultats</a></li>
                    <li><a href="/se deconnecter/{{$user->id}}" onclick="seDeconnecter(event)"><span style="color: #ff0000;"><i class="fa-solid fa-right-from-bracket" style="color: #ff0000;"></i>Se deconnecter</span></a></li>
                </ul>
            @endif
            <!-- nav bar du membre du courrier de la DEP-->
            @if ($user->id==$users_roles->id_user && $users_roles->id_role==17)
                <ul class="menus">
                    <li><a href="/dashboard_dep"><i class="fa-solid fa-gauge"></i>Tableau de bord</a></li>
                    <li><a href="/courrier_dep_voir_dossier_externe"><i class="fa-solid fa-inbox"></i>Consulter dossiers recus</a></li>
                    <li><a href="/se deconnecter/{{$user->id}}" onclick="seDeconnecter(event)"><span style="color: #ff0000;"><i class="fa-solid fa-right-from-bracket" style="color: #ff0000;"></i>Se deconnecter</span></a></li>
                </ul>
            @else
                
            @endif
        </div>    
    </div>
    <div class="barre">
        Bienvenue, {{$user->name}}
        <i class="fa-solid fa-circle-user"></i>
        <span>{{$user->name}}</span>
    </div>
    <!-- espace de travail de l'admin-->
    @if($user->id==$users_roles->id_user && $users_roles->id_role==23)
        <div class="espace_travail">
            <div class="conteneurs-stats-users">
                <div>Nombres<br>d'utilisateurs <br>
                    <span style="font-size: 80px;">
                        {{$users->count();}}
                    </span>
                </div>
                <div>Nombres d'utilisateurs connectés<br>
                    <span style="font-size: 80px;">
                        {{$conn}}
                    </span>  
                </div>
            </div>
            <p>
                <span class="users-ext">Utilisateurs Externes</span>
            </p>
            <p>
                <span class="users-dep">Utilisateurs membres de la DEP</span>
            </p>
            <p>
                <span class="users-cpp">Utilisateurs membres de la CPP</span>   
            </p>
            <p>
                <span class="users-cei">Utilisateurs membres de la CEI</span>       
            </p>   
        </div>   
    @endif
    <!-- espace de travail du ministre-->
    @if ($user->id==$users_roles->id_user && $users_roles->id_role==16)
       <div class="espace_travail">
            <div class="conteneurs-stats-users">
                <div>Nombres<br>total de dossiers internes envoyés<br>
                    <span style="font-size: 80px;">
                        {{$nb_total_dossiers_internes_envoyes}}
                    </span>
                </div>
            </div>
            <p>
                <span class="users-ext">Tout les dossiers internes envoyés</span><br>
                <table>
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>NumeroMinistre</th>
                            <th>intitule</th>
                            <th>date et heure d'envoi</th>
                            <th>type dossier</th>
                            <th>priorité</th>
                            <th>commentaires</th>
                            <th>Actions</th>
                        </tr>      
                    </thead>
                    <tbody>
                        @foreach ($dossiers_internes as $d)
                            <tr>
                                <td>{{$d->id}}</td>
                                <td>{{$d->numeroMinistre}}</td>
                                <td>{{$d->intitule}}</td>
                                <td>{{$d->dateHeureEnvoiMinistre}}</td>
                                <td>{{$d->typeDossier}}</td>
                                <td>{{$d->priorite}}</td>
                                <td>{{$d->commentaires}}</td>
                                <td>
                                    <ul>
                                        <a href="/ministre_voir_dossier_interne/{{$d->id}}"><li><i class="fa-solid fa-eyes"></i>voir détails</li></a>
                                    </ul>
                                </td>
                            </tr> 
                        @endforeach
                    </tbody>
                </table><br><br>
            </p>   
        </div>
    @endif
    <!-- espace de travail du ministre-->

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