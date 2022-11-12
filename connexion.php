<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.104.2">
    <title>Oasys consulting</title>

    <!-- CSS only -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

<link rel="stylesheet" href="style.css" />

<!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


    
    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
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
        //requéte SQL + mot de passe crypté
        $query = "SELECT * FROM `client` WHERE username='$username' and password='$password'";
        // Exécuter la requête sur la base de données
         $res = mysqli_query($conn, $query);
         $rows = mysqli_num_rows($res);
    if($rows!=0){
        $_SESSION['username'] = $username;
        header('location: client.php');      
      }
    else{ echo "<p><font color= 'red'> Le nom d'utilisateur ou le mot de passe est incorrect </font></p>";}
}
?>

<?       echo "<div class='sucess'>
             <h3>Vous n'avez pas encore de compte?</h3>
             <p>Cliquez ici pour vous <a href='inscription.php'>inscrire</a></p>
       </div>"
?>
    
<main class="form-signin w-100 m-auto">
  <form method="post">

    <div class="form-floating">
      <input type="username" name="username" class="form-control" id="floatingInput" placeholder="name@example.com" required>
      <label for="floatingInput">Nom d'utilisateur</label>
    </div>
    <div class="form-floating">
      <input type="password" name="password" class="form-control" id="floatingPassword" placeholder="Password" required>
      <label for="floatingPassword">Mot de passe</label>
    </div>

    <div class="checkbox mb-3">
      <label>
        <input type="checkbox" value="remember-me"> Remember me
      </label>
    </div>
    <button class="w-100 btn btn-lg btn-primary" type="submit">Connexion</button>
    <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
  </form>
</main>
<? echo '<a href="#"> mot de passe oublié?</a>'?>

    
  </body>
</html>
