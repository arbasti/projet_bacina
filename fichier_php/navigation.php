<nav class="navigation">
    <a href="accueil.php">Accueil</a>
    <a href="#" id="search-button">Rechercher</a>
    <div class="dropdown">
        <a href="#" class="dropbtn">Tout Parcourir</a>
        <div class="dropdown-content">
            <a href="specialistes.php?specialization=Généraliste">Médecins Généralistes</a>
            <div class="dropdown-specialized">
                <a href="#" class="dropbtn-specialized">Médecins Spécialisés</a>
                <div class="dropdown-content-specialized">
                    <a href="specialistes.php?specialization=Addictologie">Addictologie</a>
                    <a href="specialistes.php?specialization=Andrologie">Andrologie</a>
                    <a href="specialistes.php?specialization=Cardiologie">Cardiologie</a>
                    <a href="specialistes.php?specialization=Dermatologie">Dermatologie</a>
                    <a href="specialistes.php?specialization=Gastro-Hépato-Entérologie">Gastro-Hépato-Entérologie</a>
                    <a href="specialistes.php?specialization=Gynécologie">Gynécologie</a>
                    <a href="specialistes.php?specialization=IST">IST</a>
                    <a href="specialistes.php?specialization=Ostéopathie">Ostéopathie</a>
                </div>
            </div>
            <a href="laboratoire.php">Laboratoire</a>
        </div>
    </div>
    <a href="rendez-vous.php">Rendez-vous</a>
    <a href="votre-compte.php">Votre Compte</a>
    <?php if (isset($_SESSION['id']) && $_SESSION['id'] != NULL): ?>
        <a href="logout.php">Déconnexion</a>
    <?php endif; ?>
</nav>