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
            cursor: pointer;
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

        .utilisateurs{
            font-size: 32px;
            color: var(--primary-color);
            font-weight: bold;
            display: flex;
            align-items: center;
            gap: 10px;
            margin-bottom: 20px;
        }

        .filtrer, .liste-historiques{
            color: var(--primary-color);
            font-size: 24px;
            font-weight: bold;
            margin: 20px 0;
        }

        /* Formulaire de recherche */
        .search-form {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin: 20px 0;
            align-items: center;
        }

        .search-input-container {
            position: relative;
            flex: 1;
            min-width: 200px;
        }

        #search{
            position: absolute;
            left: 10px;
            top: 50%;
            transform: translateY(-50%);
            color: var(--primary-color);
        }

        #rechercher_utilisateur{
            width: 100%;
            height: 35px;
            padding-left: 35px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .search-form select,
        .search-form input[type="date"] {
            height: 35px;
            border: 1px solid #ccc;
            border-radius: 4px;
            padding: 0 10px;
            min-width: 150px;
        }

        .btn-rechercher{
            background-color: var(--primary-color);
            color: var(--text-color);
            border: none;
            border-radius: 4px;
            height: 35px;
            padding: 0 15px;
            font-family: 'Afacad flux';
            font-weight: bold;
            cursor: pointer;
            transition: opacity 0.3s;
        }

        .btn-rechercher:hover{
            opacity: 0.9;
        }

        /* Bouton création */
        .bouton-validation{
            background-color: var(--primary-color);
            color: var(--text-color);
            height: 40px;
            font-weight: bold;
            font-family: 'Afacad flux';
            border: none;
            border-radius: 4px;
            cursor: pointer;
            padding: 0 20px;
            transition: opacity 0.3s;
        }

        .bouton-validation:hover{
            opacity: 0.9;
        }

        /* Table */
        .table-container {
            overflow-x: auto;
            margin: 20px 0;
        }

        table{
            width: 100%;
            border-collapse: collapse;
            border-radius: 8px;
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            background-color: white;
            min-width: 800px;
        }

        table th{
            background-color: var(--primary-color);
            color: var(--text-color);
            padding: 15px 10px;
            text-align: center;
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
        }

        .actions-list li:hover{
            background-color: rgb(79, 55, 236);
        }

        .actions-list a{
            text-decoration: none;
            color: inherit;
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
            }
            
            .espace_travail {
                margin-left: 0;
                width: 100%;
            }
            
            .menu-toggle {
                display: block;
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
            }
        }

        @media (max-width: 768px) {
            .utilisateurs {
                font-size: 24px;
            }
            
            .filtrer, .liste-historiques {
                font-size: 20px;
            }
            
            .search-form {
                flex-direction: column;
                align-items: stretch;
            }
            
            .search-input-container {
                min-width: auto;
            }
            
            .search-form select,
            .search-form input[type="date"] {
                min-width: auto;
                width: 100%;
            }
            
            .barre {
                font-size: 18px;
                padding: 10px 15px;
            }
            
            .barre span {
                font-size: 14px;
            }
        }

        @media (max-width: 576px) {
            .utilisateurs {
                font-size: 20px;
                flex-direction: column;
                align-items: flex-start;
            }
            
            .actions-list {
                flex-direction: column;
                align-items: stretch;
            }
            
            .actions-list li {
                justify-content: center;
            }
            
            table th,
            table td {
                padding: 8px 5px;
                font-size: 14px;
            }
            
            .conteneur_titre_logo_minsante span {
                font-size: 16px;
            }
            
            .menus li {
                font-size: 14px;
                padding: 8px 10px;
            }
        }

        /* Menu toggle pour mobile */
        .menu-toggle {
            display: none;
        }

        /* Animation pour le menu mobile */
        @media (max-width: 992px) {
            .menu-toggle {
                display: block;
            }
            
            .conteneur_menus {
                width: 280px;
            }
        }
        /* Message de succès */
        .boite-reponse {
            width: 100%;
            height: 50px;
            background-color: rgb(204, 255, 204);
            color: darkgreen;
            display: flex;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
            border-radius: 8px;
            margin-bottom: 20px;
            padding: 0 15px;
            border-left: 4px solid darkgreen;
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
            <img src="logo-minsante.png" alt="logo-minsante" class="logo-minsante">
            <span>DEP-MINSANTE</span>
            @if($user->id==$users_roles->id_user && $users_roles->id_role==26)
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
        <!-- Message de succès -->
        <div class="boite-reponse">
            <i class="fa-solid fa-circle-check" style="margin-right:10px;"></i> Compte modifié avec succès !
        </div>
        <div class="utilisateurs">
            <i class="fa-solid fa-users"></i>
            <span class="users">Gérer Utilisateurs</span>
        </div>
        
        <span class="filtrer">Filtrer les résultats</span>
        
        <form method="post" action="/rechercher_utilisateur" class="search-form">
            @csrf
            <div class="search-input-container">
                <i class="fa-solid fa-magnifying-glass" id="search"></i>
                <input type="text" name="recherche" id="rechercher_utilisateur" placeholder="Nom ou email" value="{{ old('recherche', isset($recherche) ? $recherche : '') }}">
            </div>
            
            <select name="statut" id="statut">
                <option value="tous" {{ (isset($statut) && $statut=='tous') ? 'selected' : '' }}>Tous statuts</option>
                <option value="actif" {{ (isset($statut) && $statut=='actif') ? 'selected' : '' }}>Actif</option>
                <option value="inactif" {{ (isset($statut) && $statut=='inactif') ? 'selected' : '' }}>Inactif</option>
                <option value="bloque" {{ (isset($statut) && $statut=='bloque') ? 'selected' : '' }}>Bloqué</option>
            </select>
            
            <select name="role" id="role">
                <option value="tous" {{ (isset($role) && $role=='tous') ? 'selected' : '' }}>Tous rôles</option>
                @foreach($roles as $r)
                    <option value="{{$r->nomRole}}" {{ (isset($role) && $role==$r->nomRole) ? 'selected' : '' }}>{{$r->nomRole}}</option>
                @endforeach
            </select>
            
            <select name="structure" id="structure">
                <option value="tous" {{ (isset($structure) && $structure=='tous') ? 'selected' : '' }}>Toutes structures</option>
                @foreach($structures as $s)
                    <option value="{{$s->nomStructure}}" {{ (isset($structure) && $structure==$s->nomStructure) ? 'selected' : '' }}>{{$s->nomStructure}}</option>
                @endforeach
            </select>
            
            <input type="date" name="date_debut" value="{{ old('date_debut', isset($date_debut) ? $date_debut : '') }}">
            <input type="date" name="date_fin" value="{{ old('date_fin', isset($date_fin) ? $date_fin : '') }}">
            
            <input type="submit" value="Rechercher" class="btn-rechercher">
            <a href="/gerer_utilisateurs">
                <button type="button" class="btn-rechercher" style="background:#ccc; color:darkslateblue;">Réinitialiser</button>
            </a>
        </form>
        
        <div style="display: flex; justify-content: space-between; align-items: center; margin: 20px 0;">
            <span class="liste-historiques">Liste des Utilisateurs</span>
            <a href="/creer_utilisateur">
                <button class="bouton-validation">Créer un nouvel utilisateur</button>
            </a>
        </div>
        
        <div class="table-container">
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
                                @if ($u->id==$us->user_id)
                                    @foreach ($structures as $s)
                                        @if ($s->id==$us->structure_id)
                                            {{$s->nomStructure}}    
                                        @endif         
                                    @endforeach>
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
                            <ul class="actions-list">
                                <a href="/modifier_utilisateur/{{$u->id}}">
                                    <li><i class="fa-solid fa-user-pen"></i>Modifier</li>
                                </a>
                                <a href="/supprimer_utilisateur/{{$u->id}}" onclick="return supprimerUtilisateur(event)">
                                    <li><i class="fa-solid fa-user-xmark"></i>Supprimer</li>
                                </a>
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
                                    <a href="/debloquer_utilisateur/{{$u->id}}" onclick="return debloquerUtilisateur(event)">
                                        <li style="background-color: darkslateblue;">
                                            <i class="fa-solid fa-unlock"></i>Débloquer
                                        </li>
                                    </a>
                                @else
                                    <a href="/bloquer_utilisateur/{{$u->id}}" onclick="return bloquerUtilisateur(event)">
                                        <li><i class="fa-solid fa-user-lock"></i>Bloquer</li>
                                    </a>
                                @endif
                            </ul>
                        </td>
                    </tr> 
                    @endforeach
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
        
        function supprimerUtilisateur(event){
            if(!confirm("Voulez-vous supprimer cet utilisateur ?")){
                event.preventDefault();
            }
        }
        
        function bloquerUtilisateur(event){
            if(!confirm("Voulez-vous bloquer cet utilisateur ?")){
                event.preventDefault();
            }
        }
        
        function debloquerUtilisateur(event){
            if(!confirm("Voulez-vous débloquer cet utilisateur ?")){
                event.preventDefault();
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
        // Auto-masquer le message de succès après 5 secondes
        setTimeout(function() {
            const boiteReponse = document.querySelector('.boite-reponse');
            if (boiteReponse) {
                boiteReponse.style.display = 'none';
            }
        }, 5000);
    </script>
</body>
</html>