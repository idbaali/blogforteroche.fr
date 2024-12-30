<!DOCTYPE html>
<html>

<head>
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
</head>

<body>
    <h1>Gestion des Commentaires</h1>

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
                        <td><?= htmlspecialchars($comment['id']) ?></td>
                        <td><?= htmlspecialchars($comment['id_article']) ?></td>
                        <td><?= htmlspecialchars($comment['pseudo']) ?></td>
                        <td><?= htmlspecialchars($comment['content']) ?></td>
                        <td><?= htmlspecialchars($comment['date_creation']) ?></td>
                        <td>
                            <a href="?action=deleteComment&commentId=<?= $comment['id'] ?>" onclick="return confirm('Voulez-vous vraiment supprimer ce commentaire ?');">
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
            <a href="showComment.php?page=<?= $i ?>&<?= http_build_query($_GET) ?>"
                class="<?= $i == $currentPage ? 'active' : '' ?>">
                <?= $i ?>
            </a>
        <?php endfor; ?>
    </div>
</body>

</html>