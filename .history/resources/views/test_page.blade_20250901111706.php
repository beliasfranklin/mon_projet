<!--
<form method="post"action="/date">
    @csrf
    <input type="date" name="date" id="date">
    <input type="submit" value="soumettre">
</form>

<style>
    #option{
        width: 300px;
        height: 40px;
        font-size: 20px;
        border-color: darkslateblue;
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
</style>
<form method="post" action="/option">
    @csrf
    <select name="option" id="option">
        <option value="lundi">lundi</option>
        <option value="mardi">mardi</option>
        <option value="mercredi">mercredi</option>
    </select>
    <input type="submit" value="soumettre" class="bouton-validation">
</form>

<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Navbar avec menu profil</title>
  <style>
    body {
      margin: 0;
      font-family: Arial, sans-serif;
    }

    /* Navbar */
    .navbar {
      position: fixed;
      top: 0; left: 0;
      width: 100%;
      height: 60px;
      background: #333;
      color: white;
      display: flex;
      align-items: center;
      justify-content: space-between;
      padding: 0 20px;
      z-index: 1000;
    }

    .navbar h2 {
      margin: 0;
    }

    /* Icône profil */
    .profile {
      position: relative; /* important pour le dropdown */
      cursor: pointer;
    }

    .profile img {
      width: 40px;
      height: 40px;
      border-radius: 50%;
    }

    /* Menu dropdown */
    .dropdown {
      position: absolute;
      top: 60px; /* en dessous de la navbar */
      right: 0;
      background: white;
      color: black;
      min-width: 150px;
      box-shadow: 0 4px 8px rgba(0,0,0,0.2);
      border-radius: 6px;
      overflow: hidden;
      display: none; /* caché par défaut */
    }

    .dropdown a {
      display: block;
      padding: 10px 15px;
      text-decoration: none;
      color: black;
    }

    .dropdown a:hover {
      background: #f0f0f0;
    }

    /* Contenu de la page */
    .content {
      margin-top: 70px;
      padding: 20px;
    }
  </style>
</head>
<body>

  <div class="navbar">
    <h2>Mon Site</h2>
    <div class="profile" onclick="toggleMenu()">
      <img src="https://i.pravatar.cc/40" alt="Profil">
      <div class="dropdown" id="dropdown">
        <a href="#">Mon Profil</a>
        <a href="#">Paramètres</a>
        <a href="#">Déconnexion</a>
      </div>
    </div>
  </div>

  <div class="content">
    <h1>Bienvenue 👋</h1>
    <p>Voici du contenu de la page. Clique sur l’icône profil en haut à droite pour voir le menu.</p>
  </div>

  <script>
    function toggleMenu() {
      const menu = document.getElementById("dropdown");
      menu.style.display = menu.style.display === "block" ? "none" : "block";
    }

    // Fermer le menu si on clique ailleurs
    window.addEventListener("click", function(e) {
      const profile = document.querySelector(".profile");
      if (!profile.contains(e.target)) {
        document.getElementById("dropdown").style.display = "none";
      }
    });
  </script>

</body>
</html>

-->
<!--
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">

    <style>
        body{
            background-color: rgb(236, 246, 246);
        }
    table tbody{
        background-color: white;
    }
    table{
        width:  80%;
        height: 30%;
        border-collapse: collapse;
        border-style: none;
    }
    table th{
        background-color: rgb(79, 139, 61);
        height: 150px;
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

    }
    table ul li i{
        padding-right: 5px;
    }
    table tr:nth-child(even) {
        background-color: #f2f2f2; /* Lignes paires en gris clair */
    }
    table tr{
        height: 80px;
    }
</style>
    <title>Document</title>
</head>
<body>
   <table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Role</th>
            <th>Structure</th>
            <th>Téléphone</th>
            <th>Actions</th>
        </tr>      
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>belias</td>
            <td>belias@email</td>
            <td>Agent DEP</td>
            <td>CPP</td>
            <td>6987412563</td>
            <td>
                <ul>
                    <li><i class="fa-solid fa-user-pen"></i>Modifier</li>
                    <li><i class="fa-solid fa-user-xmark"></i>Supprimer</li>
                    <li><i class="fa-solid fa-user-lock"></i>Bloquer</li>
                </ul>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>belias</td>
            <td>belias@email</td>
            <td>directeur</td>
            <td>DEP</td>
            <td>6987412563</td>
            <td>
                <ul>
                    <li><i class="fa-solid fa-user-pen"></i>Modifier</li>
                    <li><i class="fa-solid fa-user-xmark"></i>Supprimer</li>
                    <li><i class="fa-solid fa-user-lock"></i>Bloquer</li>
                </ul>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>belias</td>
            <td>belias@email</td>
            <td>utilisateur externe</td>
            <td>DEP</td>
            <td>6987412563</td>
            <td>
                <ul>
                    <li><i class="fa-solid fa-user-pen"></i>Modifier</li>
                    <li><i class="fa-solid fa-user-xmark"></i>Supprimer</li>
                    <li><i class="fa-solid fa-user-lock"></i>Bloquer</li>
                </ul>
            </td>
        </tr>
        <tr>
            <td>2</td>
            <td>belias</td>
            <td>belias@email</td>
            <td>admin</td>
            <td>DEP</td>
            <td>6987412563</td>
            <td></td>
        </tr>
    </tbody>
</table><br><br>

<table>
    <thead>
        <tr>
            <th>#</th>
            <th>Nom</th>
            <th>Email</th>
            <th>Role</th>
            <th>Structure</th>
            <th>Téléphone</th>
            <th>Actions</th>
        </tr>      
    </thead>
    <tbody>
        <tr>
            <td>1</td>
            <td>belias</td>
            <td>belias@email</td>
            <td>Agent DEP</td>
            <td>CPP</td>
            <td>6987412563</td>
            <td></td>
        </tr>
        <tr>
            <td>2</td>
            <td>belias</td>
            <td>belias@email</td>
            <td>directeur</td>
            <td>DEP</td>
            <td>6987412563</td>
            <td></td>
        </tr>
        <tr>
            <td>2</td>
            <td>belias</td>
            <td>belias@email</td>
            <td>utilisateur externe</td>
            <td>DEP</td>
            <td>6987412563</td>
            <td></td>
        </tr>
        <tr>
            <td>2</td>
            <td>belias</td>
            <td>belias@email</td>
            <td>admin</td>
            <td>DEP</td>
            <td>6987412563</td>
            <td></td>
        </tr>
    </tbody>
</table>

 
</body>
</html>

-->
<button id="titre" onclick="afficherNomDate()">Bonjour</button>
<script>
  for (let i = 1; i <= 10; i++) {
    switch(i){
      case i%2==0:
        console.log(i+"Fizz");
        break;
      case i%5==0:
        console.log(i+" Buzz");
        break;
      case i%5==0 && i%3==0:
        console.log(i+"FizzBuzz");
      default:
        console.log('rien');
    }
    
  }  
</script>