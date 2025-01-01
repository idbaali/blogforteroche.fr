<h2>Monitoring</h2>

<p>Nombre d'utilisateurs : <?= $userCount ?></p>
<p>Nombre d'articles : <?= $articleCount ?></p>

<h3>Articles les plus consultés</h3>
<table>
    <thead>
        <tr>
            <th>Titre</th>
            <th>Nombre de vues</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($mostViewedArticles as $article): ?>
            <tr>
                <td><?= htmlspecialchars($article->getTitle()) ?></td>
                <td><?= $article->getViews() ?> vues</td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<h3>Gestion des Articles</h3>
<table>
    <thead>
        <tr>
            <th><a href="index.php?action=showMonitoringPage&orderby=title&orderdir=<?= $nextOrderDir ?>">Titre</a></th>
            <th><a href="index.php?action=showMonitoringPage&orderby=views&orderdir=<?= $nextOrderDir ?>">Vues</a></th>
            <th><a href="index.php?action=showMonitoringPage&orderby=comments_count&orderdir=<?= $nextOrderDir ?>">Commentaires</a></th>
            <th><a href="index.php?action=showMonitoringPage&orderby=date_creation&orderdir=<?= $nextOrderDir ?>">Date</a></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($articles as $article): ?>
            <tr>
                <td><?= htmlspecialchars($article->getTitle()) ?></td>
                <td><?= htmlspecialchars($article->getViews()) ?></td>
                <td><?= htmlspecialchars($article->getCommentsCount()) ?></td>
                <td><?= htmlspecialchars(Utils::convertDateToFrenchFormat($article->getDateCreation())) ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>