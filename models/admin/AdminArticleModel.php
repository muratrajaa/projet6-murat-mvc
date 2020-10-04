<?php

class AdminArticleModel extends Driver{

public function getArticle($id = null, $search = null){
    if(!empty($search)){
        $sql = "SELECT * FROM article a
                INNER JOIN categorie c
                ON a.id_categorie = c.id_categorie
                WHERE titre like ?  OR nom_categorie LIKE ?";

        $tabSearch = ["%$search","$search"];
        $res = $this->getRequest($sql,$tabSearch); //
        
        }else if(!empty($id)){
            $sql = "SELECT * FROM article WHERE id_article =?";
            $res= $this->getRequest($sql,[$id]);
        }else{
            $sql = "SELECT * FROM article";
            $res = $this->getRequest($sql);
        }
        $lines = $res->fetchAll(PDO::FETCH_OBJ);

        $datas = [];

        foreach($lines as $line){
            $art = new article();
            $art->setId_article($line->id_article);
            $art->setTitre($line->titre);
            $art->setPrix($line->prix);
            $art->setTaille($line->taille);
            $art->setImage($line->image);
            $art->setDescription($line->description);
            $art->setDate_created_art($line->date_created_art);
            $art->setId_categorie($line->id_categorie);
            $art->etat = $line->etat;
            $art->nom_cat = $this->getNameCat($line->id_categorie)->getNom_categorie();
            array_push($datas,$art);

        }
        return $datas;
       // var_dump($datas);
    }


///
    public function getNameCat($id){

        $sql = "SELECT * FROM categorie WHERE id_categorie = ?";
       
        $res = $this->getRequest($sql,[$id]);
        $data = $res->fetch(PDO::FETCH_OBJ);

        $cat = new Categorie();
        if($res->rowCount()){
            $cat->setId_categorie($data->id_categorie);
            $cat->setNom_categorie($data->nom_categorie);
        }
        return $cat;
    }


    public function deleteArticle($id){
        $sql = "DELETE FROM article WHERE id_article = ?";
        $res = $this->getRequest($sql,[$id]);
        $tabs = $res->rowCount();
        return $tabs;
    }



        public function addArticle(Article $art){
        $sql="INSERT INTO article(titre,taille,prix,image,description,id_categorie)
                VALUES(?,?,?,?,?,?)";

        $tabParams =[$art->getTitre(),$art->getTaille(),$art->getPrix(),$art->getImage(),$art->getDescription(),$art->getId_categorie()];
        
        $res = $this->getRequest($sql,$tabParams);
        
        return $res->rowCount();
    }

    
    public function updateArticle(Article $art){
        if($art->getImage() === ""){
            $sql ="UPDATE article
                    SET titre=?,taille=?,prix=?,description=?,id_categorie=? 
                    WHERE id_article=? ";
                    
        $tabParams =[$art->getTitre(),$art->getTaille(),$art->getPrix(),$art->getDescription(),$art->getId_categorie(),$art->getId_article()];

    }else{
                $sql ="UPDATE article
                SET titre=?, taille=?, prix=?, image=?, description=?,id_categorie=?
                WHERE id_article=? ";
        $tabParams =[$art->getTitre(),$art->getTaille(),$art->getPrix(),$art->getImage(),$art->getDescription(),$art->getId_categorie()];
    }
            $res=$this->getRequest($sql,$tabParams);
            return $res->rowCount();

    }

}