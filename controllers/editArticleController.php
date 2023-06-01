<?php
session_start();

require_once '../models/database.php';
require_once '../models/postsModel.php';
require_once '../config.php';
require_once '../models/postsCategoriesModel.php';
require_once '../models/postsCountriesModel.php';

$postCategories = new postCategories;
$list = $postCategories->getAll();

$postCountries = new postCountries;
$listCountrie = $postCountries->getCountries();

$postForm = new post;
/* je stock dans l'atribut l'id de l'utilisateur qui est connecter */
// condition pour vérifier que le formulaire a été envoyé
var_dump($_POST);
$postForm->id = $_GET['id'];
// var_dump($postForm);
// var_dump($_FILES);
var_dump($_GET['id']);
if (isset($_POST['editPost'])) {
    if (!empty($_POST['title'])) {
        // strlen = calcule le nombre de caractère, donc si mon titre a + de 100 caractères je formerrors :
        if (strlen($_POST['title']) <= 100) {
            $postForm->title = strip_tags(trim($_POST['title'])); //trim = enlève les expaces de devant et derière, strip_tags = empeche les injections sql
        } else {
            $formErrors['title'] = POST_TITLE_TOO_LONG;
        }
    } else {
        $formErrors['title'] = POST_TITLE_ERROR_EMPTY;
    }
    if (!empty($_POST['content'])) {
        if (!preg_match($regex['content'], $_POST['content'])) {
            $postForm->content = htmlspecialchars($_POST['content']); //htmlspecialchars = pour encoder les balises html
        } else {
            $formErrors['content'] = POST_CONTENT_ERROR_INVALID;
        }
    } else {
        $formErrors['content'] = POST_CONTENT_ERROR_EMPTY;
    }
    if (!empty($_POST['categories'])) {
        $postCategories->id = $_POST['categories'];
        if ($postCategories->checkIfCategoriesExist() == 1) {
            $postForm->id_categories = $_POST['categories'];
        } else {
            $formErrors['categories'] = POST_CATEGORY_ERROR_INVALID;
        }
    } else {
        $formErrors['categories'] = POST_CATEGORY_ERROR_EMPTY;
    }

    if (!empty($_POST['countries'])) {
        $postCountries->id = $_POST['countries'];
        if ($postCountries->checkIfCountriesExist() == 1) {
            $postForm->id_countries = $_POST['countries'];
        } else {
            $formErrors['countries'] = POST_CATEGORY_ERROR_INVALID;
        }
    } else {
        $formErrors['countries'] = POST_CATEGORY_ERROR_EMPTY;
    }
 
    if (count($formErrors) == 0) {
            $postForm->updatePosts();
        
        // Définir une variable "$form" comme un tableau associatif avec deux clés: "status" et "message" :
        $form = [
            'status' => 'succes',
            'message' => POST_UPDATE_SUCCESS
        ];
    }
}
/* j'appelle ma méthode pour recuperer mes infos */
$postForms = $postForm->getInfos();

require_once '../views/parts/header.php';
require_once '../views/editArticle.php';
require_once '../views/parts/footer.php';
