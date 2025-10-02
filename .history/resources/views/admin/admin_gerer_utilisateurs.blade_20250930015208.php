@php
    use App\Models\StatutUser;
    $statut_user=StatutUser::all();
@endphp
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
    <title>Gerer Utilisateurs - DEP MINSANTE</title>
    <style>
        body {
            font-family: 'Afacad Flux', 'Rubik', sans-serif;
            margin: 0;
            background: linear-gradient(120deg, #f6f6ff 0%, #e9e6fa 100%);
            color: #1e293b;
        }
        .conteneur_menus {
            width: 100%;
            max-width: 300px;
            min-height: 100vh;
            background: darkslateblue;
            position: fixed;
            left: 0;
            top: 0;
            color: #fff;
            font-weight: bold;
            box-shadow: 0 4px 16px rgba(71,61,131,0.09);
            z-index: 1000;
        }
        .conteneur_titre_logo_minsante {
            text-align: center;
            margin-top: 10px;
        }
        .logo-minsante {
            width: 100px;
            height: 100px;
        }
        .conteneur_titre_logo_minsante span {
            font-size: 22px;
        }
        .menus {
            list-style: none;
            padding: 0;
            margin-top: 60px;
        }
        .menus li {
            font-size: 18px;
            margin: 28px 0;
            cursor: pointer;
            border-radius: 8px;
            transition: background 0.2s;
        }
        .menus li a {
            text-decoration: none;
            color: #fff;
            display: flex;
            align-items: center;
        }
        .menus li:hover {
            background: #473d83;
        }
        .menus li i {
            margin-right: 12px;
            font-size: 18px;
        }
        .barre {
            width: calc(100vw - 300px);
            min-width: 320px;
            height: 60px;
            background: #ede9fe;
            margin-left: 300px;
            padding: 18px 32px;
            position: fixed;
            font-weight: bold;
            font-size: 2em;
            box-shadow: 0 2px 12px rgba(71,61,131,0.09);
            z-index: 1000;
            display: flex;
            align-items: center;
            justify-content: space-between;
        }
        .barre span {
            font-size: 1.1em;
            margin-right: 5px;
        }
        .barre i {
            color: darkslateblue;
            margin-left: 10px;
        }
        .espace_travail {
            margin-left: 320px;
            padding: 32px 18px 18px 18px;
            min-width: 320px;
        }
        .utilisateurs {
            font-size: 2.2em;
            color: darkslateblue;
            font-weight: bold;
        }
        .users {
            margin-left: 10px;
        }
        .filtrer, .liste-historiques {
            color: darkslateblue;
            font-size: 1.3em;
            font-weight: bold;
        }
        .search-bar {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            align-items: center;
            margin-bottom: 24px;
            justify-content: flex-start;
        }
        .search-bar input[type="text"],
        .search-bar select,
        .search-bar input[type="date"] {
            padding: 8px 12px;
            border-radius: 8px;
            border: 1px solid #d1d5db;
            font-size: 1em;
            background: #f6f6ff;
            color: #473d83;
            min-width: 120px;
        }
        .search-bar input[type="submit"],
        .search-bar button {
            padding: 10px 22px;
            border-radius: 8px;
            font-size: 1em;
            font-weight: 600;
            border: 2px solid darkslateblue;
            background: darkslateblue;
            color: #fff;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
        }
        .search-bar button {
            background: #ccc;
            color: darkslateblue;
            border: 2px solid #ccc;
        }
        .search-bar input[type="submit"]:hover,
        .search-bar button:hover {
            background: #473d83;
            color: #fff;
        }
        .bouton-validation {
            background: darkslateblue;
            color: #fff;
            height: 40px;
            font-weight: bold;
            font-family: 'Afacad flux';
            border: none;
            border-radius: 8px;
            cursor: pointer;
            margin-bottom: 18px;
            font-size: 1.1em;
            transition: background 0.2s;
        }
        .bouton-validation:hover {
            background: #473d83;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 12px;
            background: #f6f6ff;
            box-shadow: 0 2px 12px rgba(71,61,131,0.09);
            margin-top: 18px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 10px;
            text-align: center;
        }
        th {
            background: #473d83;
            color: #fff;
            font-weight: 600;
        }
        tr {
            border-bottom: 1px solid #e5e7eb;
        }
        tr:last-child {
            border-bottom: none;
        }
        table ul {
            display: flex;
            justify-content: center;
            align-items: center;
            list-style: none;
            padding: 0;
            margin: 0;
            gap: 10px;
        }
        table ul a li {
            padding: 6px 14px;
            border-radius: 6px;
            background: #e9e6fa;
            color: #473d83;
            font-size: 0.98em;
            cursor: pointer;
            transition: background 0.2s, color 0.2s;
            display: flex;
            align-items: center;
            gap: 6px;
        }
        table ul a li:hover {
            background: darkslateblue;
            color: #fff;
        }
        @media (max-width: 1100px) {
            .conteneur_menus {
                max-width: 220px;
            }
            .barre {
                margin-left: 220px;
                width: calc(100vw - 220px);
            }
            .espace_travail {
                margin-left: 230px;
            }
        }
        @media (max-width: 900px) {
            .conteneur_menus {
                max-width: 160px;
            }
            .barre {
                margin-left: 160px;
                width: calc(100vw - 160px);
                font-size: 1.2em;
            }
            .espace_travail {
                margin-left: 170px;
                padding: 12px 4vw;
            }
            table, th, td {
                font-size: 0.95em;
            }
        }
        @media (max-width: 600px) {
            .conteneur_menus {
                display: none;
            }
            .barre {
                margin-left: 0;
                width: 100vw;
                font-size: 1em;
                padding: 10px 8px;
            }
            .espace_travail {
                margin-left: 0;
                padding: 6px 2vw;
            }
            h2 {
                font-size: 1.2em;
            }
            .search-bar input, .search-bar select {
                min-width: 90px;
            }
            table, th, td {
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>
    <div class="conteneur_menus">
        <div class="conteneur_titre_logo_minsante">
            <img src="logo-minsante.png" alt="logo-minsante" class="logo-minsante"><br>
            <span>DEP-MINSANTE</span><br>
            @if($user->id==$users_roles->id_user && $users_roles->id_role==26)
                <span class="font-size: 15px;">ADMIN</span>
                <ul class="menus">
                <li><a href="/dashboard_dep"><i class="fa-solid fa-gauge"></i>Tableau de bord</a></li>
                <li><a href="/historiques"><i class="fa-solid fa-clock-rotate-left"></i>Consulter Historiques</a></li>
                <li><i class="fa-solid fa-users"></i><a href="/gerer_utilisateurs">Gérer Utilisateurs</a></li>
                <li><a href="/se deconnecter/{{$user->id}}" onclick="seDeconnecter(event)"><span style="color: #ff0000;"><i class="fa-solid fa-right-from-bracket" style="color: #ff0000;"></i>Se deconnecter</span></a></li>
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
          <span class="filtrer">Filtrer les résultats</span>  
        </p>
        <p>   
           <form method="post" action="/rechercher_utilisateur" style="display: flex; align-items: center; margin-top: 20px; gap: 12px;">
            @csrf
            <i class="fa-solid fa-magnifying-glass" id="search"></i>
            <input type="text" name="recherche" id="rechercher_utilisateur" placeholder="Nom ou email" value="{{ old('recherche', isset($recherche) ? $recherche : '') }}">
            <select name="statut" id="statut" style="height:35px;">
                <option value="tous" {{ (isset($statut) && $statut=='tous') ? 'selected' : '' }}>Tous statuts</option>
                <option value="actif" {{ (isset($statut) && $statut=='actif') ? 'selected' : '' }}>Actif</option>
                <option value="inactif" {{ (isset($statut) && $statut=='inactif') ? 'selected' : '' }}>Inactif</option>
                <option value="bloque" {{ (isset($statut) && $statut=='bloque') ? 'selected' : '' }}>Bloqué</option>
            </select>
            <select name="role" id="role" style="height:35px;">
                <option value="tous" {{ (isset($role) && $role=='tous') ? 'selected' : '' }}>Tous rôles</option>
                @foreach($roles as $r)
                    <option value="{{$r->nomRole}}" {{ (isset($role) && $role==$r->nomRole) ? 'selected' : '' }}>{{$r->nomRole}}</option>
                @endforeach
            </select>
            <select name="structure" id="structure" style="height:35px;">
                <option value="tous" {{ (isset($structure) && $structure=='tous') ? 'selected' : '' }}>Toutes structures</option>
                @foreach($structures as $s)
                    <option value="{{$s->nomStructure}}" {{ (isset($structure) && $structure==$s->nomStructure) ? 'selected' : '' }}>{{$s->nomStructure}}</option>
                @endforeach
            </select>
            <input type="date" name="date_debut" value="{{ old('date_debut', isset($date_debut) ? $date_debut : '') }}" style="height:35px;">
            <input type="date" name="date_fin" value="{{ old('date_fin', isset($date_fin) ? $date_fin : '') }}" style="height:35px;">
            <input type="submit" value="Rechercher" class="btn-rechercher">
            <a href="/gerer_utilisateurs"><button type="button" class="btn-rechercher" style="background:#ccc; color:darkslateblue;">Réinitialiser</button></a>
        </form> 
        </p>
        <span class="liste-historiques">
            Liste des Utilisateurs
        </span><br>
        <a href="/creer_utilisateur">
            <button class="bouton-validation">Creer un nouvel utilisateur</button>
        </a><br><br>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Structure</th>
                    <th>Téléphone</th>
                    <th>Statut</th>
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
                        @foreach ($statut_user as $su)
                            @if ($u->id==$su->id_user)
                                {{$su->statut}}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        <ul>
                            <a href="/modifier_utilisateur/{{$u->id}}"><li><i class="fa-solid fa-user-pen"></i>Modifier</li></a>
                            <a href="/supprimer_utilisateur/{{$u->id}}" onclick="supprimerUtilisateur(event)" class="user" data-user-id="{{$u->id}}"><li><i class="fa-solid fa-user-xmark"></i>Supprimer</li></a>
                            @php
                                $statut = '';
                                foreach ($statut_user as $su) {
                                    if ($u->id == $su->id_user) {
                                        $statut = $su->statut;
                                        break;
                                    }
                                }
                            @endphp
                            @if($statut === 'bloque')
                                <a href="/debloquer_utilisateur/{{$u->id}}" onclick="debloquerUtilisateur(event)"><li style="background-color: darkslateblue;"><i class="fa-solid fa-unlock"></i>Débloquer</li></a>
                            @else
                                <a href="/bloquer_utilisateur/{{$u->id}}" onclick="bloquerUtilisateur(event)"><li><i class="fa-solid fa-user-lock"></i>Bloquer</li></a>
                            @endif
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
                window.location.href="/se deconnecter/{{$user->id}}";
            }
        }
        
        function supprimerUtilisateur(event){
            if(confirm("voulez vous supprimer cet utilisateur ?")==true){
                window.location.href="/supprimer_utilisateur/{{$u->id}}";
            }
        }
        function bloquerUtilisateur(event){
            event.preventDefault();  //empêche la redirection par defaut du lien
            if(confirm("voulez vous bloquer cet utilisateur ?")){
                window.location.href="/bloquer_utilisateur/{{$u->id}}";
            }
        }
    </script>

</body>
</html>