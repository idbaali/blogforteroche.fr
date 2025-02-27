<?php

/**
 * Ce fichier est le template principal qui "contient" ce qui aura été généré par les autres vues.  
 * 
 * Les variables qui doivent impérativement être définie sont : 
 *      $title string : le titre de la page.
 *      $content string : le contenu de la page. 
 */

?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Emilie Forteroche</title>
    <link rel="stylesheet" href="./css/style.css">
    <script src="https://kit.fontawesome.com/cf1feb7f30.js" crossorigin="anonymous"></script>
</head>

<body>

    <header>
        <nav>
            <a href="index.php">Articles</a>
            <a href="index.php?action=apropos">À propos</a>

            <!-- Ici -->
            <a href="index.php?action=admin">Page de Monitoring</a>
            <?php
            // Si on est connecté, on affiche le bouton de déconnexion, sinon, on affiche le bouton de connexion : 
            if (isset($_SESSION['user'])) {
                echo '<a href="index.php?action=disconnectUser">Déconnexion</a>';
            }
            ?>
        </nav>
        <h1>Emilie Forteroche</h1>
    </header>

    <main>
        <?= $content /* Ici est affiché le contenu réel de la page. */ ?>
    </main>

    <footer>
        <p>Copyright © Emilie Forteroche 2023 - Openclassrooms - <a href="index.php?action=admin">Admin</a>
    </footer>

</body>

</html>