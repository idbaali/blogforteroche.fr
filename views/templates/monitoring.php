<a class="submit" href="index.php?action=showComment">ACCEDEZ AUX COMMENTAIRES</a>
<a class="" href="index.php?action=admin">RETOUR</a>


<!-- <p>Nombre d'utilisateurs : <?= $userCount ?></p>
<p>Nombre d'articles : <?= $articleCount ?></p> -->


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
