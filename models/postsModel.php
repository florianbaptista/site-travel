<?php
// ma classe se nomme "post"
// je l'appelle pour instensier un objet
// ex : $monObjet = new post
class post extends database
{
    // visibilité, type, attribut, valeur
    public int $id = 0;
    public string $title = '';
    public string $content = '';
    public string $picture = '';
    public string $publicationDate = '1970-01-01';
    public int $id_users = 0;
    public int $id_categories = 0;
    public int $id_countries = 0;

    // methode "__construct()" = instancie l'objet, connecte a la bdd
    public function __construct()
    {
        parent::__construct();
    }

    // formulaire d'ajout d'article :
    public function insert()
    {
        $query = 'INSERT INTO `' . $this->prefix . 'articles` (`title`,`content`,`picture`,`publicationDate`,`id_users`,`id_categories`,`id_countries`)
        VALUES (:title, :content,:picture , NOW(), :id_users, :id_categories, :id_countries)';
        $request = $this->db->prepare($query);
        $request->bindValue(':title', $this->title, PDO::PARAM_STR);
        $request->bindValue(':content', $this->content, PDO::PARAM_STR);
        $request->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $request->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $request->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        $request->bindValue(':id_countries', $this->id_countries, PDO::PARAM_INT);
        return $request->execute();
    }

