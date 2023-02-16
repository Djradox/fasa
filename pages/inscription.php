<?php
session_start();
$bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8','root','root');

if (isset($_POST['envoi'])){
    if(!empty($_POST['username']) AND !empty($_POST['mdp'] AND !empty($_POST['nom'] AND !empty($_POST['prenom'])))){
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $username = htmlspecialchars($_POST['username']);
        $mdp = sha1($_POST['mdp']);
        $insertUser = $bdd->prepare('INSERT INTO users(nom, prenom, username, mdp) VALUES (?, ?, ?, ?)');
        $insertUser->execute($arrayName = array($nom, $prenom, $username, $mdp));

        $recupUser = $bdd->prepare('SELECT * FROM users WHERE username = ? AND mdp = ?');
        $recupUser->execute(array($username, $mdp));
        if($recupUser->rowCount() > 0){
            $_SESSION['nom'] = $nom;
            $_SESSION['prenom'] = $prenom;
            $_SESSION['username'] = $username;
            $_SESSION['mdp'] = $mdp;
            $_SESSION['id'] = $recupUser->fetch()['id'];
        }


    }else{
        echo "Veuillez compléter tous les champs";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/scss/styles2.css">
    <title>Inscription</title>
</head>
<body>
    
    <a class="btn back" href="../index.php">Retour à l'Accueil</a>

    <!-- zone de connexion -->
    <div id="container">
               
        <form action="" method="POST">
        <h1>Inscription</h1>
        
        <label><b>Votre nom</b></label>
        <input type="text" placeholder="Entrer votre nom" name="nom" required>

        <label><b>Votre prénom</b></label>
        <input type="text" placeholder="Entrer votre nom" name="prenom" required>

        <label><b>Nom d'utilisateur</b></label>
        <input type="text" placeholder="Entrer le nom d'utilisateur" name="username" required>
       
        <label><b>Mot de passe</b></label>
        <input type="password" placeholder="Entrer le mot de passe" name="mdp" required>
       
        <input type="submit" name="envoi" >
        </ul>

        </form>
        </div>









<!-- footer -->


<!-- Bootstrap js bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>