<?php

require_once('./controllers/admin/AdminCategorieController.php');
require_once('./controllers/admin/AdminArticleController.php');
require_once('./controllers/admin/AdminUserController.php');
require_once('./controllers/public/PublicController.php');
require_once('./controllers/admin/AuthController.php');



class Router{
    private $ctrac;
    private $ctraa;
    private $ctrau;
    private $ctrpub;


    public function __construct(){
        $this->ctrac = new AdminCategorieController();
        $this->ctraa = new AdminArticleController();
        $this->ctrau = new AdminUserController();
        $this->ctrpub = new PublicController();
    }

       
    public function getPath()
    {
        try {
            if (isset($_GET['action'])) {
                switch ($_GET['action']) {
                    case 'list_categorie':
                        $this->ctrac->listCategories();
                        break;
                    case 'add_categorie':
                        $this->ctrac->addCategories();
                        break;
                    case 'delete_categorie':
                        if (isset($_GET['id'])) {
                            $id = (int)$_GET['id'];
                            $this->ctrac->removeCategories($id);
                        }else{
                            throw new Exception('paramètre non défini');
                        }
                        break;
                    case 'list_article':
                        $this->ctraa->listArticle();
                        break;
                    case 'ajout_article':
                        $this->ctraa->ajoutArticle();
                        break;
                    case 'delete_article':
                        $this->ctraa->removeArticle();
                        break;
                    case 'edit_article':
                        $this->ctraa->modifArticle();   
                        break;
                    case 'list_user';
                        $this->ctrau->listUsers();
                        break;
                    case 'ajout_users';
                        $this->ctrau->ajoutUsers();
                        break;
                    case 'status':
                        $this->ctrau->updateStatus();    
                        break;
                    case 'logout':
                        AuthController::logout();   
                        break;
                    case 'admin':
                        $this->ctrau->login();   
                    break;
                case 'checkout':
                    $this->ctrpub->checkout();   
                    break;
                case 'pay':
                    $this->ctrpub->payment();   
                    break;
                   
                    
                    default:
                        throw new Exception('Url non définie');
                        break;
                } 
                }else {
                    $this->ctrpub->getData();
                }
        } catch (Exception $e) {
            //die($e->getMessage());
            $this->page404($e->getMessage());
        }  
           
    }


    
    public function page404($errorMsg){
        require_once('./views/page404.php');
    }
    
}