<title>Gestion des Commentaires</title>
<style>
    table {
        width: 100%;
        border-collapse: collapse;
    }

    th,
    td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: #f4f4f4;
    }

    .pagination {
        margin-top: 20px;
        text-align: center;
    }

    .pagination a {
        margin: 0 5px;
        text-decoration: none;
        color: #007bff;
    }

    .pagination a.active {
        font-weight: bold;
        text-decoration: underline;
    }

    .filter {
        margin-bottom: 20px;
    }
</style>

<h1>Gestion des Commentaires</h1>

<a class="submit" href="index.php?action=showMonitoringPage">RETOUR</a>

<div class="filter">
    <form method="GET" action="showComment.php">
        <label for="articleId">Filtrer par article :</label>
        <input type="number" name="articleId" id="articleId" value="<?= htmlspecialchars($_GET['articleId'] ?? '') ?>">
        <button type="submit">Appliquer</button>
    </form>
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
                    <td><?= htmlspecialchars($comment->getIdArticle()) ?></td>
                    <td><?= htmlspecialchars($comment->getPseudo()) ?></td>
                    <td><?= htmlspecialchars($comment->getContent()) ?></td>
                    <td><?= htmlspecialchars($comment->getDateCreation()->format('Y-m-d H:i:s')) ?></td>
                    <td>
                        <a href="?action=deleteComment&commentId=<?= $comment->getId() ?>" onclick="return confirm('Voulez-vous vraiment supprimer ce commentaire ?');">
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

<div class="pagination">
    <?php for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="showComment.php?page=<?= $i ?>&articleId=<?= $articleId ?>"
            class="<?= $i == $currentPage ? 'active' : '' ?>">
            <?= $i ?>
        </a>
    <?php endfor; ?>
</div>
