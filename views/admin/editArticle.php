<?php

ob_start();
?>
<h1 class="h2 text-center">Modifier l'article</h1>
<form action="" method="post" enctype="multipart/form-data">
    <div class="row">
    <div class="form-group col">
        <label for="titre">Titre:</label>
        <input type="text" value="<?=$row[0]->getTitre();?>"  name="titre" id="titre" placeholder="Entrer le titre de l'article" class="form-control">
    </div>
    <div class="form-group col">
        <label for="prix">Prix:</label>
        <input type="text"value="<?=$row[0]->getPrix();?>"  name="prix" id="prix" placeholder="Entrer le Prix" class="form-control">
    </div>
  
    <div class="form-group col">
        <label for="taille">Taille:</label>
        <input type="text" value="<?=$row[0]->getTaille();?> " name="taille" id="taille" placeholder="Entrer la taille" class="form-control">
    </div> 
    <div class="row">
    <div class="form-group col">
        <label for="image">Image:</label>
        <input type="File"  name="image" id="image"  class="form-control">
        <p class="mt-1"><img src="./assets/images/<?=$row[0]->getImage();?>" alt="" width="100"></p>
    </div>
    <div class="form-group col">
    <label for="categorie">Catégorie:</label>
        <select name="categorie" id="categorie" class="form-control">
        <option value="<?=$row[0]->getId_categorie();?>">
        <?=$row[0]->nom_cat;?></option>
        <?php foreach($datas as $cat){ 
            if($row[0]->getId_categorie() != $cat->getId_categorie()){ ?> 
            <option value="<?=$cat->getId_categorie();?>">
            <?=$cat->getNom_categorie();?></option>
        <?php }} ?>
        </select>
    </div>
    </div>
    <div class="form-group col">
        <label for="description">Description:</label>
        <textarea placeholder="Entrer la description" class="form-control" value="<?=$row[0]->getDescription();?>"  name="description" id="description" cols="30" rows="10"></textarea>
    </div>

    <button type="submit" name="soumis" class="btn btn-primary btn-block">Soumettre</button>
</form>
<?php

$content = ob_get_clean();
require_once('./views/template.php');
?>