<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>inscription</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    <link rel="stylesheet" href="style.css" />  

    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
    
    <!-- Custom styles for this template -->
  </head>

  <body class="text-center">

  <?php

require('config.php');


if (isset($_POST['username'], $_POST['password'])){

        // récupérer le nom d'utilisateur et supprimer les antislashes ajoutés par le formulaire
        $username = stripslashes($_POST['username']);
        $username = mysqli_real_escape_string($conn, $username);
        // récupérer le mot de passe et supprimer les antislashes ajoutés par le formulaire
        $password = stripslashes($_POST['password']);
        $password = mysqli_real_escape_string($conn, $password);
        // récupérer l'email et supprimer les antislashes ajoutés par le formulaire
        $nom = stripslashes($_REQUEST['nom']);
        $nom = mysqli_real_escape_string($conn, $nom);
        //requéte SQL + mot de passe crypté
        $query = "INSERT into `admin` (nom, username, password)
                    VALUES ('$nom', '$username', '$password')";
        // Exécuter la requête sur la base de données
         $res = mysqli_query($conn, $query);
    if($res){
       echo "<div class='sucess'>
             <h3>Vous êtes inscrit avec succès.</h3>
             <p>Cliquez ici pour vous <a href='connexion_admin.php'>connecter</a></p>
       </div>";
    }
}
else{?>
    
  <form method="POST" action="">

   <div class="form-floating">
      <input type="nom" name="nom" class="form-control" id="floatingPassword" placeholder="Nom" required>
      <label for="floatingPassword">Nom</label>
    </div>
    <div class="form-floating">
      <input type="username" name="username" class="form-control" id="floatingInput" placeholder="name@example.com" required>
      <label for="floatingInput">Nom d'utilisateur</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Mot de passe</label>
    </div>

    <button class="w-100 btn btn-lg btn-primary" type="submit">Enregistrer</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
  </form>
    <?}?>
  </body>
</html>
