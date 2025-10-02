@php
    use App\Models\StatutUser;
    $statut_user = StatutUser::all();
@endphp
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Utilisateurs</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body {
            font-family: 'Rubik', 'Afacad Flux', sans-serif;
            background: linear-gradient(120deg, #f6f6ff 0%, #e9e6fa 100%);
            margin: 0;
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
        .search-bar {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            align-items: center;
            margin-bottom: 24px;
            justify-content: center;
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
        .result-count {
            color: darkslateblue;
            font-weight: bold;
            margin-bottom: 18px;
            display: block;
            text-align: center;
        }
        .create-btn {
            display: block;
            margin: 0 auto 24px auto;
            padding: 12px 28px;
            border-radius: 8px;
            background: darkslateblue;
            color: #fff;
            font-weight: 600;
            border: none;
            font-size: 1.1em;
            cursor: pointer;
            transition: background 0.2s;
        }
        .create-btn:hover {
            background: #473d83;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 18px;
            background: #f6f6ff;
            border-radius: 12px;
            overflow: hidden;
        }
        th, td {
            padding: 12px 10px;
            text-align: left;
        }
        th {
            background: #e9e6fa;
            color: #473d83;
            font-weight: 600;
        }
        tr {
            border-bottom: 1px solid #e5e7eb;
        }
        tr:last-child {
            border-bottom: none;
        }
        td ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            gap: 10px;
        }
        td ul a li {
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
        td ul a li:hover {
            background: darkslateblue;
            color: #fff;
        }
        @media (max-width: 900px) {
            .container {
                padding: 12px 4vw;
            }
            .search-bar {
                flex-direction: column;
                align-items: stretch;
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
    <div class="container">
        <h2><i class="fa-solid fa-users"></i> Gestion des Utilisateurs</h2>
        <form method="post" action="/rechercher_utilisateur" class="search-bar">
            @csrf
            <input type="text" name="recherche" placeholder="Nom ou email" value="{{ old('recherche', isset($recherche) ? $recherche : '') }}">
            <select name="statut">
                <option value="tous" {{ (isset($statut) && $statut=='tous') ? 'selected' : '' }}>Tous statuts</option>
                <option value="actif" {{ (isset($statut) && $statut=='actif') ? 'selected' : '' }}>Actif</option>
                <option value="inactif" {{ (isset($statut) && $statut=='inactif') ? 'selected' : '' }}>Inactif</option>
                <option value="bloqué" {{ (isset($statut) && $statut=='bloqué') ? 'selected' : '' }}>Bloqué</option>
            </select>
            <select name="role">
                <option value="tous" {{ (isset($role) && $role=='tous') ? 'selected' : '' }}>Tous rôles</option>
                @foreach($roles as $r)
                    <option value="{{$r->nomRole}}" {{ (isset($role) && $role==$r->nomRole) ? 'selected' : '' }}>{{$r->nomRole}}</option>
                @endforeach
            </select>
            <select name="structure">
                <option value="tous" {{ (isset($structure) && $structure=='tous') ? 'selected' : '' }}>Toutes structures</option>
                @foreach($structures as $s)
                    <option value="{{$s->nomStructure}}" {{ (isset($structure) && $structure==$s->nomStructure) ? 'selected' : '' }}>{{$s->nomStructure}}</option>
                @endforeach
            </select>
            <input type="date" name="date_debut" value="{{ old('date_debut', isset($date_debut) ? $date_debut : '') }}">
            <input type="date" name="date_fin" value="{{ old('date_fin', isset($date_fin) ? $date_fin : '') }}">
            <input type="submit" value="Rechercher">
            <a href="/gerer_utilisateurs"><button type="button">Réinitialiser</button></a>
        </form>
        <span class="result-count">
            {{ isset($users) ? $users->count() : count($users) }} résultat(s) trouvé(s)
        </span>
        <a href="/creer_utilisateur">
            <button class="create-btn"><i class="fa-solid fa-user-plus"></i> Créer un nouvel utilisateur</button>
        </a>
        <table>
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Téléphone</th>
                    <th>Rôle</th>
                    <th>Structure</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $u)
                    <tr>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>
                            @php
                                $tel = $telephone->where('id_user', $u->id)->first();
                            @endphp
                            {{ $tel ? $tel->numeroTelephone : '-' }}
                        </td>
                        <td>
                            @php
                                $role = $user_role->where('id_user', $u->id)->first();
                                $roleName = $role && $roles->where('id', $role->id_role)->first() ? $roles->where('id', $role->id_role)->first()->nomRole : '-';
                            @endphp
                            {{ $roleName }}
                        </td>
                        <td>
                            @php
                                $struct = $users_structures->where('user_id', $u->id)->first();
                                $structName = $struct && $structures->where('id', $struct->structure_id)->first() ? $structures->where('id', $struct->structure_id)->first()->nomStructure : '-';
                            @endphp
                            {{ $structName }}
                        </td>
                        <td>
                            @php
                                $statut = $statut_user->where('id_user', $u->id)->first();
                            @endphp
                            {{ $statut ? $statut->statut : '-' }}
                        </td>
                        <td>
                            <ul>
                                <a href="/modifier_utilisateur/{{$u->id}}">
                                    <li><i class="fa-solid fa-user-pen"></i> Modifier</li>
                                </a>
                                <a href="/supprimer_utilisateur/{{$u->id}}" onclick="return confirm('Voulez-vous vraiment supprimer cet utilisateur ?');">
                                    <li><i class="fa-solid fa-user-xmark"></i> Supprimer</li>
                                </a>
                                @if($statut && $statut->statut === 'bloqué')
                                    <a href="/debloquer_utilisateur/{{$u->id}}" onclick="return confirm('Voulez-vous débloquer cet utilisateur ?');">
                                        <li style="background-color: #28a745; color: #fff;"><i class="fa-solid fa-unlock"></i> Débloquer</li>
                                    </a>
                                @else
                                    <a href="/bloquer_utilisateur/{{$u->id}}" onclick="return confirm('Voulez-vous bloquer cet utilisateur ?');">
                                        <li><i class="fa-solid fa-user-lock"></i> Bloquer</li>
                                    </a>
                                @endif
                            </ul>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</body>
</html>