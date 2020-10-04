<?php
//var_dump($datas);die();
ob_start();

?>
<hr>
<div class="container  bg-dark" style="opacity:0.9;">
<h1 class="text-center bg-dark text-white"> Liste Categories</h1>
<hr>
<table class="table table-hover text-white"  >
  <thead >
    <tr>
      <th scope="col">Id Categorie</th>
      <th scope="col">Nom Categorie</th>
      <th scope="col">Date Creation</th>
      <th colspan="3">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($datas as $cat) { ?>
      <tr class="table-active text-white">
        <td><?= $cat->getId_categorie(); ?></td>
        <td><?= $cat->getNom_categorie(); ?></td>
        <td><?= $cat->getDate_created_cat(); ?></td>
        <td>
        <td>
                <a class="btn btn-danger" href="index.php?action=delete_categorie&id=<?=$cat->getId_categorie(); ?>"
                 onclick="return confirm('Etes sûr...')"> 
                <i class=" fa fa-trash"></i></a>
            </td>
        </td>
      </tr>
    <?php } ?>

  </tbody>
</table>

</div>

<?php

$content = ob_get_clean();
require_once('./views/template.php');

?>