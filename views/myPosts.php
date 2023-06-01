<section id="my-posts">
    <?php if (isset($_SESSION['user'])) {
        if (count($results)) { ?>
            <div class="tableMyPosts">
                <table>
                    <thead>
                        <tr>
                            <th>Titre</th>
                            <th>Date de publication</th>
                            <th>Catégorie</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $article) { ?>
                            <tr>
                                <td><?= $article->title ?></td>
                                <td><?= $article->pDate ?></td>
                                <td><?= $article->category ?></td>
                                <td id="tableIcons">
                                    <a href="/modifier-article-<?= $article->id ?>" title="Modifier l'article"><i class="fa-solid fa-pen"></i></a>
                                    <!-- suppression article -->
                                    <button class="open-modal-btn" idarticle="<?= $article->id ?>" name="id"><i class="fa-solid fa-trash-can" idarticle="<?= $article->id ?>"></i></button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        <?php } else { ?>
            <div class="formStatus fail">
                <p>Vous n'avez créé aucun article pour le moment !</p>
            </div>
        <?php } ?>
    <?php } else { ?>
        <div class="formStatus fail">
            <p>Vous devez être <a href="/connexion" title="Page de connexion">connecté</a> pour accéder à cette page.</p>
        </div>
    <?php } ?>
</section>
<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>Etes vous sur de bien vouloir supprimer votre article ?</h2>
        <p>Cliquer sur le bouton "Confirmer" ci-dessous pour supprimer l'article :</p>
        <form action="" method="post">
            <input type="hidden" name="deleteArticle" id="deleteArticle">
            <input type="submit" value="Confirmer" id="iptSupp">
        </form>
    </div>
</div>