<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/assets/css/main.min.css">
    <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Titillium+Web:wght@200&display=swap" rel="stylesheet">
    <title><?= $title ?> - Travel Finder</title>
</head>

<body>
    <nav>
        <ul>
            <li><a href="/accueil"><img src="../../assets/img/399ca8c0b9db478d837f89f23261409e (1).png" alt="logo"></a></li>
            <li><a href="/accueil" title="Accueil"><i class="fa-solid fa-hotel"></i></a></li>
            <li><a href="/liste-article" title="Liste-Article"><i class="fa-solid fa-file"></i></a></li>
            <form action="verif-form.php" method="get" class="searchBar">
                <input type="search" name="terme" placeholder="Recherchez par pays">
                <button type="submit" ><i class="fa-solid fa-magnifying-glass"></i></button>
            </form>
        </ul>

        
        <ul>
            <?php if (isset($_SESSION['user'])) { ?>
                <li class="textLogin">Bonjour <?= $_SESSION['user']['username'] ?> !</li>
                <?php if (($_SESSION['user']['id_roles']) == 1) { ?>
                    <li><a href="/ajout-article" title="Ajouter-Article"><i class="fa-solid fa-file-circle-plus"></i></a></li>
                <?php } ?>
                <li><a href="/profil" title="Profil"><i class="fa-solid fa-person-hiking"></i></a></li>
                <li><a href="/deconnexion" title="Deconnexion"><i class="fa-solid fa-right-to-bracket"></i></a></li>
            <?php } else { ?>
                <li><a href="/connexion" title="Connexion">Connexion</a></li>
                <li><a href="/inscription" title="Inscription">Inscription</i></a></li>
            <?php } ?>

        </ul>
    </nav>
    <main>