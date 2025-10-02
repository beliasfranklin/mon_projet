<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Résultat recherche utilisateur</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
    <style>
        body { font-family: 'Rubik', 'Afacad Flux', sans-serif; background: #f6f6ff; margin: 0; }
        .container { max-width: 900px; margin: 40px auto; background: #fff; border-radius: 18px; box-shadow: 0 2px 12px rgba(71,61,131,0.09); padding: 32px 24px; }
        h2 { color: #473d83; font-size: 2em; font-weight: 700; margin-bottom: 18px; text-align: center; }
        .result-count { color: darkslateblue; font-weight: bold; margin-bottom: 18px; display: block; text-align: center; }
        table { width: 100%; border-collapse: collapse; background: #f6f6ff; border-radius: 12px; overflow: hidden; margin-top: 18px; }
        th, td { padding: 12px 10px; text-align: center; }
        th { background: #473d83; color: #fff; font-weight: 600; }
        tr { border-bottom: 1px solid #e5e7eb; }
        tr:last-child { border-bottom: none; }
        @media (max-width: 600px) {
            .container { padding: 6px 2vw; }
            h2 { font-size: 1.2em; }
            table, th, td { font-size: 0.9em; }
        }
    </style>
</head>
<body>
    <div class="container">
        <h2><i class="fa-solid fa-user-search"></i> Résultat de la recherche utilisateur</h2>
        <span class="result-count">{{ $users->count() }} résultat(s) trouvé(s)</span>
        <table>
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Rôle</th>
                    <th>Structure</th>
                    <th>Téléphone</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse($users as $u)
                <tr>
                    <td>{{ $u->id }}</td>
                    <td>{{ $u->name }}</td>
                    <td>{{ $u->email }}</td>
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
                            $tel = $telephone->where('id_user', $u->id)->first();
                        @endphp
                        {{ $tel ? $tel->numeroTelephone : '-' }}
                    </td>
                    <td>
                        @php
                            $statut = $statut_user->where('id_user', $u->id)->first();
                        @endphp
                        {{ $statut ? $statut->statut : '-' }}
                    </td>
                    <td>
                        <a href="/modifier_utilisateur/{{ $u->id }}"><i class="fa-solid fa-user-pen"></i></a>
                        <a href="/supprimer_utilisateur/{{ $u->id }}" onclick="return confirm('Supprimer cet utilisateur ?');"><i class="fa-solid fa-user-xmark"></i></a>
                        @if($statut && $statut->statut === 'bloqué')
                            <a href="/debloquer_utilisateur/{{ $u->id }}" onclick="return confirm('Débloquer cet utilisateur ?');"><i class="fa-solid fa-unlock"></i></a>
                        @else
                            <a href="/bloquer_utilisateur/{{ $u->id }}" onclick="return confirm('Bloquer cet utilisateur ?');"><i class="fa-solid fa-user-lock"></i></a>
                        @endif
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8">Aucun utilisateur trouvé.</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>
</html>