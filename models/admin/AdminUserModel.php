<?php

require_once('./models/User.php');
require_once('./models/Driver.php');


class AdminUserModel extends Driver{

    public function getUser(){
        $sql="SELECT * FROM users";
        $res= $this->getRequest($sql);
        $rows= $res->fetchAll(PDO::FETCH_OBJ);
        $donnees = [];

        foreach($rows as $row){

            $user= new User();
            $user->setId_user($row->id_user);
            $user->setNom($row->nom);
            $user->setPrenom($row->prenom);
            $user->setLogin($row->login);
            $user->setEmail($row->email);
            $user->setRole($row->role);
            $user->statut = $row->statut;
            array_push($donnees, $user);
        }
        return $donnees;
        //var_dump($donnees);
    }


    public function addUsers(User $user){

        $req = "SELECT * FROM users WHERE email=?";
        $res2 = $this->getRequest($req,[$user->getEmail()]);

        if ($res2->rowCount() == 0) {
            $sql = "INSERT INTO users(nom, prenom, login,email,pass,role)
                VALUES(?,?,?,?,?,?)";
            $tabUser = [$user->getNom(), $user->getPrenom(), $user->getLogin(), $user->getEmail(), $user->getPass(), $user->getRole()];
            $res2 = $this->getRequest($sql, $tabUser);
            if ($res2) {
                header('location:index.php?action=list_user');
            }
            return "";
        } else {
            return "Ce compte existe déjà...";
        }
    }




    public function changeStatut($statut, $id)
    {

        $sql = "UPDATE users SET statut = ? WHERE id_user = ?";
        $res = $this->getRequest($sql, [$statut, $id]);

        return $res->rowCount();
    }


    
    public function signIn($login, $pass)
    {
        $sql = "SELECT * FROM users WHERE (login = :login OR email = :login) AND pass = :pass";
        $res = $this->getRequest($sql, ['login' => $login, 'pass' => $pass]);
        return $res;
    }

}