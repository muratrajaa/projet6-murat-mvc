<?php

abstract class Driver{

    private static $bd;//instance de pdo

    protected function getRequest($sql, $params = null){
        $resultat = self::getBd()->prepare($sql);
        $resultat->execute($params);
        return $resultat;
    }
    
    //methode privée qui crée une instance si celle-ci n'extiste pas
    private static function getBd(){
        if(self::$bd === null){
            self::$bd = new PDO('mysql:host=localhost;dbname=Soraya_Shop','root','');
           self::$bd->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }
        return self::$bd;
    }
}