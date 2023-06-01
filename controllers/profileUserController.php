<?php
session_start();
require_once '../models/database.php';
require_once '../models/usersModel.php';
require_once '../models/commentsModel.php';
require_once '../models/postsModel.php';
require_once '../config.php';

// informations utilisateur :
$profile = new users;
$profile->id = $_SESSION['user']['id'];
$profileInfos = $profile->getInfos();
// articles créer par l'utilisateur :
$posts = new post;
$posts->id_users = $_SESSION['user']['id'];
$postsList = $posts->getPostsByIdUsers();
// commentaires créer par l'utilisateur :
$comments = new comments;
$comments->id_users = $_SESSION['user']['id'];
$commentsList = $comments->getCommentsByIdUsers();

// les articles liker :
// $like = new post;
// $like->id = $_SESSION['user']['id'];
// $likesAdd = $like->getLike();
// // ajouter article liker :
// $addFavorite = new post;
// $addFavorite->id = $_SESSION['user']['id'];
// $articleId = $_GET['like'];
// $addFavorites = $addFavorite->addLike($_SESSION['user']['id'], $articleId);

$title = 'Mon Profil';
// je require les views à la fin pour afficher le contenu
require_once '../views/parts/header.php';
require_once '../views/profileUser.php';
require_once '../views/parts/footer.php';