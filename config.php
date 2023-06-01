<?php
$regex = [
    'name' => '/^[A-Za-z\- áàâäãåçéèêëíìîïñóòôöõúùûüýÿæœÁÀÂÄÃÅÇÉÈÊËÍÌÎÏÑÓÒÔÖÕÚÙÛÜÝŸÆŒ]{1,20}$/',
    'username' => '/^[A-Za-z0-9\-_]{3,20}$/',
    'password' => '/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/',
    'birthdate' => '/^[0-9]{4}-[0-9]{2}-[0-9]{2}$/',
    'content' => '/(<script>)/',
    'phone' => '/^(0[1-79]){1}( [0-9]{2}){4}$/',
    'title' => '/^[$',
];

$formErrors = [];

define('GENERAL_ERROR', 'Une erreur est survenue, veuillez réessayer. Si le problème persiste, merci de <a href="mailto:boitemailbidon@mailbidon.fr">nous contacter</a>.');

define('USER_USERNAME_ERROR_EMPTY', 'Le nom d\'utilisateur est obligatoire.');
define('USER_USERNAME_ERROR_INVALID', 'Le nom d\'utilisateur ne peut comporter que des lettres en majuscule et minuscule, des chiffres, des tirets et des underscores.');
define('USER_USERNAME_ERROR_ALREADY_EXISTS', 'Ce nom d\'utilisateur existe déjà.');

define('USER_BIRTHDATE_ERROR_INVALID', 'La date de naissance doit être au format jj/mm/aaaa.');

define('USER_PHONE_ERROR_INVALID', 'Le numéro de téléphone doit contenir 10 chiffres séparés par un espace');

define('USER_EMAIL_ERROR_EMPTY', 'L\'adresse mail est obligatoire.');
define('USER_EMAIL_ERROR_INVALID', 'L\'adresse mail ne peut comporter que des lettres non accentués, des chiffres, des tirets et des underscores');
define('USER_EMAIL_ERROR_ALREADY_EXISTS', 'Cette adresse mail est déjà utilisée.');

define('USER_PASSWORD_ERROR_EMPTY', 'Le mot de passe est obligatoire.');
define('USER_PASSWORD_ERROR_INVALID', 'Le mot de passe doit comporter au moins lettre en minuscule, une lettre en majuscule, un chiffre, un caractère spécial et au moins 8 caractères.');
define('USER_PASSWORD_CONFIRM_ERROR_EMPTY', 'La confirmation du mot de passe est obligatoire.');
define('USER_PASSWORD_ERROR_DIFFERENT_PASSWORD', 'Les mots de passes sont différents.');

define('USER_REGISTER_SUCCESS', 'Votre compte a été créé. Vous pouvez dès maintenant <a href="/connexion">vous connecter</a>.');
define('USER_LOGIN_ERROR', 'Le nom d\'utilisateur ou le mot de passe est incorrect.');

define('POST_TITLE_ERROR_EMPTY', 'Le titre de l\'article est obligatoire.');
define('POST_TITLE_TOO_LONG', 'Le titre ne peut contenir que 100 caractères au maximin.');

define('POST_CONTENT_ERROR_EMPTY', 'Le contenu de l\'article est obligatoire.');
define('POST_CONTENT_TOO_LONG', 'Le contenue de l\'article ne peut contenir que 255 caractère.');
define('POST_CONTENT_ERROR_INVALID', 'L\'utilisateur de la balise de script est interdite.');

define('POST_CATEGORY_ERROR_INVALID', 'La catégorie est invalide.');
define('POST_CATEGORY_ERROR_EMPTY', 'La catégorie est obligatoire.');

define('POST_IMAGE_ERROR_EMPTY', 'L\'image est obligatoire.');
define('POST_IMAGE_ERROR_TOO_BIG', 'L\'image est trop lourde.');
define('POST_IMAGE_ERROR_GENERAL', 'Une erreur est survenue.');
define('POST_IMAGE_ERROR_EXTENSION', 'Le fichier doit être au format jpeg, jpg, png, gif ou webp.');
define('POST_IMAGE_ERROR_UPLOAD_FAIL', 'Le téléchargement de l\'image a échoué, veuillez réessayer.').

define('POST_ADD_SUCCES', 'L\'article a bien été créer.');
define('POST_UPDATE_SUCCESS', 'L\'article a bien été modifié.');
define('POST_ARTICLE_SUCCES', 'Votre article a été créer.');

define('USER_COMMENTS_ERROR_EMPTY', 'Le champ du commentaire est vide.');
define ('USER_COMMENTS_ERROR_INVALID', 'L\'utilisation de la balise script est interdite.');

define('USER_MODIFY_SUCCES', 'La modification a bien été prise en compte.');