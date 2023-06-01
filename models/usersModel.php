<?php
class users extends database
{
    public int $id = 0;
    public string $username = '';
    public string $email = '';
    public string $password = '';
    public string $phone = '';
    public string $birthdate = '1970-01-01';
    public int $id_roles = 0;

    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Méthode qui permet d'ajouter un utilisateur.
     * (la date d'inscription et le rôle de l'utilisateur son prédéfinis)
     * @param string username le nom d'utilisateur
     * @param string password le mot de passe hashé
     * @param string email l'adresse mail
     * @param date birthdate la date de naissance au format mySql (aaaa-mm-jj)
     * @return bool retourne true si la requête s'est correctement exécutée 
     */
    /* formulaire inscription : */
    public function addUser()
    {
        $query = 'INSERT INTO `' . $this->prefix . 'users` (`username`, `password`, `email`, `birthdate`, `phone`, `id_roles`) 
        VALUES (:username, :password, :email, :birthdate, :phone, 2)';
        $request = $this->db->prepare($query);
        $request->bindValue(':username', $this->username, PDO::PARAM_STR);
        $request->bindValue(':password', $this->password, PDO::PARAM_STR);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $request->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        return $request->execute();
    }

    /**
     * Méthode qui permet de vérifier qu'un utilisateur existe dans la base de données selon une colonne
     * @param string $column Le nom de la colonne (mail, username, lastname, etc..)
     * @param string ? attribut dynamique qui détermine quelle donnée est passée dans la méthode
     * @return int Le nombre de résultat trouvé
     */
    public function checkIfUserExists($column)
    {
        $query = 'SELECT count(' . $column . ') 
        FROM `' . $this->prefix . 'users` 
        WHERE ' . $column . ' = :' . $column;
        $request = $this->db->prepare($query);
        $request->bindValue(':' . $column, $this->$column, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }

    /**
     * Méthode permettant la récupération du mot de passe
     * @param string username le nom d'utilisateur
     * @return string le hash du mot de passe correspondant à l'username
     */
    public function getPassword()
    {
        $query = 'SELECT password 
        FROM `' . $this->prefix . 'users` 
        WHERE username = :username';
        $request = $this->db->prepare($query);
        $request->bindValue(':username', $this->username, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }

    /**
     * Méthode permettant de récupérer les informations utiles après la connexion
     * @param string username le nom d'utilisateur de la personne connectée
     * @return object objet comprenant les informations de l'utilisateur
     */
    public function getIds()
    {
        $query = 'SELECT `id`, `id_roles`
        FROM `' . $this->prefix . 'users`
        WHERE username = :username';
        $request = $this->db->prepare($query);
        $request->bindValue(':username', $this->username, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_ASSOC);
    }

    /* methode pour afficher les informations dans le profil de l'utilisateur */
    public function getInfos()
    {
        $query = 'SELECT `username`,`email`,`phone`, DATE_FORMAT(birthdate, "%d/%m/%Y") AS `birthdateFr`, birthdate
            FROM `' . $this->prefix . 'users`
            WHERE id = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetch(PDO::FETCH_OBJ);
    }

    /* formulaire dans modifier profil : */
    public function updateUsers()
    {
        $query = 'UPDATE `' . $this->prefix . 'users` 
        SET `username`= :username, `email`= :email, `phone`= :phone, `birthdate`= :birthdate
        WHERE id = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':username', $this->username, PDO::PARAM_STR);
        $request->bindValue(':email', $this->email, PDO::PARAM_STR);
        $request->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $request->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $request->execute();
    }

    /*  */
    public function getEmail()
    {
        $query = 'SELECT `email`
            FROM `' . $this->prefix . 'users`
            WHERE id = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }

    /* methode pour supprimer un compte utilisateur : */
    public function deleteUsers()
    {
        $query = 'DELETE FROM `' . $this->prefix . 'users`
        WHERE id = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $request->execute();
    }
}
