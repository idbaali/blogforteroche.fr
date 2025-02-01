<style>
    /* Conteneur principal */
    .container {
        width: 90%;
        margin: auto;
    }

    /* Aligner les liens sur la même ligne */
    .header-links {
        display: flex;
        justify-content: space-between;
        align-items: center;
        margin-bottom: 10px;
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

    td a.view-article {
        display: inline-flex;
        align-items: center;
        margin-left: 5px;
    }

    /* Boutons */
    .submit {
        padding: 8px 20px;
        width: 225px;
        background-color: #556b2f;
        color: white;
        text-align: center;
        text-decoration: none;
        display: inline-block;
    }

    .submit:hover {
        background-color: #445522;
    }

    /* Style du lien "Voir" */
    .view-article {
        background-color: #445522;
        color: white;
        padding: 5px 8px;
        border-radius: 5px;
        text-decoration: none;
        font-size: 12px;
        margin-left: 10px;
        display: inline-block;
    }

    .view-article:hover {
        background-color: #445522;
    }
</style>

<div class="container">
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