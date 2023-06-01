<?php

class comments extends database
{
    public int $id = 0;
    public string $content = '';
    public string $publicationDate = '';
    public int $id_articles = 0;
    public int $id_users = 0;

    public function __construct()
    {
        parent::__construct();
    }

    public function insert()
    {
        $query = 'INSERT INTO `p7urg_comments`(`content`,`publicationDate`,`id_articles`,`id_users`)
        VALUES (:content,NOW(),:id_articles,:id_users)';
        $request = $this->db->prepare($query);
        $request->bindValue(':content', $this->content, PDO::PARAM_STR);
        $request->bindValue(':id_articles', $this->id_articles, PDO::PARAM_INT);
        $request->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        return $request->execute();
    }

    public function getAllComments()
    {
        $query = 'SELECT p7urg_comments.content,id_articles,DATE_FORMAT(publicationDate, "Le %d/%m/%Y à %Hh%i") AS publicationDate, 
        p7urg_users.username
        FROM `p7urg_comments`
        INNER JOIN p7urg_users ON p7urg_users.id = p7urg_comments.id_users
        WHERE id_articles = :id_articles;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id_articles', $this->id_articles, PDO::PARAM_INT);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
        // recupérer les résultats de la requête (avec un SELECT uniquement)
    }

    public function getCommentsByIdUsers()
    {
        $query = 'SELECT `content`,`publicationDate`,DATE_FORMAT(publicationDate, "%d/%m/%Y %Hh%i") AS publicationDateFR,`id_articles`
        FROM `p7urg_comments`
        WHERE id_users = :id_users
        ORDER BY publicationDate DESC 
        LIMIT 5;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }
}

