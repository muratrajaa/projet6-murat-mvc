<?php

require_once('./models/admin/AdminCategorieModel.php');
require_once('./controllers/admin/AuthController.php');


class AdminCategorieController{
    private $driver;


    public function __construct(){
            $this->driver = new AdminCategorieModel();
    }

    public function listCategories(){
        AuthController::islogged();

        $datas = $this->driver->getCategories();
        require_once('./views/admin/categorieItems.php');
    }

    public function removeCategories($id){
        AuthController::islogged();

        $res = $this->driver->deleteCategories($id);
        if($res){
            header('location:index.php?action=list_categorie');
        }

    }

    public function addCategories(){
        AuthController::islogged();

        if(isset($_POST['ajoutCat']) &&  !empty($_POST['categorie'])){
            $nom_categorie = trim(addslashes(htmlentities($_POST['categorie'])));
            $new_categorie = new Categorie();
            $new_categorie->setNom_categorie($nom_categorie);

            $res = $this->driver->ajoutCategories($new_categorie);

            if($res){
                header('location:index.php?action=list_categorie');
            }
        }
        require_once('./views/admin/addCategories.php');
    }
}