<?php

require_once('./models/Article.php');
require_once('./models/Driver.php');

class PublicModel extends Driver{

    public function switchEtat($etat,$id){
        $sql = "UPDATE article SET etat = ? WHERE id_article = ?";
     
        $res = $this->getRequest($sql,[$etat,$id]);

        return $res->rowCount();
    }
}