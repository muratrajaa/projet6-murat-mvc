<?php

ob_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajout de catégorie</title>
</head>
<hr>
<body>
    <div  style="opacity: 0.9;">
    <h1 class="h2 text-center text-white bg-dark"> <u>Ajouter une catégorie</u></h1>
    <div class="row justify-content-center">
        <div class="col-4">
        <form method="post" action="" class="">
            <div class="form-group text-white text-center bg-dark">
            <label for="categorie">Catégorie: </label>
            <input type="text" id="categorie" name="categorie" placeholder="Inserer la Catégorie" class="form-control">
            </div>
            <hr>
         
          <div>
            <button type="submit" name="ajoutCat" class="btn btn-dark btn-block">Insérer</button>
            </div>
        </form>
        </div>
    </div>
    </div>
</body>
</html>
<hr><hr>
<?php
$content = ob_get_clean();
require_once('./views/template.php');
?>