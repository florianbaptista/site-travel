<?php
require_once '../models/database.php';
require_once '../models/usersModel.php';
require_once '../config.php';

session_start();
if (isset($_SESSION['user'])) {
    header('Location: /accueil');
    exit;
}

$formErrors = [];

if (count($_POST) > 0) {
    $user = new users;

    if (!empty($_POST['username'])) {
        $user->username = $_POST['username'];
        if ($user->checkIfUserExists('username') > 0) {
            $password = $user->getPassword();
        } else {
            $formErrors['username'] = $formErrors['password'] = USER_LOGIN_ERROR;
        }
    } else {
        $formErrors['username'] = USER_USERNAME_ERROR_EMPTY;
    }

    if (!empty($_POST['password'])) {
        if (isset($password)) {
            if (password_verify($_POST['password'], $password)) {
                $_SESSION['user'] = $user->getIds();
                $_SESSION['user']['username'] = $_POST['username'];
                header('Location: /accueil');
                exit;
            } else {
                $formErrors['password'] = $formErrors['username'] = USER_LOGIN_ERROR;
            }
        }
    } else {
        $formErrors['password'] = USER_PASSWORD_ERROR_EMPTY;
    }
}

$title = 'Connexion';

require_once '../views/parts/header.php';
require_once '../views/login.php';
require_once '../views/parts/footer.php';