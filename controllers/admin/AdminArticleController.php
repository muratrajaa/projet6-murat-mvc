<?php

require_once('./models/Article.php');
require_once('./models/Categorie.php');
require_once('./models/Driver.php');
require_once('./models/admin/AdminArticleModel.php');
require_once('./models/admin/AdminCategorieModel.php');
require_once('./controllers/admin/AuthController.php');


class AdminArticleController{
    private $driver;
    private $driver2;

    
    public function __construct(){
        $this->driver = new AdminArticleModel();
        $this->driver2 = new AdminCategorieModel();

    }

    public function listArticle(){
        AuthController::islogged();
     
        if(isset($_POST['envoi'])){
            $search = trim(addslashes(htmlentities($_POST['search'])));
            $rows = $this->driver->getArticle(null,$search);
            require_once('./views/admin/articleItems.php');
        }elseif(isset($_GET['id'])){
            $id = (int)$_GET['id'];
            $row = $this->driver->getArticle($id);
            require_once('./views/admin/detailArticle.php');
        }else{
            $rows= $this->driver->getArticle();
            require_once('./views/admin/articleItems.php');
        }

    }

  

/////// 
    public function ajoutArticle(){
        AuthController::islogged();
        if(isset($_POST['soumis']) && !empty($_POST['titre']) && !empty($_POST['categorie'])){
            $titre = trim(htmlentities(addslashes($_POST['titre'])));
            $taille = trim(htmlentities(addslashes($_POST['taille'])));
            $prix = (int)trim(htmlentities(addslashes($_POST['prix'])));
            $description = trim(htmlentities(addslashes($_POST['description'])));
            $categorie = (int)trim(htmlentities(addslashes($_POST['categorie'])));
            $image = $_FILES['image']['name'];
        
            $destination = './assets/images/';
            move_uploaded_file($_FILES['image']['tmp_name'], $destination.$image);
        
            $art = new Article();
            
            $art->setTitre($titre);
            $art->setTaille($taille);
            $art->setPrix($prix);
            $art->setDescription($description);
            $art->setId_categorie($categorie);
            $art->setImage($image);
     
                                                              
            $nb = $this->driver->addArticle($art);
        
            if($nb){
                header('location:index.php?action=list_article');
            }else{
                echo "Echec l'ors de l'insertion";
            }
        
        }

        $datas = $this->driver2->getCategories();
        require_once('./views/admin/addArticle.php');
    
    }



    public function modifArticle(){
        AuthController::islogged();
        if(isset($_GET['id'])){
            $id = (int)$_GET['id'];
            $row = $this->driver->getArticle($id);

        if(isset($_POST['soumis']) && !empty($_POST['titre'])){
            $titre = trim(htmlentities(addslashes($_POST['titre'])));
            $taille = trim(htmlentities(addslashes($_POST['taille'])));
            $prix = (int)trim(htmlentities(addslashes($_POST['prix'])));
            $description = trim(htmlentities(addslashes($_POST['description'])));
            $categorie = (int)trim(htmlentities(addslashes($_POST['categorie'])));
            
            $image = $_FILES['image']['name'];

            $destination = './assets/images/';
            move_uploaded_file($_FILES['image']['tmp_name'], $destination.$image);
        
            
            $row[0]->setTitre($titre);
            $row[0]->setTaille($taille);
            $row[0]->setPrix($prix);
            $row[0]->setDescription($description);
            $row[0]->setId_categorie($categorie);
            $row[0]->setImage($image);
    //var_dump($row);die();
        
            $nb = $this->driver->updateArticle($row[0]);
            if($nb){
                header('location:index.php?action=list_article');
            }
        }
        $datas = $this->driver2->getCategories();
        require_once('./views/admin/editArticle.php');
    }
    }



    public function removeArticle(){
        AuthController::islogged();
        if(isset($_GET['image']) && isset($_GET['id'])){
            $image = $_GET['image'];
            $id = (int)$_GET['id'];
            $n = $this->driver->deleteArticle($id);
            if($n){
                $fichier = './assets/images/'.$image;
                unlink($fichier);
                header('location:index.php?action=list_article');
             }
            
        }
    }


}