<h1>Information personnel :</h1>
<div class="infPers">
    <p>pseudo : <?= $profileInfos->username ?></p>
    <p>email : <?= $profileInfos->email ?></p>
    <p>Téléphone : <?= $profileInfos->phone ?></p>
    <p>birthdate : <?= $profileInfos->birthdateFr ?></p>
    <button class="modifButton">
        <li><a href="/modifier-profil" title="Modifier-Profil">Modifier Profil</a></li>
    </button>
</div>

<h2 id="titleMyArticle">Mes articles</h2>
<div class="myTables">
    <table id="myArticlesTable">
        <thead>
            <tr>
                <th>Titre</th>
                <th>Résumé</th>
                <th>Date de publication</th>
                <th>Image</th>
                <th>Catégorie</th>
                <th>Pays</th>
                <th >Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($postsList as $pl) { ?>
                <tr>
                    <td><?= $pl->title ?></td>
                    <td><?= $pl->content ?></td>
                    <td><?= $pl->publicationDateFR ?></td>
                    <td><?= $pl->picture ?></td>
                    <td><?= $pl->name ?></td>
                    <td><?= $pl->country ?></td>
                    <td class="actionButton"><a href="/article-<?= $pl->id ?>">Voir</a></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <button class="modifButton">
        <li><a href="/mes-articles" title="Modifier-Articles">Voir tout</a></li>
    </button>
</div>

<h2>Vos commentaires créer :</h2>
<div class="myTables">
<table>
    <thead>
        <tr>
            <th>Contenu</th>
            <th>Date de publication</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($commentsList as $cl) { ?>
            <tr>
                <td><?= $cl->content ?></td>
                <td><?= $cl->publicationDateFR ?></td>
                <td><a href="/article-<?= $cl->id_articles ?>">Voir</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>
</div>