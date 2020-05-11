<?php
namespace Blog;
use \PDO;


class PostManager extends Manager{


    public function getPosts(){

        $db = $this->dbConnexion();
        $req = $db->query('SELECT id, title, content, DATE_FORMAT(publication_date, \'%d/%m/%Y à %Hh%i\') AS publication_date FROM articles ORDER BY id DESC');

        return $req;
    }

    public function getPostsWithHeading($rubrique) {

        $db = $this->dbConnexion();
        $filteredPosts = $db->prepare('SELECT id, title, content, DATE_FORMAT(publication_date, \'%d/%m/%Y à %Hh%i\') AS publication_date FROM articles WHERE id_heading_theme = ? ORDER BY id DESC ');
        $filteredPosts->execute(array($rubrique));
        return $filteredPosts;
    }

    public function getPost($postId){

        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT id, title, content, DATE_FORMAT(publication_date, \'%d/%m/%Y à %Hh%i\') AS publication_date from articles WHERE id=?');
        $req->execute(array($postId));
        $post = $req->fetch();
        
        return $post;
    }

    public function publishPost($article, $title, $idHeading){
        
        $db = $this->dbConnexion();     
        $req = $db->prepare('INSERT INTO articles (publication_date, content, title, id_heading_theme) VALUES (NOW(), ?, ?, ?)');
        $req->execute(array($article, $title, $idHeading));
 
    }

    public function update($postId){

        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT publication_date, content, title FROM articles WHERE id = ?');
        $req->execute(array($postId));

    }

    public function updatePost($article, $title, $postId, $idHeading){

        $db = $this->dbConnexion();
        $req = $db->prepare('UPDATE articles SET publication_date = NOW(), content = ?, title = ?, id_heading_theme = ? WHERE id = ?');
        $req->execute(array($article, $title, $idHeading, $postId));
        

    }

    public function deletePost($postId){

        $db = $this->dbConnexion();
        $req = $db->prepare('DELETE FROM comments WHERE id_post=?');
        $req->execute(array($postId));
        $req = $db->prepare('DELETE FROM articles WHERE id=?');
        $req->execute(array($postId));
    }

    public function addHeading($newHeading){

        $db = $this -> dbConnexion();
        $req = $db -> prepare('INSERT INTO heading (heading_theme) VALUES (?)');
        $req->execute(array($newHeading));
    }

    public function getExistingHeading(){

        $db = $this -> dbConnexion();
        $req = $db -> query('SELECT * FROM heading');
        return $req;
    }
    
    public function getSpecificHeading($postId){

        $db = $this -> dbConnexion();
        $req = $db -> prepare('SELECT heading.heading_theme 
        FROM heading
        INNER JOIN articles
        ON heading.id = articles.id_heading_theme
        WHERE articles.id = ?');
        $req-> execute(array($postId));
        $heading = $req->fetch();
        return $heading;
    }

    public function getIdHeading($headingString){

        $db = $this -> dbConnexion();
        $req = $db -> prepare('SELECT id FROM heading WHERE heading_theme = ?');
        $req->execute(array($headingString));
        $headingId = $req->fetch(PDO::FETCH_ASSOC);
        return (intval($headingId['id']));
        
    }
}