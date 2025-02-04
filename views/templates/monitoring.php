<style>
    /* Aligner les liens sur la même ligne */
    .header-links {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
        width: 100%;
    }

    /* Tableaux stylisés */
    table {
        width: 100%;
        border-collapse: collapse;
        background-color: #99a140;
        color: white;
    }

    th,
    td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }

    /* Liens dans les colonnes du tableau */
    th a {
        text-decoration: none;
        color: white;
        display: flex;
        align-items: center;
    }

    th a i {
        margin-left: 10px;
    }

    /* Boutons */
    .submit {
        padding: 8px 20px;
        width: 340px;
    }

    .submit:hover {
        background-color: #556b2f;
    }

    /* Style du lien "Voir" */
    .view-comments {
        background-color: #556b2f;
        color: white;
        padding: 5px 8px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 12px;
        margin-left: 10px;
        display: inline-block;
    }

    .view-comments:hover {
        background-color: #556b2f;
    }
</style>

<div class="container">
    <div class="header-links">
        <h2>Gestion des Articles</h2>
        <a class="submit" href="index.php?action=showComments">Accéder aux commentaires</a>
    </div>

    <table>
        <thead>
            <tr>
                <th><a href="index.php?action=showMonitoringPage&orderby=title&orderdir=<?= $nextOrderDir ?>">Titre <i class="fa-solid fa-sort"></i></a></th>
                <th><a href="index.php?action=showMonitoringPage&orderby=views&orderdir=<?= $nextOrderDir ?>">Vues <i class="fa-solid fa-sort"></i></a></th>
                <th><a href="index.php?action=showMonitoringPage&orderby=date_creation&orderdir=<?= $nextOrderDir ?>">Publié le <i class="fa-solid fa-sort"></i></a></th>
                <th><a href="index.php?action=showMonitoringPage&orderby=comments_count&orderdir=<?= $nextOrderDir ?>">Commentaires <i class="fa-solid fa-sort"></i></a></th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($articles as $article): ?>
                <tr>
                    <td><?= htmlspecialchars($article->getTitle()) ?></td>
                    <td><?= htmlspecialchars($article->getViews()) ?></td>
                    <td><?= htmlspecialchars(Utils::convertDateToFrenchFormat($article->getDateCreation())) ?></td>
                    <td>
                        <?= htmlspecialchars($article->getCommentsCount()) ?>
                        <?php if ($article->getCommentsCount() > 0): ?>
                            <a href="index.php?action=showComments&id=<?= $article->getId() ?>" class="view-comments"><i class="fa-regular fa-eye"></i></a>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>