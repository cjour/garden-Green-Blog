<?php
namespace Blog;
use \PDO;


class ProfilManager extends Manager {

    public function getMyProfil($pseudo){

        $db = $this -> dbConnexion();
        $req = $db->prepare('SELECT pseudo, email, img FROM users_login WHERE pseudo = ?');
        $req->execute(array($pseudo));
        return $req;
    }

    public function updateProfilPic($img, $pseudo){

        $db = $this -> dbConnexion();
        $req = $db->prepare('UPDATE users_login SET img = :img WHERE pseudo = :pseudo');
        $Id_user = $req->execute(array(
            'img' => $img,
            'pseudo' => $pseudo
        ));

    }
}