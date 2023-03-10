<nav class="navbar">
    <div class="container-fluid hdr">
        <div class="row">
            <div class="col-md-4 logo">
                <a class="nav-brand-img" href="#">
                    <img src="images/asalogo.png" alt="logo" id="logo" title="ASA Social network">
                </a>
            </div>
            <div class="col-md-8 menu">
                <ul class="navbar-nav">
                    <li class="nav-item menuitem menuitem--mainmenu">
                        <a class="nav-link" href="#">Accueil </a>
                    </li>
                    <?php if($_SESSION) : ?>
                        <li class="nav-item menuitem menuitem--mainmenu">
                            <a class="nav-link" href="pages/mur.php">Mon Mur </a>
                        </li>
                        <li class="nav-item menuitem menuitem--login">
                            <a class="nav-link" href="pages/deconnexion.php">Se déconnecter </a>
                        </li>
                    <?php else : ?>
                        <li class="nav-item menuitem menuitem--login">
                            <a class="nav-link" href="pages/connexion.php">Espace membre </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </div>
</nav>