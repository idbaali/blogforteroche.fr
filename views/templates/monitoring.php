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