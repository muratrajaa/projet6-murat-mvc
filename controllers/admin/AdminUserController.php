<?php

require_once('./models/admin/AdminUserModel.php');


class AdminUserController{
    private $driver;

    public function __construct(){
        $this->driver = new AdminUserModel();
    }


    public function listUsers(){
        AuthController::islogged();
        $datas =$this->driver->getUser();
        require_once('./views/admin/UserItems.php');

    }



    public function ajoutUsers(){
        AuthController::islogged();
        if (isset($_POST['envoi']) && strlen($_POST['login']) > 4 && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {

            $nom = trim(htmlentities(addslashes($_POST['nom'])));
            $prenom = trim(htmlentities(addslashes($_POST['prenom'])));
            $login = trim(htmlentities(addslashes($_POST['login'])));
            $email = trim(htmlentities(addslashes($_POST['email'])));
            $pass = md5(trim(htmlentities(addslashes($_POST['pass']))));
            $nom = trim(htmlentities(addslashes($_POST['nom'])));
            if (isset($_POST['admin'])) {
                $role = (int)$_POST['admin'];
            } else {
                $role = 2;
            }


            $user = new User();

            $user->setNom($nom);
            $user->setPrenom($prenom);
            $user->setLogin($login);
            $user->setEmail($email);
            $user->setPass($pass);
            $user->setRole($role);

            $error = $this->driver->addUsers($user);
        }


        require_once('./views/admin/addUser.php');
    
    }

    public function updateStatus()
    {
        AuthController::islogged();
        if (isset($_GET['id']) && isset($_GET['statut'])) {
            $id = (int)$_GET['id'];
            $statut = (bool)$_GET['statut'];

            if ($statut == 1) {
                $statut = 0;
            } else {
                $statut = 1;
            }
            $this->driver->changeStatut($statut, $id);

            header('location:index.php?action=list_user');
        }

    }
    



    public function login()
    {

        if (isset($_POST['envoi']) && strlen($_POST['pass']) >= 4 && !empty($_POST['login'])) {
            $login = trim(htmlentities(addslashes($_POST['login'])));
            $pass = md5(trim(htmlentities(addslashes($_POST['pass']))));
            $res = $this->driver->signIn($login, $pass);
            if ($res->rowCount()) {
                $rows = $res->fetch(PDO::FETCH_OBJ);
                if ($rows->statut == 1) {
                    session_start();
                    $_SESSION['Auth'] = $rows;
                    header('location:index.php?action=list_article');
                } else {
                    $error = "Ce compte a été suspendu";
                }
            } else {
                $error =  "Identifiant et mot de passe ne correspondent pas";
            }
        }
        require_once('./views/admin/formLogin.php');
    }



}