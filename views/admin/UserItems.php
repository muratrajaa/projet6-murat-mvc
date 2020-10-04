<?php

ob_start();
?>
<hr>
<div class="container bg-dark" style="opacity: 0.9;">
<h1 class="h2 text-center text-white"><u>Liste des utilisateurs</u></h1>
<table class="table  text-white">
    <thead >
        <tr class="">
            <th>Id</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Login</th>
            <th>Email</th>
            <th>Role</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($datas as $user){ ?>
        <tr>
            <td><?=$user->getId_user(); ?></td>
            <td><?=$user->getNom(); ?></td>
            <td><?=$user->getPrenom(); ?></td>
            <td><?=$user->getLogin(); ?></td>
            <td><?=$user->getEmail(); ?></td>
            <td>
                <?php 
                    if($user->getRole() == 1){
                        echo"Adiministrateur";
                    }else{
                        echo "Utilisateur";
                    } 
                ?>
            </td>
            <?php 
                if($user->getRole() == 2){
                     if($user->statut == 1){ ?>
                    <td>
                        <a class="btn btn-success" href="index.php?action=status&id=<?=$user->getId_user();?>&statut=<?=$user->statut?>">Désactiver</a>
                    </td>
                    <?php }else{ ?>
                        <td>
                        <a class="btn btn-secondary" href="index.php?action=status&id=<?=$user->getId_user();?>&statut=<?=$user->statut?>">Activer</a>
                    </td>
            <?php }} ?>
        </tr>
        <?php } ?>
    </tbody>
</table>
</div>
<?php
$content = ob_get_clean();
require_once('./views/template.php');
?>