<section id="articleView">
    <h1><?= $title ?></h1>
    <?php if (isset($form)) { ?>
        <div class="formStatus <?= $form['status'] ?>">
            <?= $form['message']; ?>
        </div>
    <?php } else { ?>
        <form id="boxPost" action="/ajout-article" method="post" enctype="multipart/form-data" class="myForm">
            <div>
                <label for="title">Titre</label>
                <input type="text" name="title" id="title" placeholder="Ex: Comment grind challenger sur lol" value="<?= @$_POST['title'] ?>">
                <?php if (isset($formErrors['title'])) { ?>
                    <p><?= $formErrors['title'] ?></p>
                <?php } ?>
            </div>

            <div>
                <label for="content">Contenu</label>
                <!-- <input type="text" name="content" id="content" placeholder="blablabla"> -->
                <textarea placeholder="blablabla" cols="30" rows="10" name="content" id="content"><?= @$_POST['content'] ?></textarea>
                <?php if (isset($formErrors['content'])) { ?>
                    <p><?= $formErrors['content'] ?></p>
                <?php } ?>

            </div>

            <div>
                <article class="boxArticle">
                    <label class="boxTitle" for="image">Image</label>
                    <img src="" alt="" id="preview" style="max-width: 500px; margin-top: 20px;">
                    <input class="boxText" type="file" name="image" id="image" onchange="previewPicture(this)">
                    <?php if (isset($formErrors['image'])) { ?>
                        <p><?= $formErrors['image'] ?></p>
                    <?php } ?>
                </article>
            </div>

            <div>
                <label for="categories">Catégorie</label>
                <select name="categories" id="categories">
                    <option selected disabled>Sélection :</option>
                    <?php foreach ($list as $item) { ?>
                        <option value="<?= $item->id  ?>" <?= isset($_POST['categories']) && $_POST['categories'] == $item->id ? 'selected' : '' ?>><?= $item->name ?></option>
                    <?php } ?>
                </select>
                <?php if (isset($formErrors['categories'])) { ?>
                    <p><?= $formErrors['categories'] ?></p>
                <?php } ?>
            </div>

            <div>
                <label for="countries">Pays</label>
                <select name="countries" id="countries">
                    <option selected disabled>Sélection :</option>
                    <?php foreach ($listCountrie as $c) { ?>
                        <option value="<?= $c->id  ?>" <?= isset($_POST['countries']) && $_POST['countries'] == $c->id ? 'selected' : '' ?>><?= $c->name ?></option>
                    <?php } ?>
                </select>
                <?php if (isset($formErrors['countries'])) { ?>
                    <p><?= $formErrors['countries'] ?></p>
                <?php } ?>
            </div>

            <div class="buttonsBox">
                <input class="boxText" type="submit" value="Valider">
                <button id="cancel"><a href="/accueil">Annuler</a></button>
            </div>
        </form>
    <?php } ?>
</section>
