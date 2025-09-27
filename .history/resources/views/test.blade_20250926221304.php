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
    <form action="/test" method="POST">
        @csrf
        <input type="text" name="nom" id="nom" placeholder="Entrez votre nom">
        <input type="submit" value="Envoyer">
    </form>

</body>
</html>