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


