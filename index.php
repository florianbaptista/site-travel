<?php
require_once 'models/database.php';
require_once 'models/postsModel.php';
require_once 'controllers/indexController.php';
$title = 'Accueil';

require_once 'views/parts/header.php';
?>
<!-- h1 sur l'image de couverture : -->
<div id="flou">
    <div id="heroPage">
        <h1>Bienvenue sur <span>T</span>ravel <span>F</span>inder !</h1>
    </div>
</div>
<!-- titre : -->
<!-- description du site : -->
<div id="text">
    <p>
        Apprenez en plus sur votre prochain voyage, en vous <b>préparant</b> et en vous <b>informant</b> sur votre destination ! <br>
        Un site qui regroupe des <b>bons plans</b> et <b>conseils</b> pour préparer votre prochain trip, que ce soit pour un weekend ou un tour du monde.
    </p>
</div>

<!-- articles en cards : -->
<h2>Derniers articles</h2>
<section id="articleView" class="listArticle">
    <?php foreach ($lastArticles as $la) { ?>
        <div class="card">
            <div>
                <h4><?= $la->title ?></h4>
            </div>
            <div class="card-image">
                <img src="<?= $la->picture ?>" alt="image">
            </div>
            <div>
                <p><?= $la->content ?></p>
            </div>
            <div>
                <p><?= $la->country ?></p>
            </div>
            <div>
                <p><?= $la->publicationDateFr ?></p>
            </div>
            <div>
                <p><?= $la->category ?></p>
            </div>
            <div class="buttonsBox">
                <a href="/article-<?= $la->id ?>"><input type="submit" value="Voir l'article"></a>
            </div>
        </div>
    <?php } ?>
</section>

<!-- articles en cards : -->
<h2>Les activités populaires</h2>
<section id="articleView" class="listArticle">
    <?php foreach ($activityArticles as $aA) { ?>
        <div class="card">
            <div>
                <h4><?= $aA->title ?></h4>
            </div>
            <div class="card-image">
                <img src="<?= $aA->picture ?>" alt="image">
            </div>
            <div>
                <p><?= $aA->content ?></p>
            </div>
            <div>
                <p><?= $aA->country ?></p>
            </div>
            <div>
                <p><?= $aA->publicationDateFr ?></p>
            </div>
            <div>
                <p><?= $aA->category ?></p>
            </div>
            <div class="buttonsBox">
                <a href="/article-<?= $aA->id ?>"><input type="submit" value="Voir l'article"></a>
            </div>
        </div>
    <?php } ?>
</section>

<!-- articles en cards : -->
<h2>mobilités et déplacements</h2>
<section id="articleView" class="listArticle">
    <?php foreach ($transportArticles as $tA) { ?>
        <div class="card">
            <div>
                <h4><?= $tA->title ?></h4>
            </div>
            <div class="card-image">
                <img src="<?= $tA->picture ?>" alt="image">
            </div>
            <div>
                <p><?= $tA->content ?></p>
            </div>
            <div>
                <p><?= $tA->country ?></p>
            </div>
            <div>
                <p><?= $tA->publicationDateFr ?></p>
            </div>
            <div>
                <p><?= $tA->category ?></p>
            </div>
            <div class="buttonsBox">
                <a href="/article-<?= $tA->id ?>"><input type="submit" value="Voir l'article"></a>
            </div>
        </div>
    <?php } ?>
</section>

<!-- articles en cards : -->
<h2>Conseils et avertissements</h2>
<section id="articleView" class="listArticle">
    <?php foreach ($securityArticles as $sA) { ?>
        <div class="card">
            <div>
                <h4><?= $sA->title ?></h4>
            </div>
            <div class="card-image">
                <img src="<?= $sA->picture ?>" alt="image">
            </div>
            <div>
                <p><?= $sA->content ?></p>
            </div>
            <div>
                <p><?= $sA->country ?></p>
            </div>
            <div>
                <p><?= $sA->publicationDateFr ?></p>
            </div>
            <div>
                <p><?= $sA->category ?></p>
            </div>
            <div class="buttonsBox">
                <a href="/article-<?= $sA->id ?>"><input type="submit" value="Voir l'article"></a>
            </div>
        </div>
    <?php } ?>
</section>

<!-- articles en cards : -->
<h2>Guide infos pratique</h2>
<section id="articleView" class="listArticle">
    <?php foreach ($practicesArticles as $pA) { ?>
        <div class="card">
            <div>
                <h4><?= $pA->title ?></h4>
            </div>
            <div class="card-image">
                <img src="<?= $pA->picture ?>" alt="image">
            </div>
            <div>
                <p><?= $pA->content ?></p>
            </div>
            <div>
                <p><?= $pA->country ?></p>
            </div>
            <div>
                <p><?= $pA->publicationDateFr ?></p>
            </div>
            <div>
                <p><?= $pA->category ?></p>
            </div>
            <div class="buttonsBox">
                <a href="/article-<?= $pA->id ?>"><input type="submit" value="Voir l'article"></a>
            </div>
        </div>
    <?php } ?>
</section>

<!-- articles en cards : -->
<h2>Spécialité culinaire</h2>
<section id="articleView" class="listArticle">
    <?php foreach ($gastronomyArticles as $gA) { ?>
        <div class="card">
            <div>
                <h4><?= $gA->title ?></h4>
            </div>
            <div class="card-image">
                <img src="<?= $gA->picture ?>" alt="image">
            </div>
            <div>
                <p><?= $gA->content ?></p>
            </div>
            <div>
                <p><?= $gA->country ?></p>
            </div>
            <div>
                <p><?= $gA->publicationDateFr ?></p>
            </div>
            <div>
                <p><?= $gA->category ?></p>
            </div>
            <div class="buttonsBox">
                <a href="/article-<?= $gA->id ?>"><input type="submit" value="Voir l'article"></a>
            </div>
        </div>
    <?php } ?>
</section>

<!-- articles en cards : -->
<h2>Formalités et contacts</h2>
<section id="articleView" class="listArticle">
    <?php foreach ($proceduresArticles as $pA) { ?>
        <div class="card">
            <div>
                <h4><?= $pA->title ?></h4>
            </div>
            <div class="card-image">
                <img src="<?= $pA->picture ?>" alt="image">
            </div>
            <div>
                <p><?= $pA->content ?></p>
            </div>
            <div>
                <p><?= $pA->country ?></p>
            </div>
            <div>
                <p><?= $pA->publicationDateFr ?></p>
            </div>
            <div>
                <p><?= $pA->category ?></p>
            </div>
            <div class="buttonsBox">
                <a href="/article-<?= $pA->id ?>"><input type="submit" value="Voir l'article"></a>
            </div>
        </div>
    <?php } ?>
</section>
<?php
require_once 'views/parts/footer.php';
