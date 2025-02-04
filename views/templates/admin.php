<style>
    /* monitoring */
    .header-links {
        display: flex;
        justify-content: space-between;
        align-items: center;
        width: 100%;
    }

    .rechts {
        padding: 5px 10px;
        font-weight: bold;
        color: white;
        background-color: var(--commentColor);
        border: none;
        width: 210px;
    }
</style>

<div class="header-links">
    <h2>Édition des articles</h2>
    <a class="rechts" href="index.php?action=showMonitoringPage">Accéder aux articles</a>
</div>

<div class="adminArticle">
    <?php foreach ($articles as $article) { ?>
        <div class="articleLine">
            <div class="title"><?= $article->getTitle() ?></div>
            <div class="content"><?= $article->getContent(200) ?></div>
            <div><a class="submit" href="index.php?action=showUpdateArticleForm&id=<?= $article->getId() ?>">Modifier</a></div>
            <div><a class="submit" href="index.php?action=deleteArticle&id=<?= $article->getId() ?>" <?= Utils::askConfirmation("Êtes-vous sûr de vouloir supprimer cet article ?") ?>>Supprimer</a></div>
        </div>
    <?php } ?>
</div>

<a class="submit" href="index.php?action=showUpdateArticleForm">Ajouter un article</a>