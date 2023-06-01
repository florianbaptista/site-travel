<h2>Tout les articles</h2>
<section id="articleView" class="listArticle">
    <?php foreach ($article as $item) { ?>
        <div class="card">
            <div class="card-image">
                <img src="<?= $item->picture ?>" alt="image">
            </div>
            <div>
                <h4><?= $item->title ?></h4>
            </div>
            <div>
                <p><?= $item->content ?></p>
            </div>
            <div>
                <p><?= $item->country ?></p>
            </div>
            <div>
                <p><?= $item->publicationDate ?></p>
            </div>
            <div class="textCategory">
                <p><?= $item->category ?></p>
            </div>
            <div class="buttonsBox">

                <a href="/article-<?= $item->id ?>"><input type="submit" value="Voir l'article"></a>
            </div>
        </div>
    <?php } ?>
</section>
