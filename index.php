<!-- Session -->
<?php
session_start();
require 'vendor/autoload.php';
Carbon\Carbon::setLocale('fr_FR');
$date = Carbon\Carbon::now();
$date->subDays(5);
// echo $date->diffForHumans();
$bdd = new PDO('mysql:host=localhost;dbname=espace_membre;charset=utf8','root','root');
?>
<!-- Session -->

<!-- HTML -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="/scss/styles.css?v=<?= time(); ?>">
    <title>FASA</title>
</head>

<body>

        <!-- nav -->
        <?php 
            include 'elements/header.php';
        ?>
        <!-- nav -->


                    <!-- Body -->
                    <div class="container-fluid body">
                    <div class="row mb-3">
                        <div class="p-2 m-4 mb-md-4 col-md-4 mx-auto d-flex justify-content-center align-items-center bd-highlight">
                            <p class="indexcard">
                                Bienvenue sur Fasa
                            </p>
                        </div>
                        <div class="p-2 m-4 mb-md-4 col-md-4 mx-auto d-flex justify-content-center align-items-center bd-highlight">
                            Flex item 2
                        </div>
                    </div> <!-- /.row -->
                    </div>

                    
                    <!-- Body -->

<!-- footer -->
<?php
if($_SESSION){
echo $_SESSION['username'];
}
else
?>
<!-- footer -->

<!-- Bootstrap js bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
<!-- Bootstrap js bundle -->

</body>
</html>