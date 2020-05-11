<?php
namespace Blog;

class ConnectionManager extends Manager {

    public function LogIn($Pseudo, $Password){

        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT pseudo, password FROM users_login WHERE pseudo = ?');
        $req->execute(array($Pseudo));
        $passwordVerify = $req->fetch();

        return (password_verify($Password, $passwordVerify['password']));
    }

    public function verifyPseudoAvailability($Pseudo){

        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT pseudo FROM users_login WHERE pseudo = ?');
        $req->execute(array($Pseudo));
        $returnedArrayOfPseudo = $req->fetchAll();
        /*fetchAll() retourne un tableau avec un résultat si le Pseudo
        est déjà présent dans la table users_login de la BDD forteroche.
        Sinon il retourne un tableau vide.
        */
        return count($returnedArrayOfPseudo);
        
    }

    public function SignMeIn($Pseudo, $Email, $Password, $PasswordConfirm){
 
            $db = $this->dbConnexion();
            $req = $db->prepare('INSERT INTO users_login (pseudo, email, password, sign_in_date, id_statut) VALUES (?, ?, ?, NOW(), 1)');
            $req->execute(array($Pseudo, $Email, password_hash($Password, PASSWORD_DEFAULT)));
        
    }

    public function verifyMyStatut($Pseudo){

        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT id_statut FROM users_login WHERE pseudo = ?');
        $req->execute(array($Pseudo));
        $statut = $req->fetch(PDO::FETCH_ASSOC);
        return (intval($statut['id_statut']));

    }

    public function getMyAuthorId($Pseudo){

        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT id FROM users_login WHERE pseudo = ?');
        $req->execute(array($Pseudo));
        $id = $req->fetch(PDO::FETCH_ASSOC);
        return (intval($id['id']));

    }

    public function getMyProfil($Pseudo){
        
        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT * FROM users_info WHERE id = ?');
        $profilInfo = $req->execute(array($Pseudo));

        return $profilInfo;
    }

}
