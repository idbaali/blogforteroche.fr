<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        table {
            border-collapse: collapse;
            width: 100%;
        }

        th,
        td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
            cursor: pointer;
        }

        .sorted {
            font-weight: bold;
        }

        .sorted.asc::after {
            content: " ▲";
        }

        .sorted.desc::after {
            content: " ▼";
        }
    </style>
    <!-- <title>Gestion des Articles</title> -->
</head>

<body>

    <a class="submit" href="index.php?action=showComment">Gestion des Commentaires</a>

    <h1>Gestion des Articles</h1>
    <table>
        <thead>
            <tr>
                <th><a href="index.php?action=affichagePage&orderby=title&orderdir=<?= $nextOrderDir ?>">Titre</a></th>
                <th><a href="index.php?action=affichagePage&orderby=views&orderdir=<?= $nextOrderDir ?>">Vues</a></th>
                <th><a href="index.php?action=affichagePage&orderby=comments_count&orderdir=<?= $nextOrderDir ?>">Commentaires</a></th>
                <th><a href="index.php?action=affichagePage&orderby=date_creation&orderdir=<?= $nextOrderDir ?>">Date</a></th>
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
</body>

</html>