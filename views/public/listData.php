<?php
ob_start();
?>


<?php foreach ($datasCat as $cat) { ?>
    <div class="container">
        <h1 class="text-center text-white">Catégorie: <?= strtoupper($cat->getNom_categorie()) ?></h1>
        <hr>
        <div class="row m-3 " id="mam">
            <?php foreach ($datasArt as $art) {
                if ($cat->getId_categorie() == $art->getId_categorie()) {
            ?>
                    <div class="col-4" id="mam">
                        <div class="card">

                             <img src="./assets/images/<?= $art->getImage(); ?>" onclick="window.open(this.src,'_blank','toolbar=10, location=0, directories=0, status=0, scrollbars=0, resizable=0, copyhistory=0, menuBar=0, width='+this.width+', height='+this.height);" height="400"/>
                 
                            <div class="card-body text-dark">
                                <h5 class="card-title">Titre: <?= $art->getTitre(); ?></h5>
                                <p class="card-text"><?= $art->getDescription(); ?></p>
                            </div>
                            <ul class="list-group list-group-flush text-dark">
                                <li class="list-group-item">Prix:
                                    <span class="badge badge-dark">
                                        <?= $art->getPrix(); ?> €
                                    </span>
                                </li>

                                <li class="list-group-item text-dark">
                                    <?php if ($art->etat == 1) { ?>
                                        <span class="badge badge-success">
                                            Disponible
                                        </span>
                                    <?php } else { ?>
                                        <span class="badge badge-warning">
                                            Indisponible
                                        </span>
                                    <?php } ?>
                                </li>
                                <li class="list-group-item text-dark">Titre: <?= $art->getTitre(); ?></li>
                                <li class="list-group-item text-dark">Prix: <?= $art->getPrix(); ?></li>
                            </ul>
                            <div class="card-body">
                                <!-- <a href="checkout.php?" class="card-link btn btn-danger">Acheter</a> -->
                                <form action="index.php?action=checkout" method="post">
                                    <input type="hidden" name="id" value="<?= $art->getId_article(); ?>">
                                    <input type="hidden" name="prix" value="<?= $art->getPrix(); ?>">
                                    <input type="hidden" name="image" value="<?= $art->getImage(); ?>">
                                    <input type="hidden" name="titre" value="<?= $art->gettitre(); ?>">
                                    <?php if ($art->etat == 1) { ?>
                                        <button name="payer" type="submit" class="card-link btn btn-danger" style="background-color: rgb(240, 94, 120);">Payer</button>

                                    <?php } ?>
                                </form>
                                <?php if ($art->etat == 0) { ?>
                                    <div></div><a href="" class="card-link btn btn-warning" style="background-color: rgb(132, 194, 194);">Commander</a>
                                <?php } ?>
                            </div>
                        </div>

                    </div>
            <?php }
            } ?>
        </div>
    <?php }
$content = ob_get_clean();
require_once('./views/gabarit.php');
    ?>
    </div>