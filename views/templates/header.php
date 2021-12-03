<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../assets/css/style.css">
    <title>SSnails</title>
</head>
<body>
    <!-- Début header  -->
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-white">
            <div class="container-fluid">
                <a class="navbar-brand" href="#"><img src="/assets/img/logoSSnailswhite.JPG" alt="logo"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="/index.php">Accueil</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Rendez-vous</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#">Avis</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="/controllers/profilCtrl.php">Profil</a>
                        </li>       
                    </ul>                   
                    <div class="d-flex">
                        <?php
                            if(!isset($_SESSION['user'])){
                        ?>
                        <a class="nav-link" href="/controllers/registerCtrl.php">Inscription</a>
                        <a class="nav-link" href="/controllers/loginCtrl.php">Connexion</a>
                        <?php } else { ?>
                            <a class="nav-link" href="/controllers/disconnectCtrl.php">Déconnexion</a>
                        <?php } ?>
                    </div>
                </div>
            </div>
        </nav>
    </header>
    <!-- Fin header  -->

