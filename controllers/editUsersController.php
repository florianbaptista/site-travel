<?php
session_start();

require_once '../models/database.php';
require_once '../models/usersModel.php';
require_once '../config.php';
/* j'instancie l'objet a partir de la class */
$profile = new users;
/* je stock dans l'atribut l'id de l'utilisateur qui est connecter */
$profile->id = $_SESSION['user']['id'];

/* si j'appuis sur le bouton 'editUsers', la condition ce lance : */
if (isset($_POST['editUsers'])) {
    // si le $_post est remplie je lance la condition sinon si le $_post nez pas remplie je lance le formerrors :
    if (!empty($_POST['username'])) {
        // si 
        if (preg_match($regex['username'], $_POST['username'])) {
            $profile->username = $_POST['username'];
            // si le $_post username est différent de l'username de la session et que il y a déjà le même username dans la bdd alors une je lance le formerrors :
            if ($_POST['username'] != $_SESSION['user']['username'] && $profile->checkIfUserExists('username') > 0) {
                $formErrors['username'] = USER_USERNAME_ERROR_ALREADY_EXISTS;
            }
        } else {
            $formErrors['username'] = USER_USERNAME_ERROR_INVALID;
        }
    } else {
        $formErrors['username'] = USER_USERNAME_ERROR_EMPTY;
    }

    if (!empty($_POST['email'])) {
        if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
            $profile->email = $_POST['email'];
            if ($profile->checkIfUserExists('email') > 0 && $_POST['email'] != $profile->getEmail()) {
                $formErrors['email'] = USER_EMAIL_ERROR_ALREADY_EXISTS;
            }
        } else {
            $formErrors['email'] = USER_EMAIL_ERROR_INVALID;
        }
    } else {
        $formErrors['email'] = USER_EMAIL_ERROR_EMPTY;
    }

    if (!empty($_POST['phone'])) {
        if (preg_match($regex['phone'], $_POST['phone'])) {
            $profile->phone = $_POST['phone'];
        } else {
            $formErrors['phone'] = USER_PHONE_ERROR_INVALID;
        }
    }

    if (!empty($_POST['birthdate'])) {
        if (preg_match($regex['birthdate'], $_POST['birthdate'])) {
            $date = explode('-', $_POST['birthdate']);
            if (checkdate($date[1], $date[2], $date[0])) {
                $profile->birthdate = $_POST['birthdate'];
            } else {
                $formErrors['birthdate'] = USER_BIRTHDATE_ERROR_INVALID;
            }
        } else {
            $formErrors['birthdate'] = USER_BIRTHDATE_ERROR_INVALID;
        }
    }

    $profile->username = $_POST['username'];
    $profile->email = $_POST['email'];
    $profile->birthdate = $_POST['birthdate'];
    $profile->phone = $_POST['phone'];

    if (count($formErrors) == 0) {
        if ($profile->updateUsers()) {
            $_SESSION['user']['username'] = $_POST['username'];
        }
        $form = [
            'status' => 'success',
            'message' => USER_MODIFY_SUCCES
        ];
    }
}
/* j'appelle ma méthode pour recuperer mes infos */
$profileInfos = $profile->getInfos();

/* suppression de compte utilisateur : */
if (isset($_POST['deleteUsers'])) {
    $profile->deleteUsers();
    unset($_SESSION);
    session_destroy();
    header('Location: /accueil');
    exit;
} 

// var_dump($formErrors);
// var_dump($_SESSION);
// var_dump($_POST);
$title = 'Modifier mon Profil';
require_once '../views/parts/header.php';
require_once '../views/editUsers.php';
require_once '../views/parts/footer.php';
