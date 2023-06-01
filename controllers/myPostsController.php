<?php
require_once '../models/database.php';
require_once '../models/postsModel.php';

session_start();
/* suppression d'un article créer par l'utilisateur : */
// Vérifier si la demande de suppression d'article a été soumise
if (isset($_POST['deleteArticle'])) {
    // Vérifier si l'utilisateur est connecté
    if (isset($_SESSION['user'])) {
        // Créer un objet de la classe de profil utilisateur
        $post = new post();
        $post->id = $_POST['deleteArticle'];
        // Appeler la fonction deleteArticle()
        $post->deleteArticle();
    }
}

if (isset($_SESSION['user'])) {
    $post = new post;
    $post->id_users = $_SESSION['user']['id'];
    $results = $post->getPostsOfAuthor();
} else {
    $error = 'Vous devez être connecté pour accéder à cette page';
}

$title = 'Mes Articles Créer';
require_once '../views/parts/header.php';
require_once '../views/myPosts.php';
require_once '../views/parts/footer.php';