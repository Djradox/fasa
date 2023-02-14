<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8','root','root');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/train/scss/styles2.css">
    <title>Connexion</title>
</head>
<body>
    
    <a class="btn back" href="../index.php">Retour à l'Accueil </a>

    <!-- zone de connexion -->
    <div id="container">
               
        <form action="" method="POST">
        <h1>Connexion</h1>
        
        <label><b>Nom d'utilisateur</b></label>
        <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
       
        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrer le mot de passe" name="mdp" required>
       
        <input type="submit" name="envoi" >
        </ul>
        Nouveau sur le site? <a class="link" href="inscription.php">Créer un compte</a>
        </form>

        <?php
        if (isset($_POST['envoi'])){
            if(!empty($_POST['username']) AND !empty($_POST['mdp'] )){
                $username = htmlspecialchars($_POST['username']);
                $mdp = sha1($_POST['mdp']);;
        
                $recupUser = $bdd->prepare('SELECT * FROM users WHERE username = ? AND mdp = ?');
                $recupUser->execute(array($username, $mdp));
        
                if($recupUser->rowCount() > 0){
                    $_SESSION['username'] = $username;
                    $_SESSION['mdp'] = $mdp;
                    $_SESSION['id'] = $recupUser->fetch()['id'];
                    header('location: ../index.php');
        
                }else{
                    echo '<br> Votre mot de passe ou pseudo est inccorect <br>';
                }
            }    
        }
        ?>

        </div>
        








<!-- footer -->


<!-- Bootstrap js bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>