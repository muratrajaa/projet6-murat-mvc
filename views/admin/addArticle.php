<?php
ob_start();
?>
<div class="container">
<h1 class="h2 text-center">Ajout d'un article</h1>
<form action="" method="post" enctype="multipart/form-data" class="text-white bg-dark" style="opacity: 0.9;">
    <div class="row">
    <div class="form-group col">
        <label for="titre">Titre:</label>
        <input type="text" name="titre" id="titre" placeholder="Entrer le titre de l'article" class="form-control">
    </div>
    <div class="form-group col">
        <label for="prix">Prix:</label>
        <input type="text" name="prix" id="prix" placeholder="Entrer le Prix" class="form-control">
    </div>
  
    <div class="form-group col">
        <label for="taille">Taille:</label>
        <input type="text" name="taille" id="taille" placeholder="Entrer la taille" class="form-control">
    </div>
   

    </div>
    <div class="row">

    </div>
    <div class="row">
    <div class="form-group col">
        <label for="image">Image:</label>
        <input type="File" name="image" id="image"  class="form-control">
    </div>
    <div class="form-group col">
        <label for="categorie">Catégorie:</label>
        <select name="categorie" id="categorie" class="form-control">
        <option hidden>Choisir une catégorie</option>
        <?php foreach($datas as $cat){ ?>  
        <option value="<?=$cat->getId_categorie();?>"><?=$cat->getNom_categorie();?></option>
        <?php } ?>
        </select>
    </div>
    </div>
    <div class="form-group col">
        <label for="description">Description:</label>
        <textarea placeholder="Entrer la description" class="form-control" name="description" id="description" cols="30" rows="10"></textarea>
    </div>

    <button type="submit" name="soumis" class="btn btn-dark btn-block">Soumettre</button>
</form>
</div>
<hr>
<hr>

<?php

$content = ob_get_clean();
require_once('./views/template.php');
?>