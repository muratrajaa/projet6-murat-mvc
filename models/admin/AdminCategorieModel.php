<?php

require_once('./models/Categorie.php');
require_once('./models/Driver.php');

class AdminCategorieModel extends Driver{

    public function getCategories(){
        $sql = "SELECT * FROM categorie";
        $res = $this->getRequest($sql);
        $rows = $res->fetchAll(PDO::FETCH_OBJ);
        
        $donnees = [];
        foreach($rows as $row){
            $cat = new Categorie();
            $cat->setId_categorie($row->id_categorie);
            $cat->setNom_categorie($row->nom_categorie);
            $cat->setDate_created_cat($row->date_created_cat);
            array_push($donnees,$cat);
        }
        return $donnees;
       // var_dump($donnees);die();

    }

    public function ajoutCategories(Categorie $cat){
        $sql="INSERT INTO categorie(nom_categorie) VALUES(:nom_categorie)";
        $res = $this->getRequest($sql,['nom_categorie'=>$cat->getNom_categorie()]);
        return $res;
    }


    public function deleteCategories($id){
        $sql ="DELETE FROM categorie WHERE id_categorie =?";
        $res = $this->getRequest($sql,[$id]);
        $tabs = $res->rowCount();
        return $tabs;
    }



}
