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
    <title>Gerer Utilisateurs - DEP MINSANTE</title>
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
            cursor: pointer;
        }
        .menus li a {
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
            cursor: pointer;
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
        .utilisateurs{
            font-size: 55px;
            color: darkslateblue;
            font-weight: bold;
        }
        .utilisateurs .users{
            margin-left: 10px;
        }
        .filtrer,.liste-historiques{
            color: darkslateblue;
            font-size: 30px;
            font-weight: bold;
        }
        .btn-rechercher{
            background-color: darkslateblue;
            color: white;
            border-color: darkslateblue;
            border-style: none;
        }
        #bouton_filtre2{
            background-color: darkslateblue;
            color: white;
            border: none;
            border-color: darkslateblue;
        }
        #bouton_filtre{
            background-color: darkslateblue;
            color: white;
            border: none;
            border-color: darkslateblue;
        }
        #rechercher_utilisateur{
            width: 300px;
            height:35px;
            padding-left: 30px;
        }
        #search{
            position: absolute;
            margin-left: 10px;
            margin-top: 8px;
            color: darkslateblue;
        }
        .btn-rechercher{
            height: 35px;
            font-family: 'Afacad flux';
            font-weight: bold;
        }
        .bouton-validation{
            background-color: darkslateblue;
            color: white;
            height: 40px;
            font-weight: bold;
            font-family: 'Afacad flux';
            border: none;
            border-color: darkslateblue;
            cursor: pointer;
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
                <li><a href="/se deconnecter" onclick="seDeconnecter(event)"><span style="color: #ff0000;"><i class="fa-solid fa-right-from-bracket" style="color: #ff0000;"></i>Se deconnecter</span></a></li>
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
        <span class="utilisateurs"><i class="fa-solid fa-users"></i><span class="users">Gérer Utilisateurs</span></span><br>
        <p>   
            <form method="post" action="">
                @csrf
                <i class="fa-solid fa-magnifying-glass" id="search"></i><input type="search" name="rechercher_utilisateur" id="rechercher_utilisateur" placeholder="Rechercher un utilisateur">
                <input type="submit" value="Rechercher" class="btn-rechercher">
            </form>
        </p>
        <p>
          <span class="filtrer">Filtrer les résultats</span>  
        </p>
        <span class="liste-historiques">
            Liste des Utilisateurs
        </span><br>
        <form action="/creer_utilisateur" method="get">
            @csrf
            <input type="submit" value="Créer un nouvel utilisateur" class="bouton-validation">
        </form><br><br>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Structure</th>
                    <th>Téléphone</th>
                    <th>Actions</th>
                </tr>      
            </thead>
            <tbody>
                @foreach ($users as $u)
                <tr>
                    <td>{{$u->id}}</td>
                    <td>{{$u->name}}</td>
                    <td>{{$u->email}}</td>
                    <td>
                        @foreach ($user_role as $ur)
                            @if ($u->id==$ur->id_user)
                                @foreach ($roles as $r)
                                    @if ($r->id==$ur->id_role)
                                        {{$r->nomRole}}    
                                    @endif         
                                @endforeach
                            @endif
                            
                        @endforeach
                    </td>
                    <td>
                        @foreach ($users_structures as $us)
                            @if ($u->id==$us->id_user)
                                @foreach ($structures as $s)
                                    @if ($s->id==$us->id_role)
                                        {{$s->nomStructure}}    
                                    @endif         
                                @endforeach
                            @endif  
                        @endforeach
                    </td>
                    <td>
                        @foreach ($telephone as $t)
                            @if ($u->id==$t->id_user)
                                {{$t->numeroTelephone}}
                            @endif   
                        @endforeach
                    </td>
                    <td>
                        <ul>
                            <a href="/modifier_utilisateur/{{$u->id}}"><li><i class="fa-solid fa-user-pen"></i>Modifier</li></a>
                            <a href="/supprimer_utilisateur/{{$u->id}}" onclick="supprimerUtilisateur(event)" class="user" data-user-id="{{$u->id}}"><li><i class="fa-solid fa-user-xmark"></i>Supprimer</li></a>
                            <a href="/bloquer_utilisateur/{{$u->id}}" ><li><i class="fa-solid fa-user-lock"></i>Bloquer</li></a>
                        </ul>
                    </td>
                </tr> 
                @endforeach
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
        function recupererUtilisateur(event){
            let lien=document.querySelectorAll('.user');
            event.preventDefault();
            console.log(lien);
            /*if(confirm('voulez vous supprimer définitivement cet utilisateur ?')){
                alert(id);
                window.location.href="/supprimer_utilisateur/$id";
            }*/
        }
    </script>

</body>
</html>