    // formulaire afficher ajout d'article :
    public function getAll()
    {
        $query = 'SELECT p7urg_articles.id, title, CONCAT(SUBSTRING(content, 1,30) , "...") AS content, DATE_FORMAT(publicationDate, "Le %d/%m/%Y à %Hh%i") AS publicationDate,
        picture, p7urg_categories.name AS category, username, p7urg_countries.name AS country
        FROM `p7urg_articles`
        INNER JOIN p7urg_users ON p7urg_users.id = p7urg_articles.id_users
        INNER JOIN p7urg_categories ON p7urg_categories.id = p7urg_articles.id_categories
        INNER JOIN p7urg_countries ON p7urg_countries.id = p7urg_articles.id_countries';
        $request = $this->db->query($query);
        // recupérer les résultats de la requête (avec un SELECT uniquement)
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    // afficher les 4 derniers articles seulement :
    public function getLastArticle()
    {
        $query = 'SELECT p7urg_articles.id, title, CONCAT(SUBSTRING(content, 1,30) , "...") AS content, DATE_FORMAT(publicationDate, "Le %d/%m/%Y à %Hh%i") AS publicationDateFr, publicationDate,
        picture, p7urg_categories.name AS category, username, p7urg_countries.name AS country
        FROM `p7urg_articles`
        INNER JOIN p7urg_users ON p7urg_users.id = p7urg_articles.id_users
        INNER JOIN p7urg_categories ON p7urg_categories.id = p7urg_articles.id_categories
        INNER JOIN p7urg_countries ON p7urg_countries.id = p7urg_articles.id_countries
        ORDER BY publicationDate DESC
        LIMIT 4;';
        $request = $this->db->query($query);
        // recupérer les résultats de la requête (avec un SELECT uniquement)
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    // afficher les 4 derniers articles qui on la category activité seulement :
    public function getActivityArticle()
    {
        $query = 'SELECT p7urg_articles.id, title, CONCAT(SUBSTRING(content, 1,30) , "...") AS content, DATE_FORMAT(publicationDate, "Le %d/%m/%Y à %Hh%i") AS publicationDateFr, publicationDate,
        picture, p7urg_categories.name AS category, username, p7urg_countries.name AS country
        FROM `p7urg_articles`
        INNER JOIN p7urg_users ON p7urg_users.id = p7urg_articles.id_users
        INNER JOIN p7urg_categories ON p7urg_categories.id = p7urg_articles.id_categories
        INNER JOIN p7urg_countries ON p7urg_countries.id = p7urg_articles.id_countries
        WHERE id_categories = 1
        ORDER BY p7urg_articles.id_categories DESC
        LIMIT 4;';
        $request = $this->db->query($query);
        // recupérer les résultats de la requête (avec un SELECT uniquement)
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    // afficher les 4 derniers articles qui on la category transport seulement :
    public function getTransportArticle()
    {
        $query = 'SELECT p7urg_articles.id, title, CONCAT(SUBSTRING(content, 1,30) , "...") AS content, DATE_FORMAT(publicationDate, "Le %d/%m/%Y à %Hh%i") AS publicationDateFr, publicationDate,
        picture, p7urg_categories.name AS category, username, p7urg_countries.name AS country
        FROM `p7urg_articles`
        INNER JOIN p7urg_users ON p7urg_users.id = p7urg_articles.id_users
        INNER JOIN p7urg_categories ON p7urg_categories.id = p7urg_articles.id_categories
        INNER JOIN p7urg_countries ON p7urg_countries.id = p7urg_articles.id_countries
        WHERE id_categories = 2
        ORDER BY p7urg_articles.id_categories DESC
        LIMIT 4;';
        $request = $this->db->query($query);
        // recupérer les résultats de la requête (avec un SELECT uniquement)
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    // afficher les 4 derniers articles qui on la category sécurité seulement :
    public function getSecurityArticle()
    {
        $query = 'SELECT p7urg_articles.id, title, CONCAT(SUBSTRING(content, 1,30) , "...") AS content, DATE_FORMAT(publicationDate, "Le %d/%m/%Y à %Hh%i") AS publicationDateFr, publicationDate,
        picture, p7urg_categories.name AS category, username, p7urg_countries.name AS country
        FROM `p7urg_articles`
        INNER JOIN p7urg_users ON p7urg_users.id = p7urg_articles.id_users
        INNER JOIN p7urg_categories ON p7urg_categories.id = p7urg_articles.id_categories
        INNER JOIN p7urg_countries ON p7urg_countries.id = p7urg_articles.id_countries
        WHERE id_categories = 3
        ORDER BY p7urg_articles.id_categories DESC
        LIMIT 4;';
        $request = $this->db->query($query);
        // recupérer les résultats de la requête (avec un SELECT uniquement)
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    // afficher les 4 derniers articles qui on la category bonnes pratiques seulement :
    public function getPracticesArticle()
    {
        $query = 'SELECT p7urg_articles.id, title, CONCAT(SUBSTRING(content, 1,30) , "...") AS content, DATE_FORMAT(publicationDate, "Le %d/%m/%Y à %Hh%i") AS publicationDateFr, publicationDate,
        picture, p7urg_categories.name AS category, username, p7urg_countries.name AS country
        FROM `p7urg_articles`
        INNER JOIN p7urg_users ON p7urg_users.id = p7urg_articles.id_users
        INNER JOIN p7urg_categories ON p7urg_categories.id = p7urg_articles.id_categories
        INNER JOIN p7urg_countries ON p7urg_countries.id = p7urg_articles.id_countries
        WHERE id_categories = 4
        ORDER BY p7urg_articles.id_categories DESC
        LIMIT 4;';
        $request = $this->db->query($query);
        // recupérer les résultats de la requête (avec un SELECT uniquement)
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    // afficher les 4 derniers articles qui on la category gastronomie seulement :
    public function getGastronomyArticle()
    {
        $query = 'SELECT p7urg_articles.id, title, CONCAT(SUBSTRING(content, 1,30) , "...") AS content, DATE_FORMAT(publicationDate, "Le %d/%m/%Y à %Hh%i") AS publicationDateFr, publicationDate,
            picture, p7urg_categories.name AS category, username, p7urg_countries.name AS country
            FROM `p7urg_articles`
            INNER JOIN p7urg_users ON p7urg_users.id = p7urg_articles.id_users
            INNER JOIN p7urg_categories ON p7urg_categories.id = p7urg_articles.id_categories
            INNER JOIN p7urg_countries ON p7urg_countries.id = p7urg_articles.id_countries
            WHERE id_categories = 5
            ORDER BY p7urg_articles.id_categories DESC
            LIMIT 4;';
        $request = $this->db->query($query);
        // recupérer les résultats de la requête (avec un SELECT uniquement)
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    // afficher les 4 derniers articles qui on la category Démarches seulement :
    public function getProceduresArticle()
    {
        $query = 'SELECT p7urg_articles.id, title, CONCAT(SUBSTRING(content, 1,30) , "...") AS content, DATE_FORMAT(publicationDate, "Le %d/%m/%Y à %Hh%i") AS publicationDateFr, publicationDate,
                picture, p7urg_categories.name AS category, username, p7urg_countries.name AS country
                FROM `p7urg_articles`
                INNER JOIN p7urg_users ON p7urg_users.id = p7urg_articles.id_users
                INNER JOIN p7urg_categories ON p7urg_categories.id = p7urg_articles.id_categories
                INNER JOIN p7urg_countries ON p7urg_countries.id = p7urg_articles.id_countries
                WHERE id_categories = 6
                ORDER BY p7urg_articles.id_categories DESC
                LIMIT 4;';
        $request = $this->db->query($query);
        // recupérer les résultats de la requête (avec un SELECT uniquement)
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Methode permettant de selectionner des informations d'un article
     * @param int $id id de l'article voulu
     * @return object
     */
    // page d'article url :
    public function getOneArticle()
    {
        $query = 'SELECT p7urg_articles.title, content, DATE_FORMAT(publicationDate, "Le %d/%m/%Y à %Hh%i") AS publicationDateFr, publicationDate,
        picture, p7urg_categories.name AS category, username, p7urg_countries.name AS country
        FROM `p7urg_articles`
        INNER JOIN p7urg_users ON p7urg_users.id = p7urg_articles.id_users
        INNER JOIN p7urg_categories ON p7urg_categories.id = p7urg_articles.id_categories
        INNER JOIN p7urg_countries ON p7urg_countries.id = p7urg_articles.id_countries
        WHERE p7urg_articles.id = :id;';
        $request = $this->db->prepare($query);
        // recupérer l'id du post :
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        // envoie l'id a la bdd
        $request->execute();
        // execute ce que je lui demande. ex : "l'id"
        return $request->fetch(PDO::FETCH_OBJ);
        // il m'envoie la reponse de l'id
    }

    /**
     * Methode permettant de verifier l'existance d'un article
     * @param int $id id de l'article voulu
     * @return object
     */
    public function checkIfPostExist()
    {
        $query = 'SELECT COUNT(id)
        FROM p7urg_articles
        WHERE id = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }

    /* methode pour afficher les articles créer par l'utilisateur dans la page de profil de l'utilisateur : */
    public function getPostsByIdUsers()
    {
        $query = 'SELECT a.id, title, CONCAT(SUBSTRING(content, 1,20) , "...") AS content, DATE_FORMAT(publicationDate, "Le %d/%m/%Y à %Hh%i") AS publicationDateFR, publicationDate,
        picture, c.name, p.name AS country
        FROM `p7urg_articles` AS a
        INNER JOIN p7urg_categories AS c ON c.id = a.id_categories
        INNER JOIN p7urg_countries AS p ON p.id = a.id_countries
        WHERE a.id_users = :id_users
        ORDER BY publicationDate DESC
        LIMIT 5;';
        $request = $this->db->prepare($query);
        $request->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    /**
     * Méthode permettant de récupérer tous les articles écrit par une personne
     * @param int id_users ID de l'auteur des articles
     * @return array tableau associatif contenant les articles de cet auteur
     */
    public function getPostsOfAuthor()
    {
        $query = 'SELECT `title`, DATE_FORMAT(`publicationDate`, "%e %M %Y à %H:%i") as pDate, `name` as category, `' . $this->prefix . 'articles`.`id`
    FROM `' . $this->prefix . 'articles`
    INNER JOIN `' . $this->prefix . 'categories`
    ON `' . $this->prefix . 'articles`.`id_categories` = `' . $this->prefix . 'categories`.`id`
    INNER JOIN `' . $this->prefix . 'users`
    ON `' . $this->prefix . 'articles`.`id_users` = `' . $this->prefix . 'users`.`id`
    WHERE id_users = :id_users
    ORDER BY publicationDate DESC';
        $request = $this->db->prepare($query);
        $request->bindValue(':id_users', $this->id_users, PDO::PARAM_INT);
        $request->execute();
        return $request->fetchAll(PDO::FETCH_OBJ);
    }

    /* methode pour supprimer un article d'un utilisateur : */
    public function deleteArticle()
    {
        $query = 'DELETE FROM `' . $this->prefix . 'articles`
            WHERE id = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $request->execute();
    }

    /* formulaire dans modifier article : */
    public function updatePosts()
    {
        $query = 'UPDATE `' . $this->prefix . 'articles` 
            SET `title`= :title, `content`= :content, `picture`= :picture, `id_categories`= :id_categories, `id_countries`= :id_countries
            WHERE id = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':title', $this->title, PDO::PARAM_STR);
        $request->bindValue(':content', $this->content, PDO::PARAM_STR);
        $request->bindValue(':picture', $this->picture, PDO::PARAM_STR);
        $request->bindValue(':id_categories', $this->id_categories, PDO::PARAM_INT);
        $request->bindValue(':id_countries', $this->id_countries, PDO::PARAM_INT);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        return $request->execute();
    }

    public function checkIfPostsExists($column)
    {
        $query = 'SELECT count(' . $column . ') 
        FROM `' . $this->prefix . 'articles` 
        WHERE ' . $column . ' = :' . $column;
        $request = $this->db->prepare($query);
        $request->bindValue(':' . $column, $this->$column, PDO::PARAM_STR);
        $request->execute();
        return $request->fetch(PDO::FETCH_COLUMN);
    }
    /**
     * @param int l'id de l'article que l'on veut récupérer
     * @return object les informations de l'article sous forme d'objet
     */
    public function getInfos()
    {
        $query = 'SELECT `title`,`content`,`picture`,`id_categories`,`id_countries`
            FROM `' . $this->prefix . 'articles`
            WHERE id = :id';
        $request = $this->db->prepare($query);
        $request->bindValue(':id', $this->id, PDO::PARAM_INT);
        $request->execute();
        return $request->fetch(PDO::FETCH_OBJ);
    }

    // /* requete pour mettre en favoris les articles */
    // public function getLike()
    // {
    //     $query = 'SELECT id_articles, id_users
    //     FROM `p7urg_favoritesarticles`';
    //     $request = $this->db->query($query);
    //     // recupérer les résultats de la requête (avec un SELECT uniquement)
    //     return $request->fetchAll(PDO::FETCH_OBJ);
    // }

    // public function addLike($idUser, $idArticle)
    // {
    //     $query = 'INSERT INTO p7urg_favoritesArticles (`id_articles`,`id_users`)
    //     VALUE (:id_articles, :id_users)';
    //     $request = $this->db->prepare($query);
    //     $request->bindValue(':id_articles', $idArticle, PDO::PARAM_INT);
    //     $request->bindValue(':id_users', $idUser, PDO::PARAM_INT);
    //     return $request->execute();
    // }
}
