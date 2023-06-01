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

// condition pour vérifier que le formulaire a été envoyé
// var_dump($_POST);
// var_dump($post);
// var_dump($_FILES);
if (count($_POST) > 0) {
    try {
        $post = new post;
        if (!empty($_POST['title'])) {
            // strlen = calcule le nombre de caractère, donc si mon titre a + de 100 caractères je formerrors :
            if (strlen($_POST['title']) <= 100) {
                $post->title = strip_tags(trim($_POST['title'])); //trim = enlève les expaces de devant et derière, strip_tags = empeche les injections sql
            } else {
                $formErrors['title'] = POST_TITLE_TOO_LONG;
            }
        } else {
            $formErrors['title'] = POST_TITLE_ERROR_EMPTY;
        }
        if (!empty($_POST['content'])) {
            if (!preg_match($regex['content'], $_POST['content'])) {
                $post->content = htmlspecialchars($_POST['content']); //htmlspecialchars = pour encoder les balises html
            } else {
                $formErrors['content'] = POST_CONTENT_ERROR_INVALID;
            }
        } else {
            $formErrors['content'] = POST_CONTENT_ERROR_EMPTY;
        }
        if (!empty($_POST['categories'])) {
            $postCategories->id = $_POST['categories'];
            if ($postCategories->checkIfCategoriesExist() == 1) {
                $post->id_categories = $_POST['categories'];
            } else {
                $formErrors['categories'] = POST_CATEGORY_ERROR_INVALID;
            }
        } else {
            $formErrors['categories'] = POST_CATEGORY_ERROR_EMPTY;
        }

        if (!empty($_POST['countries'])) {
            $postCountries->id = $_POST['countries'];
            if ($postCountries->checkIfCountriesExist() == 1) {
                $post->id_countries = $_POST['countries'];
            } else {
                $formErrors['countries'] = POST_CATEGORY_ERROR_INVALID;
            }
        } else {
            $formErrors['countries'] = POST_CATEGORY_ERROR_EMPTY;
        }

        if ($_FILES['image']['error'] != 4) {
            if ($_FILES['image']['error'] != 2 && $_FILES['image']['error'] != 1) {
                if ($_FILES['image']['error'] == 0) {
                    $auhorizedExtensions = [
                        'jpeg' => 'image/jpeg',
                        'jpg' => 'image/jpeg',
                        'png' => 'image/png',
                        'gif' => 'image/gif',
                        'webp' => 'image/webp',
                    ];
                    $fileInfo = pathinfo($_FILES['image']['name']);

                    if (!array_key_exists($fileInfo['extension'], $auhorizedExtensions) || mime_content_type($_FILES['image']['tmp_name']) != $auhorizedExtensions[$fileInfo['extension']]) {
                        //                                                                                                                                                        
                        $formErrors['image'] = POST_IMAGE_ERROR_EXTENSION;
                    }
                } else {
                    $formErrors['image'] = POST_IMAGE_ERROR_GENERAL;
                }
            } else {
                $formErrors['image'] = POST_IMAGE_ERROR_TOO_BIG;
            }
        } else {
            $formErrors['image'] = POST_IMAGE_ERROR_EMPTY;
        }

        $post->id_users = $_SESSION['user']['id'];
        if (count($formErrors) == 0) {
            $path = 'uploads/' . uniqid() . '.' . $fileInfo['extension'];
            var_dump($path);
            if (move_uploaded_file($_FILES['image']['tmp_name'], '../' . $path)) {
                chmod('../' . $path, '664');
                $post->picture = $path;
                if ($post->insert()) {
                    $form = [
                        'status' => 'succes',
                        'message' => POST_ADD_SUCCES
                    ];
                }
            } else {
                $formErrors['image'] = POST_IMAGE_ERROR_UPLOAD_FAIL;
            }
        }
    } catch (PDOException $e) {
        $form = [
            'status' => 'fail',
            'message' => GENERAL_ERROR
        ];
    }
}
$title = 'Créer un article';
require_once '../views/parts/header.php';
require_once '../views/addPost.php';
require_once '../views/parts/footer.php';
