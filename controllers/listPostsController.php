<?php
session_start();
if (!isset($_SESSION['user'])) {
    header('Location: /connexion');
    exit;
}
require_once '../models/database.php';
require_once '../models/postsModel.php';

// créer une variable, instensie avec une classe existante (créer au préalable dans le model)
$post1 = new post;
$article = $post1->getAll();

$title = 'Liste des articles';
// je require les views à la fin pour afficher le contenu
require_once '../views/parts/header.php';
require_once '../views/listPosts.php';
require_once '../views/parts/footer.php';