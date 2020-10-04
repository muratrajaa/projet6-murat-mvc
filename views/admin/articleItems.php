<?php ob_start(); ?>
<div class="container ">
<hr>
<form action="" method="post" class="">
    <div class="input-group mb-3">
        <input type="text" name="search" class="form-control" placeholder="Recherche..." aria-label="" aria-describedby="">
        <div class="input-group-append">
            <button name="envoi" class="text-white bg-dark btn btn-outline-secondary" type="submit"><i class="fa fa-search"></i></button>
        </div>
    </div>
</form>
<hr>
<h1 class="table bg-dark text-center text-white" style="opacity: 0.9;"><u>Liste des Articles</u></h1>
<table class="table bg-dark text-white" style="opacity: 0.9;">
    <thead class="thead-dark">
        <tr>
            <td>Id article</td>
            <th>Titre</th>
            <th>Taille</th>
            <th>Prix</th>
            <th>Image</th>
            <th colspan="2">Categorie</th>
            <?php if (isset($_SESSION['Auth'])) {
              if ($_SESSION['Auth']->role == 1) { ?>
            <th class="text-center" colspan="3">Actions</th>
            <?php }}?>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($rows as $row) { ?>
            <tr>
                <td><?=$row->getId_article(); ?></td>
                <td><?= $row->getTitre(); ?></td>
                <td><?= $row->getTaille(); ?></td>
                <td><?= $row->getPrix(); ?> €</td>
                <td><img src="./assets/images/<?= $row->getImage(); ?>" alt="" width="200" height="200" /></td>
                 <td><?= $row->nom_cat; ?></td> 
                <td>
                <?php if (isset($_SESSION['Auth'])) {
              if ($_SESSION['Auth']->role == 1) { ?>
                <td class="text-center ">
                    <a href="index.php?action=list_article&id=<?= $row->getId_article(); ?>" class="btn btn-info"><i class="fa fa-info-circle"></i> Détail</a>

                    <a href="index.php?action=edit_article&id=<?= $row->getId_article(); ?>" class="btn btn-warning"><i class="fa fa-pencil"></i>Edit</a>

                    <a onclick="return confirm('Voulez-vous supprimer?')" href="index.php?action=delete_article&id=<?= $row->getId_article(); ?>&image=<?= $row->getImage(); ?>" class="btn btn-danger"><i class="fa fa-trash"></i>Supp</a>
        
                </td>
            </tr>
        <?php }}} ?>
    </tbody>
</table>
</div>
<?php

$content = ob_get_clean();
require_once('./views/template.php');
?>