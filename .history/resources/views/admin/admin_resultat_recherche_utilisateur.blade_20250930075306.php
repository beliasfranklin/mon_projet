
@php
    use App\Models\StatutUser;
    $statut_user = StatutUser::all();
@endphp
<!DOCTYPE html>
<html lang="fr">
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
    <title>Résultat recherche utilisateur - DEP MINSANTE</title>
    <style>
        body {
            font-family: 'Afacad Flux', 'Rubik', sans-serif;
            margin: 0;
            background: linear-gradient(120deg, #f6f6ff 0%, #e9e6fa 100%);
            color: #1e293b;
        }
        .container {
            max-width: 1100px;
            margin: 40px auto;
            background: #fff;
            border-radius: 18px;
            box-shadow: 0 2px 12px rgba(71,61,131,0.09);
            padding: 32px 24px;
        }
        h2 {
            color: #473d83;
            font-size: 2em;
            font-weight: 700;
            margin-bottom: 18px;
            text-align: center;
        }
        .result-count {
            color: darkslateblue;
            font-weight: bold;
            margin-bottom: 18px;
            display: block;
            text-align: center;
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
        @media (max-width: 900px) {
            .container {
                padding: 12px 4vw;
            }
            table, th, td {
                font-size: 0.95em;
            }
        }
        @media (max-width: 600px) {
            .container {
                padding: 6px 2vw;
            }
            h2 {
                font-size: 1.2em;
            }
            table, th, td {
                font-size: 0.9em;
            }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><i class="fa-solid fa-user-search"></i> Résultat de la recherche utilisateur</h2>
        <span class="result-count">{{ $users->count() }} résultat(s) trouvé(s)</span>
        <a href="/gerer_utilisateurs">
            <button class="bouton-validation"><i class="fa-solid fa-arrow-left"></i> Retour à la gestion</button>
        </a>
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
                    <td>{{ $u->id }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
                    <td>
                        @foreach ($user_role as $ur)
                            @if ($u->id==$ur->id_user)
                                @foreach ($roles as $r)
                                    @if ($r->id==$ur->id_role)
                                        {{ $r->nomRole }}    
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
                                        {{ $s->nomStructure }}    
                                    @endif         
                                @endforeach
                            @endif  
                        @endforeach
                    </td>
                    <td>
                        @foreach ($telephone as $t)
                            @if ($u->id==$t->id_user)
                                {{ $t->numeroTelephone }}
                            @endif   
                        @endforeach
                    </td>
                    <td>
                        @foreach ($statut_user as $su)
                            @if ($u->id==$su->id_user)
                                {{ $su->statut }}
                            @endif
                        @endforeach
                    </td>
                    <td>
                        <ul>
                            <a href="/modifier_utilisateur/{{ $u->id }}"><li><i class="fa-solid fa-user-pen"></i>Modifier</li></a>
                            <a href="/supprimer_utilisateur/{{ $u->id }}" onclick="supprimerUtilisateur(event)" class="user" data-user-id="{{ $u->id }}"><li><i class="fa-solid fa-user-xmark"></i>Supprimer</li></a>
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
                                <a href="/debloquer_utilisateur/{{ $u->id }}" onclick="debloquerUtilisateur(event)"><li style="background-color: darkslateblue;"><i class="fa-solid fa-unlock"></i>Débloquer</li></a>
                            @else
                                <a href="/bloquer_utilisateur/{{ $u->id }}" onclick="bloquerUtilisateur(event)"><li><i class="fa-solid fa-user-lock"></i>Bloquer</li></a>
                            @endif
                        </ul>
                    </td>
                </tr> 
                @endforeach
            </tbody>
        </table>
    </div>
    <script>
        function supprimerUtilisateur(event){
            if(confirm("voulez vous supprimer cet utilisateur ?")==true){
                window.location.href=event.currentTarget.getAttribute('href');
            }
        }
        function bloquerUtilisateur(event){
            event.preventDefault();
            if(confirm("voulez vous bloquer cet utilisateur ?")){
                window.location.href=event.currentTarget.getAttribute('href');
            }
        }
        function debloquerUtilisateur(event){
            event.preventDefault();
            if(confirm("Voulez-vous débloquer cet utilisateur ?")){
                window.location.href=event.currentTarget.getAttribute('href');
            }
        }
    </script>
</body>
</html>