<?php

ob_start();
?>
<hr>
<div class="container bg-dark" style="opacity: 0.9;">
<h1 class="h2 text-center text-white bg-dark"> <u>Formulaire de connexion</u></h1>
    <div class="row justify-content-center text-white">
        <div class="col-6">
            <?php
                if(isset($error)){
                    echo"<div class='alert alert-danger text-center'>$error</div>";
                }
            ?>
      
        <form method="post" action="" class="">
            <div class="form-group">
            <label for="login">Login*: </label>
            <input type="text" id="login" name="login" placeholder="Entrer le login" class="form-control" required>
            </div>
            <div class="form-group">
            <label for="pass">Mot de passe*: </label>
            <input type="password" id="pass" name="pass" placeholder="Entrer le mot de passe" class="form-control" required>
            </div>
            <hr>
            <button type="submit" name="envoi" class="btn btn-dark btn-block" >Connectez-vous</button>
        
        </form>
        </div>
    </div>
<hr/>
</div>
<?php
    $content = ob_get_clean();
    require_once('./views/template.php');
?>