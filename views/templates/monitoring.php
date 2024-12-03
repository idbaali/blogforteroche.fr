<h2>Monitoring</h2>

<!-- Ici page complet -->

<p>Nombre d'utilisateurs : <?= $userCount ?></p>
<p>Nombre d'articles : <?= $articleCount ?></p>

<h3>Articles les plus consultés</h3>
<ul>
    <?php foreach ($mostViewedArticles as $article): ?>
        <li><?= htmlspecialchars($article->getTitle()) ?> (<?= $article->getViews() ?> vues)</li>
    <?php endforeach; ?>
</ul>

