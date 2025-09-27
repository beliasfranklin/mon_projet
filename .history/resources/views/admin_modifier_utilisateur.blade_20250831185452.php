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
    <title>Modifier utilisateur - DEP MINSANTE</title>
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
        }
        .espace_travail{
            margin-left: 300px;
            position: absolute;
            top: 120px;
            left: 20px;
        }
        .utilisateurs{
            font-size: 55px;
            color: darkslateblue;
            font-weight: bold;
        }
        .utilisateurs .users{
            margin-left: 10px;
        }
        .a{
            color: darkslateblue;
            font-weight: bold;
            font-size: 25px;
        }
        .bouton-validation{
            background-color: darkslateblue;
            color: white;
            height: 40px;
            font-weight: bold;
            font-family: 'Afacad flux';
            border: none;
            border-color: darkslateblue;
        }
        #nom,#email,#tel,#mdp{
            width: 350px;
            height: 30px;
            padding: 5px;
            font-size: 20px;
            padding-left: 30px;
            border-color: darkslateblue;
        }
        #nom:hover,#tel:hover,#mdp:hover{
            border-color: darkslateblue;
        }
        #email:hover{
            border-color: darkslateblue;
        }
        #structure,#role{
            width: 200px;
            height: 40px;
            font-size: 20px;
            border-color: darkslateblue;
            margin-bottom: 10px;
            font-family: 'Afacad Flux', 'Rubik', sans-serif;
        }
        form i{
            position: absolute;
            margin-left: 5px;
            margin-top: 10px;
            color: darkslateblue;
            width: 20px;
            height: 20px;
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
        <span class="utilisateurs"><i class="fa-solid fa-user-pen"></i><span class="users">Modifier Utilisateur {{$user1->name}}</span></span><br>
        <p class="formulaire_modifier_utilisateur">
            <form action="/traiter_formulaire_modification_utilisateur/{{$user1->id}}" method="post">
                @csrf
                <span class="a">Nom complet </span><br> 
                <i class="fa-solid fa-user" id="user"></i><input type="text" name="nom" id="nom" placeholder="Nom complet" required value="{{$user->name}}"><br><br>
                <span class="a">Email </span><br>
                <i class="fa-solid fa-envelope"></i><input type="email" name="email" id="email" placeholder="Email" required value="{{$user->name}}"><br><br>
                <span class="a">Numéro de Téléphone (Pour Whatsapp de préférence) </span><br>
                <i class="fa-solid fa-phone"></i><input type="tel" name="tel" id="tel" required placeholder="Numéro de téléphone" value="{{$tel[0]['numeroTelephone']}}"><br><br>
                <span class="a">Mot de passe </span><br>
                <i class="fa-solid fa-lock"></i><input type="password" name="mdp" id="mdp" required placeholder="Mot de passe" value="{{$user->passxw}}"><br><br>
                <span class="a">Role <br></span>
                <select name="role" id="role">
                    <option value="{{$nom_role_user[0]['nomRole']}}">{{$nom_role_user[0]['nomRole']}}</option>
                    @for ($i = 0; $i < $autres_roles->count(); $i++)
                        <option value="{{$autres_roles[$i]['nomRole']}}">{{$autres_roles[$i]['nomRole']}}</option>            
                    @endfor
                </select>   
                <br><br>
                <span class="a">Structure <br></span>
                <select name="structure" id="structure">
                    <option value="{{$nom_structure_user[0]['nomStructure']}}">{{$nom_structure_user[0]['nomStructure']}}</option>
                        @for ($i = 0; $i < $autres_structures->count(); $i++)
                            <option value="{{$autres_structures[$i]['nomStructure']}}">{{$autres_structures[$i]['nomStructure']}}</option> 
                        @endfor
                </select>
                <br><br>
                <input type="submit" value="modifier cet utilisateur" class="bouton-validation">
            </form>
        </p>
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