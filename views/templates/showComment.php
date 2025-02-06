<div class="container show">
    <div class="header-links">
        <h2>Gestion des Commentaires</h2>
        <a class="submit" href="index.php?action=showMonitoringPage">Retour aux articles</a>
    </div>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Article</th>
                <th>Pseudo</th>
                <th>Commentaire</th>
                <th>Date</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($comments)): ?>
                <?php foreach ($comments as $comment): ?>
                    <tr>
                        <td><?= htmlspecialchars($comment->getId()) ?></td>
                        <td>
                            <?= htmlspecialchars($comment->getIdArticle()) ?>
                            <a href="index.php?action=showArticle&id=<?= $comment->getIdArticle() ?>" class="view-article"><i class="fa-regular fa-eye"></i></a>
                        </td>
                        <td><?= htmlspecialchars($comment->getPseudo()) ?></td>
                        <td><?= htmlspecialchars($comment->getContent()) ?></td>
                        <td><?= htmlspecialchars($comment->getDateCreation()->format('Y-m-d H:i:s')) ?></td>
                        <td>
                            <a href="?action=deleteComment&commentId=<?= $comment->getId() ?>"
                                onclick="return confirm('Voulez-vous vraiment supprimer ce commentaire ?');" class="view-article">
                                Supprimer
                            </a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="6">Aucun commentaire trouvé.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</div>