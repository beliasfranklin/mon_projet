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
    <form action="/test" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="fichiers[]" id="fichiers" multiple enctype="multipart/form-data">
        <button type="submit">Test</button>
    </form>
    <a href="Dossier1/">telecharger</a>
</body>
</html>