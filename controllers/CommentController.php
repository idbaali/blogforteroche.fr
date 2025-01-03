<?php

class CommentController
{
    /**
     * Ajoute un commentaire.
     * @return void
     */
    public function addComment(): void
    {
        // Vérifier si l'utilisateur est connecté
        // $this->checkIfUserIsConnected();

        if (!isset($_SESSION['user'])) {
            // Si l'utilisateur n'est pas connecté, on le redirige vers la page de connexion
            header('Location: index.php?action=login');
            exit;
        }
        // Récupération des données du formulaire.
        $pseudo = Utils::request("pseudo");
        $content = Utils::request("content");
        $idArticle = Utils::request("idArticle");

        // On vérifie que les données sont valides.
        if (empty($pseudo) || empty($content) || empty($idArticle)) {
            throw new Exception("Tous les champs sont obligatoires. 3");
        }

        // On vérifie que l'article existe.
        $articleManager = new ArticleManager();
        $article = $articleManager->getArticleById($idArticle);
        if (!$article) {
            throw new Exception("L'article demandé n'existe pas.");
        }

        // On crée l'objet Comment.
        $comment = new Comment([
            'pseudo' => $pseudo,
            'content' => $content,
            'idArticle' => $idArticle
        ]);

        // On ajoute le commentaire.
        $commentManager = new CommentManager();
        $result = $commentManager->addComment($comment);

        // On vérifie que l'ajout a bien fonctionné.
        if (!$result) {
            throw new Exception("Une erreur est survenue lors de l'ajout du commentaire.");
        }

        // On redirige vers la page de l'article.
        Utils::redirect("showArticle", ['id' => $idArticle]);
    }



    public function showComment(): void
    {
        $articleId = Utils::request("articleId", 0);
        $currentPage = Utils::request("page", 1);



        $commentManager = new CommentManager();
        $comments = $commentManager->getCommentsPaginated($articleId, $currentPage, 10);
        $totalComments = $commentManager->countComments($articleId);

        $view = new View('Gestion des commentaires');
        $view->render('showComment', [
            'comments' => $comments,
            'totalPages' => ceil($totalComments / 10),
            'currentPage' => $currentPage,
            'articleId' => $articleId
        ]);
    }

    /**
     * Supprime un commentaire.
     */
    public function deleteComment(): void
    {
        $commentId = Utils::request("commentId", -1);
        if ($commentId > 0) {
            $commentManager = new CommentManager();


            $commentManager->deleteCommentById($commentId);
        }
        header("Location: index.php?action=showComment");
        exit;
    }
}
