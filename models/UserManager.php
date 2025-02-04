<?php

/** 
 * Classe UserManager pour gérer les requêtes liées aux users et à l'authentification.
 */

class UserManager extends AbstractEntityManager
{
    /**
     * Récupère un user par son login.
     * @param string $login
     * @return ?User
     */
    public function getUserByLogin(string $login): ?User
    {
        $sql = "SELECT * FROM user WHERE login = :login";
        $result = $this->db->query($sql, ['login' => $login]);
        $user = $result->fetch();
        if ($user) {
            return new User($user);
        }
        return null;
    }
    public function getUserCount(): int
    {
        $db = DBManager::getInstance()->getPDO();
        $query = $db->query("SELECT COUNT(*) as count FROM user");
        $result = $query->fetch();
        return $result['count'];
    }
}
