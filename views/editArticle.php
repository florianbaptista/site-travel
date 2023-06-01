<!-- message de success : -->
<?php if (isset($form)) { ?>
    <div class="formStatus <?= $form['status'] ?>">
        <?= $form['message']; ?>
    </div>
<?php } ?>

<h1>Modifier mon profil :</h1>
<form action="/modifier-article-<?= $_GET['id'] ?>" method="post" class="myForm">
    <div>
        <label for="title">Titre</label>
        <input type="text" id="title" name="title" value="<?= $postForms->title ?>">
        <?php if (isset($formErrors['title'])) { ?>
            <p><?= $formErrors['title'] ?></p>
        <?php } ?>
    </div>
    <div>
        <label for="content">Contenu</label>
        <textarea cols="30" rows="10" name="content" id="content"><?= $postForms->content ?></textarea>
        <?php if (isset($formErrors['content'])) { ?>
            <p><?= $formErrors['content'] ?></p>
        <?php } ?>
    </div>

    <div>
        <label for="categories">Catégorie</label>
        <select name="categories" id="categories">
            <option selected disabled>Sélection :</option>
            <?php foreach ($list as $item) { ?>
                <option value="<?= $item->id  ?>" <?= $postForms->id_categories == $item->id ? 'selected' : '' ?>><?= $item->name ?></option>
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
                <option value="<?= $c->id  ?>" <?= $postForms->id_countries == $c->id ? 'selected' : '' ?>><?= $c->name ?></option>
            <?php } ?>
        </select>
        <?php if (isset($formErrors['countries'])) { ?>
            <p><?= $formErrors['countries'] ?></p>
        <?php } ?>
    </div>

    <div class="buttonsBox">
        <input class="boxText" name="editPost" type="submit" value="Valider">
        <button id="cancel"><a href="/mes-articles">Annuler</a></button>
    </div>
</form>

<form action="/modifier-article" method="post" class="myForm">
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
    <div class="buttonsBox">
        <input class="boxText" name="editImage" type="submit" value="Valider">
        <button id="cancel"><a href="/mes-articles">Annuler</a></button>
    </div>
</form>