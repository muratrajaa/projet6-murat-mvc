<?php

ob_start();
?>
<hr>
<div class="container text-white bg-dark" style="opacity: 0.9;">
<h1 class="h2 text-center text-white bg-dark"><u>Formulaire d'inscription</u></h1>

<div class="row justify-content-center">
    <div class="col-6">
        <?php if (isset($error)) { ?>
            <div class="alert alert-danger"><?= $error; ?></div>
        <?php } ?>
        <form method="post" action="" class="">
            <div class="form-group">
                <label for="nom">Nom*: </label>
                <input type="text" id="nom" name="nom" placeholder="Entrer le nom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="prenom">Prénom*: </label>
                <input type="text" id="prenom" name="prenom" placeholder="Entrer le prenom" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="login">Login*: </label>
                <input type="text" id="login" name="login" placeholder="Entrer le login" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="email">Email*: </label>
                <input type="email" id="email" name="email" placeholder="Entrer l' email" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="pass">Mot de passe*: </label>
                <input type="password" id="pass" name="pass" placeholder="Entrer le mot de passe" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="admin">Administrateur: </label>
                <input type="checkbox" value="1" id="admin" name="admin" class="form-check">
            </div>

            <button type="submit" name="envoi" class="btn btn-dark btn-block">Inscrire</button>

        </form>
    </div>
</div>
</div>
<br/>
<?php
$content = ob_get_clean();
require_once('./views/template.php');
?>