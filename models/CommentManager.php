<?php

class CommentManager extends AbstractEntityManager
{
    /**
     * Récupère tous les commentaires d'un article.
     * @param int $idArticle : l'id de l'article.
     * @return array : un tableau d'objets Comment.
     */
    public function getAllCommentsByArticleId(int $idArticle): array
    {
        $sql = "SELECT * FROM comment WHERE id_article = :idArticle";
        $result = $this->db->query($sql, ['idArticle' => $idArticle]);
        $comments = [];

        while ($comment = $result->fetch()) {
            $comments[] = new Comment($comment);
        }
        return $comments;
    }

    /**
     * Récupère un commentaire par son id.
     * @param int $id : l'id du commentaire.
     * @return Comment|null : un objet Comment ou null si le commentaire n'existe pas.
     */
    public function getCommentById(int $id): ?Comment
    {
        $sql = "SELECT * FROM comment WHERE id = :id";
        $result = $this->db->query($sql, ['id' => $id]);
        $comment = $result->fetch();
        return $comment ? new Comment($comment) : null;
    }

    /**
     * Ajoute un commentaire.
     * @param Comment $comment : l'objet Comment à ajouter.
     * @return bool : true si l'ajout a réussi, false sinon.
     */
    public function addComment(Comment $comment): bool
    {
        $sql = "INSERT INTO comment (pseudo, content, id_article, date_creation) VALUES (:pseudo, :content, :idArticle, NOW())";
        $result = $this->db->query($sql, [
            'pseudo' => $comment->getPseudo(),
            'content' => $comment->getContent(),
            'idArticle' => $comment->getIdArticle()
        ]);
        return $result->rowCount() > 0;
    }

    /**
     * Récupère les commentaires paginés d'un article.
     */
    public function getCommentsPaginated(int $articleId, int $page, int $commentsPerPage): array
    {
        $offset = ($page - 1) * $commentsPerPage;
        $sql = "SELECT * FROM comment";
        $params = [];

        // Filtrage par articleId
        if ($articleId > 0) {
            $sql .= " WHERE id_article = :articleId";
            $params['articleId'] = $articleId;
        }

        // Pagination et tri
        $sql .= " ORDER BY date_creation DESC LIMIT $offset, $commentsPerPage";

        // Préparation de la requête
        $query = $this->db->query($sql);

        // Liaison des paramètres
        if ($articleId > 0) {
            $query->bindValue(':articleId', $articleId, PDO::PARAM_INT);
        }

        // Exécution de la requête
        $query->execute();

        // Récupération des résultats sous forme d'objets Comment
        $comments = [];
        while ($row = $query->fetch()) {
            $comments[] = new Comment($row);
        }

        return $comments;
    }

    /**
     * Compte le nombre de commentaires.
     */
    public function countComments(int $articleId): int
    {
        $sql = "SELECT COUNT(*) as total FROM comment";
        $params = [];

        if ($articleId > 0) {
            $sql .= " WHERE id_article = :articleId";
            $params['articleId'] = $articleId;
        }

        $query = $this->db->query($sql);
        $query->execute($params);
        return (int) $query->fetchColumn();
    }

    /**
     * Supprime un commentaire par ID.
     */
    public function deleteCommentById(int $commentId): void
    {
        $sql = "DELETE FROM comment WHERE id = :id";
        $this->db->query($sql, ['id' => $commentId]);
    }
}
