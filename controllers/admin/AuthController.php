<?php
session_start();

class AuthController{

    public static function islogged(){
        if(!isset($_SESSION['Auth'])){
            header('location:index.php?action=admin');
            exit;
            
        }
    }

    public static function logout(){
        session_destroy();
        session_unset();
        header('location:index.php?action=admin');
    }
}