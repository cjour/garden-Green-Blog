<?php

class Manager {

    protected function dbConnexion(){
        
        $db = new PDO('mysql:host=localhost;dbname=zeus;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE 
        => PDO::ERRMODE_EXCEPTION));
        return $db;

    }
}