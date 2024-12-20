<?php
// Les données
$data = [
    ['name' => 'Alice', 'age' => 25, 'city' => 'Paris', 'comment' => 'Active user', 'date' => '2024-12-01'],
    ['name' => 'Bob', 'age' => 30, 'city' => 'Lyon', 'comment' => 'New member', 'date' => '2024-11-20'],
    ['name' => 'Charlie', 'age' => 22, 'city' => 'Marseille', 'comment' => 'Frequent contributor', 'date' => '2024-12-10']
];


?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tableau avec tri</title>
    <style>
        /* Styles du tableau */
        table { border-collapse: collapse; width: 100%; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; cursor: pointer; }
        .sorted { font-weight: bold; }
        .sorted.asc::after { content: " ▲"; }
        .sorted.desc::after { content: " ▼"; }
    </style>
</head>
<body>
    <h1>Tableau avec tri dynamique</h1>
    <table>
        <thead>
            <tr>
                <!-- En-têtes cliquables pour chaque colonne -->
                <th class="<?= $column === 'name' ? 'sorted ' . $order : '' ?>">
                    <a href="?column=name&order=<?= toggleOrder($order) ?>">Nom</a>
                </th>
                <th class="<?= $column === 'age' ? 'sorted ' . $order : '' ?>">
                    <a href="?column=age&order=<?= toggleOrder($order) ?>">Âge</a>
                </th>
                <th class="<?= $column === 'city' ? 'sorted ' . $order : '' ?>">
                    <a href="?column=city&order=<?= toggleOrder($order) ?>">Ville</a>
                </th>
                <th class="<?= $column === 'comment' ? 'sorted ' . $order : '' ?>">
                    <a href="?column=comment&order=<?= toggleOrder($order) ?>">Commentaire</a>
                </th>
                <th class="<?= $column === 'date' ? 'sorted ' . $order : '' ?>">
                    <a href="?column=date&order=<?= toggleOrder($order) ?>">Date</a>
                </th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
                <!-- Affichage des données dans le tableau -->
                <tr>
                    <td><?= htmlspecialchars($row['name']) ?></td>
                    <td><?= htmlspecialchars($row['age']) ?></td>
                    <td><?= htmlspecialchars($row['city']) ?></td>
                    <td><?= htmlspecialchars($row['comment']) ?></td>
                    <td><?= htmlspecialchars($row['date']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
