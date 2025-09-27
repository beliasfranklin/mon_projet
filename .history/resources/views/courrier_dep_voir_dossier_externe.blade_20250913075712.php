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
    <title>Ministre voir dossier - DEP MINSANTE</title>
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
        }
        
        .menus li a {
            text-decoration: none;
            color: white;
        }
        .menus li:hover{
            background-color: rgb(79, 55, 236);
            height: 30px;
            transition: 0.3s;
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
            width: 1150px;
            height: 900px;
        }
        .envoi_dossier_interne{
            font-size: 55px;
            color: darkslateblue;
            font-weight: bold;
        }
        .envoi_dossier_interne .dossier_inerne{
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
            cursor: pointer;
        }
        #nom{
            width: 350px;
            height: 30px;
            padding: 5px;
            font-size: 20px;
            padding-left: 30px;
            border-color: darkslateblue;
            font-family: 'Afacad Flux', 'Rubik', sans-serif;
        }
        #nom:hover{
            border-color: darkslateblue;
        }
        #email:hover{
            border-color: darkslateblue;
        }
        form i{
            position: absolute;
            margin-left: 5px;
            margin-top: 10px;
            color: darkslateblue;
            width: 20px;
            height: 20px;
        }
        #priorites{
            width: 200px;
            height: 40px;
            font-size: 20px;
            border-color: darkslateblue;
            margin-bottom: 10px;
            font-family: 'Afacad Flux', 'Rubik', sans-serif;
        }
        #commentaires{
            font-family: 'Afacad Flux', 'Rubik', sans-serif;
            border-color: darkslateblue;
            border-width: 2px;
        }   
        .document{
            width: 400px;
            height: 50px;
            border: 2px solid black;
            background-color: white;
            border-color: darkslateblue;
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
                <span class="font-size: 15px;"></span>
                <ul class="menus">
                    <li><a href="/dashboard_dep"><i class="fa-solid fa-gauge"></i>Tableau de bord</a></li>
                    <li><a href="/courrier_dep_voir_dossier_externe"><i class="fa-solid fa-inbox"></i>Consulter dossiers recus</a></li>
                    <li><a href="/se deconnecter/{{$user->id}}" onclick="seDeconnecter(event)"><span style="color: #ff0000;"><i class="fa-solid fa-right-from-bracket" style="color: #ff0000;"></i>Se deconnecter</span></a></li>
                </ul>
            </ul>
        </div>    
    </div>
    <div class="barre">
        Bienvenue, {{$user->name}}
        <i class="fa-solid fa-circle-user"></i>
        <span>{{$user->name}}</span>
    </div>
    <div class="espace_travail">
        <span class="envoi_dossier_interne"><span class="dossier_interne">Détails du dossier envoyé à la DEP</span></span><br><br><br>
            <span class="infos_dossiers">
                Numéro Ministre: {{$dossier->numeroMinistre}} <br><br>
                Intitulé du dossier : {{$dossier->intiulé}} <br><br>
                Type du dossier : {{$dossier->typeDossier}} <br><br>
                Envoyé le : {{$dossier->dateHeureEnvoiUsagerExterne}} <br><br>
                Par : {{$dossier->envoyer_par}} <br><br>
                Documents <br><br>
            </span>
            <table>
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nom du fichier</th>
                        <th>actions</th>
                    </tr>      
                </thead>
                <tbody>
                    @foreach ($pieces as $p)
                        <tr>
                            <td>{{$p->id}}</td>
                            <td>{{$p->nomPieceJointe}}</td>
                            <td>
                                <ul>
                                    <a href="/telecharger/{{$p->id}}" target="_blank"><li><i class="fa-solid fa-eyes"></i>Télécharger</li></a>
                                </ul>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table><br><br>
            <button class="bouton-validation">Envoyer Dossier à la DEP</button>
    </div>
    <script>
        function seDeconnecter(event){
            event.preventDefault();  //empêche la redirection par defaut du lien
            if(confirm("voulez vous deconnecter ?")){
                window.location.href="/se deconnecter/{{$user->id}}";
            }
        }
    </script>
</body>
</html>