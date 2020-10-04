<?php

ob_start();
?>
<div class="row">
    <div class="col">
    <img class="img-thumbnail" src="./assets/images/<?=$image;?>" alt="Card image cap">
    </div>
    <div class="col">
     <ul class="list-group">
         <li class="list-group-item">Titre: <?=$titre ?></li>
         <li class="list-group-item">Prix: <span class="bagde badge-danger"><?=$prix ?> €</span</li> 
     </ul>
     <br>
     <div class="text-center">
        <form action="index.php?action=pay" method="post">
            <input type="hidden" name="prix" value="<?=$prix;?>">
            <input type="hidden" name="id" value="<?=$id_article;?>">
            <input type="hidden" name="titre" value="<?=$titre;?>">
            <script 
            src="https://checkout.stripe.com/checkout.js"
            class="stripe-button"
            data-key="pk_test_51HRCbSGpbf5zKJ9abc98lYIglE1jHqu85YrObp9egluGnjFmIzZr6AqCuohB26FkZfOuzbTuGjKM2RcvmQwXS4Na00UQVTAd6L"
            data-name="Soraya.Shop"
            data-description="L 'élégence avec une touche marocaine"
            data-image="https://www.caftandumaroc.com/wp-content/uploads/2020/03/LOGO180.png"
            data-amount="<?=$prix; ?>00"
            data-locale="auto"
            data-currency="eur"
            data-billing-address="true"
            data-label="Paiement par carte"
            >

            </script>
        </form>
    </div>
    </div>
</div>

<?php
$content = ob_get_clean();
require_once('./views/gabarit.php');
?>