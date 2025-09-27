@use('Illuminate\Support\Facades\Schema')

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    @include('en_tete')
    <form action="/visionner_email" method="post">
        @csrf
        <input type="text" name="email" placeholder="votre email" required>
        <input type="submit" value="afficher votre email">
    </form>
    <table style="border: 2px solid black;">
        <tr>
            <td>id</td>
            <td>Nom</td>
            <td>Email</td>
        </tr>
        @foreach ($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
            </tr>
        @endforeach
    </table>
</body>
</html>