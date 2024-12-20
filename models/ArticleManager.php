<?php

/**
 * Classe qui gère les articles.
 */
class ArticleManager extends AbstractEntityManager
{
    /**
     * Récupère tous les articles.
     * @return array : un tableau d'objets Article.
     */
    public function getAllArticles(): array
    {
        $sql = "SELECT * FROM article";
        $result = $this->db->query($sql);
        $articles = [];

        while ($article = $result->fetch()) {
            $articles[] = new Article($article);
        }
        return $articles;
    }

    /**
     * Récupère un article par son id.
     * @param int $id : l'id de l'article.
     * @return Article|null : un objet Article ou null si l'article n'existe pas.
     */
    public function getArticleById(int $id): ?Article
    {
        $sql = "SELECT * FROM article WHERE id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $article = $result->fetch();
        if ($article) {
            return new Article($article);
        }
        return null;
    }

    /**
     * Ajoute ou modifie un article.
     * On sait si l'article est un nouvel article car son id sera -1.
     * @param Article $article : l'article à ajouter ou modifier.
     * @return void
     */
    public function addOrUpdateArticle(Article $article): void
    {
        if ($article->getId() == -1) {
            $this->addArticle($article);
        } else {
            $this->updateArticle($article);
        }
    }

    /**
     * Ajoute un article.
     * @param Article $article : l'article à ajouter.
     * @return void
     */
    public function addArticle(Article $article): void
    {
        $sql = "INSERT INTO article (id_user, title, content, views, date_creation) VALUES (:id_user, :title, :content, NOW())";
        $this->db->query($sql, [
            'id_user' => $article->getIdUser(),
            'title' => $article->getTitle(),
            'content' => $article->getContent(),
            'views' => $article->getViews()
        ]);
    }

    /**
     * Modifie un article.
     * @param Article $article : l'article à modifier.
     * @return void
     */
    public function updateArticle(Article $article): void
    {
        $sql = "UPDATE article SET title = :title, content = :content, views = :views, date_update = NOW() WHERE id = :id";
        $this->db->query($sql, [
            'title' => $article->getTitle(),
            'content' => $article->getContent(),
            'id' => $article->getId(),
            'views' => $article->getViews()
        ]);
    }


    // Début 

    public function getArticleCount(): int
    {
        $db = DBManager::getInstance()->getPDO();
        $query = $db->query("SELECT COUNT(*) as count FROM article");
        $result = $query->fetch(PDO::FETCH_ASSOC);
        return (int) $result['count'];
    }

    public function getMostViewedArticles(int $limit = 5): array
    {


        $db = DBManager::getInstance()->getPDO();
        $query = $db->prepare("SELECT * FROM article ORDER BY views DESC LIMIT :limit");
        $query->bindValue(':limit', $limit, PDO::PARAM_INT);
        $query->execute();
        return $query->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Récupère les articles avec le nombre de commentaires associés.
     *
     * @param string $orderBy : Colonne pour trier les articles.
     * @param string $orderDir : Direction du tri ('asc' ou 'desc').
     * @return array : Tableau d'articles avec leur nombre de commentaires.
     */
    public function getArticlesWithCommentCount(string $orderBy = 'title', string $orderDir = 'asc'): array
    {
        // Sécurité : Liste des colonnes valides pour le tri
        $validColumns = ['title', 'views', 'comments_count', 'date_creation'];
        if (!in_array($orderBy, $validColumns)) {
            $orderBy = 'title';
        }

        $orderDir = ($orderDir === 'desc') ? 'DESC' : 'ASC';

        // Requête SQL avec jointure pour compter les commentaires
        $sql = "
        SELECT a.*, COUNT(c.id) AS comments_count
        FROM article a
        LEFT JOIN comment c ON a.id = c.id_article
        GROUP BY a.id
        ORDER BY $orderBy $orderDir
    ";


        $result = $this->db->query($sql);
        $articles = [];

        while ($article = $result->fetch()) {
            $articles[] = new Article($article);
        }
        return $articles;
    }

    public function getaffichagePage(string $orderBy = 'date_creation', string $orderDir = 'asc'): array
    {
        // Liste des colonnes valides pour éviter les injections SQL
        $validColumns = ['title', 'views', 'date_creation', 'date_update'];
        if (!in_array($orderBy, $validColumns)) {
            $orderBy = 'date_creation';
        }

        $orderDir = ($orderDir === 'desc') ? 'DESC' : 'ASC';

        $sql = "SELECT * FROM article ORDER BY $orderBy $orderDir";
        $result = $this->db->query($sql);

        $articles = [];
        while ($article = $result->fetch()) {
            $articles[] = new Article($article);
        }
        return $articles;
    }


    // Fin



    /**
     * Supprime un article.
     * @param int $id : l'id de l'article à supprimer.
     * @return void
     */
    public function deleteArticle(int $id): void
    {
        $sql = "DELETE FROM article WHERE id = :id";
        $this->db->query($sql, ['id' => $id]);
    }
}
