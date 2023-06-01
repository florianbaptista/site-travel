<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /connexion');
    exit;
}
/**
 * Les require ci-dessous permette de charger les fichiers obsolument necessaire
 * comme la database et le postModel
 * La database est avant le model car mon postmodel extend ma class database
 */
require_once '../models/database.php';
require_once '../models/postsModel.php';
require_once '../models/commentsModel.php';
require_once '../config.php';
/**
 * j'instancie la classe post qui est stockée dans la variable post
 * c'est la premiere etape avant d'utiliser mes attribut et mes methodes
 */
// créer une variable, instensie avec une classe existante
$post1 = new post;
/**
 * je récupere l'id depuis l'url et je le stock dans l'attribut id de l'objet post
 * je recupere l'id pour l'utiliser dans mes methodes checkIfPostExists()
 * et select()
 */
$post1->id = $_GET['id'];
/**
 * La condition permet de verifier si l'article existe selon son id
 */
$article = $post1->getOneArticle();
if ($post1->checkIfPostExist() == 0) {
    /**
     * le header permet de rediriger les utilisateurs vers la liste des articles et le exit permet
     * d'arreter l'execution du php qui n'est plus necessaire apres la redirection
     */
    header('location: /liste-article');
    exit;
}
/**
 * 
 */

 $comment = new comments;
if (count($_POST) > 0) {
    $comment->id_articles = $post1->id;
    $comment->id_users = $_SESSION['user']['id'];

    if (!empty($_POST['comments'])) {
        // var_dump($_POST);
        if (!preg_match($regex['content'], $_POST['comments'])) {
            $comment->content = htmlspecialchars($_POST['comments']);
            $comment->insert();
        } else {
            $formErrors['comments'] = USER_COMMENTS_ERROR_INVALID;
        }
    } else {
        $formErrors['comments'] = USER_COMMENTS_ERROR_EMPTY;
    }
}

$postComment = new comments;
$postComment->id_articles = $_GET['id'];
$postCommentLire = $postComment->getAllComments();
// var_dump($comment);
$title = $article->title;
// je require les views à la fin pour afficher le contenu
require_once '../views/parts/header.php';
require_once '../views/oneArticle.php';
require_once '../views/parts/footer.php';
