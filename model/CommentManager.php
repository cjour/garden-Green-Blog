<?php
namespace Blog;

class CommentManager extends Manager{
    
    public $_limit;
    public $_currentPage;
    private $_startingPoint;

    public function __construct(){

        $this->_limit = 5;
        $this->_currentPage = intval($_GET['page']);
        $this->_startingPoint = (($this->_currentPage-1)*$this->_limit);
        
    }
    
    public function getTotalComments($postId){

        $db = $this->dbConnexion();
        $req = $db->prepare('SELECT count(*) FROM comments WHERE comments.id_post = ?');
        $req->execute(array($postId));
        $count = $req->fetchColumn();

        return $count;
    }

    public function getComments($postId){

        $db = $this->dbConnexion();
        $commentaires = $db->prepare('SELECT comments.id AS id, comments.comment AS comment, DATE_FORMAT(comments.comments_date, \'%m/%Y\') AS comment_date, comments.signaled_comments AS signaled_comments, users_login.pseudo AS pseudo, users_login.img AS img
        FROM comments
        INNER JOIN users_login
        ON comments.id_user = users_login.id
        WHERE comments.id_post = ? 
        ORDER BY comments_date DESC LIMIT ' . $this->_startingPoint . ',' . $this->_limit);
        $commentaires->execute(array($postId));
    
        return $commentaires;
    }
    
    public function getComment($commentId){

        $db = $this->dbConnexion();
        $commentaire = $db->prepare('SELECT comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date FROM comments WHERE id = ?');
        $commentaire->execute(array($commentId));
    
        return $commentaire;
    }

    public function deleteComment($commentId){

        $db = $this->dbConnexion();
        $commentaire = $db->prepare('DELETE FROM comments WHERE id = ?');
        $commentaire->execute(array($commentId));
    
    }

    public function postAComment($postId, $id_auteur, $commentaire){
    
        $db = $this->dbConnexion();
        $req = $db->prepare('INSERT INTO comments(id_post, id_user, comment, comments_date, signaled_comments) VALUES(?, ?, ?, NOW(), 0)');//id user faut faire une jointure de table.
        $affectedLines = $req->execute(array($postId, $id_auteur, $commentaire));
        return $affectedLines;
    
    }

    public function signalAComment($commentId){//pass an int = 1 into field signaled_comments of comments database

        $db = $this->dbConnexion();
        $req = $db->prepare('UPDATE comments SET signaled_comments = 1 WHERE id = ?');
        $req->execute(array($commentId));

    }

    public function unsignalComment($commentId){//pass an int = 0 into field signaled_comments of comments database

        $db = $this->dbConnexion();
        $req = $db->prepare('UPDATE comments SET signaled_comments = 0 WHERE id = ?');
        $req->execute(array($commentId));

    }

    public function getSignaledComments(){

        $db = $this->dbConnexion();
        $comments = $db->query('SELECT comments.id AS id, comments.comment AS comment, comments.comments_date AS comment_date, users_login.pseudo AS pseudo
        FROM comments
        INNER JOIN users_login
        ON comments.id_user = users_login.id
        WHERE signaled_comments = 1
        ORDER BY comments_date DESC');
        
        return $comments;
    }

}