<?php ob_start(); ?>
<div class="container">
  <div class="card">
    <div class="card col-6 offset-3">
      <img class="card-img-top" src="./assets/images/<?= $row[0]->getImage(); ?>" alt="" width="600" height="500"/>
      <div class="card-body">
        <h5 class="card-title">
        <?= $row[0]->getTitre(); ?>  N°: <?= $row[0]->getId_article(); ?>
        </h5>
        <p class="card-text">Description: <?= $row[0]->getDescription();?></p>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">Catégorie: <?= strtoupper($row[0]->nom_cat) ?></li>
        <li class="list-group-item">Taille: <?= $row[0]->getTaille(); ?></li>
        <li class="list-group-item">Prix: <?= $row[0]->getPrix(); ?>€</li>
        <li class="list-group-item">Crée le: <?= $row[0]->getDate_created_art(); ?></li>
      </ul>
    </div>
  </div>
</div>
<?php
$content = ob_get_clean();
require_once('./views/template.php');
?>