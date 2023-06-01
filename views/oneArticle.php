    <div id="articleTitle">
        <h1><?= $article->title ?></h1>
        <p><?= $article->country ?></p>
        <p><?= $article->publicationDateFr ?> - <?= $article->category ?> - par <?= $article->username ?></p>
    </div>

    <div class="articleImage" style="background-image: url(../<?= $article->picture ?>);"></div>


    <p class="contentPost"><?= $article->content ?></p>


    <h2>Commentaires :</h2>
    <?php foreach ($postCommentLire as $cp) { ?>
        <div class="listCommentPage">
            <p>De : <?= $cp->username ?></p>
            <p>Contenu : <?= $cp->content ?></p>
            <p><small><?= $cp->publicationDate ?></small></p>
        </div>
    <?php } ?>

    <form method="post" action="/article-<?= $_GET['id'] ?>">
        <div class="addCommentPage">
            <label for="comments">Ajouter un commentaire :</label>
            <textarea name="comments" id="comments" cols="30" rows="10" placeholder="Masterclass l'article !"><?= isset($_POST['comments']) && isset($formErrors['comments']) ? $_POST['comments'] : '' ?></textarea>
            <?php if (isset($formErrors['comments'])) { ?>
                <p><?= $formErrors['comments']  ?></p>
            <?php } ?>
            <input type="submit" value="Envoyer">
        </div>
    </form>