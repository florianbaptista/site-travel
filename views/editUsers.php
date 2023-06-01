<!-- message de success : -->
<?php if (isset($form)) { ?>
    <div class="formStatus <?= $form['status'] ?>">
        <?= $form['message']; ?>
    </div>
<?php } ?>

<h1>Modifier mon profil :</h1>
<form action="/modifier-profil" method="post" class="myForm">
    <div>
        <label for="username">Pseudo</label>
        <input type="text" id="username" name="username" value="<?= $profileInfos->username ?>">
        <?php if (isset($formErrors['username'])) { ?>
            <p><?= $formErrors['username'] ?></p>
        <?php } ?>
    </div>
    <div>
        <label for="email">Adresse mail</label>
        <input type="email" id="email" name="email" value="<?= $profileInfos->email ?>">
        <?php if (isset($formErrors['email'])) { ?>
            <p><?= $formErrors['email'] ?></p>
        <?php } ?>
    </div>
    <div>
        <label for="phone">Numéro de téléphone</label>
        <input type="text" id="phone" name="phone" value="<?= $profileInfos->phone ?>">
        <?php if (isset($formErrors['phone'])) { ?>
            <p><?= $formErrors['phone'] ?></p>
        <?php } ?>
    </div>
    <div>
        <label for="birthdate">Date de naissance</label>
        <input type="date" id="birthdate" name="birthdate" value="<?= $profileInfos->birthdate ?>">
        <?php if (isset($formErrors['birthdate'])) { ?>
            <p><?= $formErrors['birthdate'] ?></p>
        <?php } ?>
    </div>

    <div class="buttonsBox">
        <input name="editUsers" type="submit" value="Modifier">
    </div>
</form>

<h2>Supprimer mon compte :</h2>
<!-- </div> -->
<button class="open-modal-btn" id="buttonMod">Supprimer</button>

<div id="modal" class="modal">
    <div class="modal-content">
        <span class="close-btn">&times;</span>
        <h2>Etes vous sur de bien vouloir supprimer votre compte ?</h2>
        <p>Cliquer sur le bouton "Confirmer" ci-dessous pour supprimer le compte :</p>
        <form action="" method="post" id="deleteUsers">
            <input type="submit" value="Confirmer" name="deleteUsers" id="iptSupp">
        </form>
    </div>
</div>
