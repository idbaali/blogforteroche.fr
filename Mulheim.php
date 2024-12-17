<?php


// public function getArticlesWithCommentCount(string $orderBy, string $orderDir): array
// {
//     $validColumns = ['title', 'views', 'comments_count', 'date_creation'];
//     $orderBy = in_array($orderBy, $validColumns) ? $orderBy : 'title';
//     $orderDir = ($orderDir === 'desc') ? 'DESC' : 'ASC';

//     $sql = "
//         SELECT 
//             a.id, 
//             a.title, 
//             a.views, 
//             a.date_creation, 
//             COUNT(c.id) AS comments_count 
//         FROM 
//             article a 
//         LEFT JOIN 
//             comments c ON c.article_id = a.id 
//         GROUP BY 
//             a.id 
//         ORDER BY 
//             $orderBy $orderDir
//     ";

//     $stmt = $this->db->query($sql);
//     $articles = [];
//     while ($data = $stmt->fetch()) {
//         $articles[] = new Article($data);
//     }
//     return $articles;
// }







?>