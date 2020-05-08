<?php

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/ConnectionManager.php');
require_once('model/ProfilManager.php');


function signMeIn(){

    require ('view/view_users/sign_in.php');

}

function signIn($Pseudo, $Email, $Password, $PasswordConfirm){

    $signInManager = new ConnectionManager();
    $signInManager->SignMeIn($Pseudo, $Email, $Password, $PasswordConfirm);
    require('view/view_users/login.php');

}

function verifyPseudoAvailability($Pseudo){

    $signInManager = new ConnectionManager();
    $PseudoAvailability = $signInManager->verifyPseudoAvailability($Pseudo);
    return $PseudoAvailability;
    
}

function logMeIn(){

    require ('view/view_users/login.php');
}

function verifyMyPassword($Pseudo, $Password){

    $connectionManager = new ConnectionManager();
    return $connectionManager->LogIn($Pseudo, $Password);
}

function logIn($Pseudo, $Password){

    $connectionManager = new ConnectionManager();
    $_SESSION['pseudo'] = $Pseudo;
    $_SESSION['statut'] = $connectionManager->verifyMyStatut($Pseudo);
    $_SESSION['id'] = $connectionManager->getMyAuthorId($Pseudo);
    $postManager = new PostManager();
    $posts = $postManager->getPosts();
    $headings = $postManager->getExistingHeading();

    require ('view/view_users/indexView.php');
}

function listMyPostsFiltered($rubrique){

    $postManager = new PostManager();
    $headings = $postManager->getExistingHeading();
    $posts = $postManager->getPostsWithHeading($rubrique);

    require('view/view_users/indexView.php');
}

function listMyPosts(){

    $postManager = new PostManager();
    $posts = $postManager->getPosts();
    $headings = $postManager->getExistingHeading();

    require('view/view_users/indexView.php');
}

function logout(){

    session_destroy();
    header('Location:index.php?action=listMyPosts');

}

function getAPost(){

    $postManager = new PostManager();
    $commentManager = new CommentManager($_GET['id']);
    $post = $postManager->getPost($_GET['id']);
    $commentaires = $commentManager->getComments($_GET['id']);
    $totalNumberOfComments = $commentManager->getTotalComments($_GET['id']);

    
    require('view/view_users/postView.php');
}

function addAComment($postId, $id_auteur, $commentaire){

    $commentManager = new CommentManager();
    $affectedLines = $commentManager->postAComment($postId, $id_auteur, htmlspecialchars($commentaire));

    if ($affectedLines === false){
        throw new Exception ("impossible d'ajouter votre commentaire");      
        
    } else {

        header('Location:index.php?action=getAPost&id='. $postId . '&page=1');
    }
}

function write(){

    require('view\view_users\backend_interface_posts_management.php');
}

function publish($article, $title, $headingString){

    $postManager = new PostManager();
    $idHeading = $postManager->getIdHeading($headingString);
    $postManager->publishPost($article, $title, $idHeading);
    $posts = $postManager->getPosts();
    require('view/view_users/indexView.php');
}

function read($postId){

    $postManager = new PostManager();
    $posts = $postManager->getPosts($_GET['id']);
    require('view\view_users\indexView.php');

}

function update($postId){

    $postManager = new PostManager();
    $post = $postManager->getPost($postId);
    $heading = $postManager->getSpecificHeading($postId);
    require('view\view_users\backend_interface_posts_management.php');
}

function updatePost($article, $title, $postId, $headingString){

    $postManager = new PostManager();
    $post = $postManager->getPost($postId);
    $idHeading = $postManager->getIdHeading($headingString);
    $postManager->updatePost($article, $title, $postId, $idHeading);
    require('view\view_users\backend_interface_posts_management.php');
}

function delete($postId){

    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $posts = $postManager->deletePost($_GET['id']);
    $posts = $postManager->getPosts();
    require('view/view_users/indexView.php');
}

function deleteComment($commentId, $postId){

    $commentManager = new CommentManager();
    $postManager = new PostManager();
    $comment = $commentManager->deleteComment($commentId, $postId);
    header('Location:index.php?action=getAPost&id='. $postId .'&page=1');
}

function moderateComments(){

    $commentManager = new CommentManager();
    $comments = $commentManager->getSignaledComments();
    require('view/view_users/commentManagementView.php');
}

function signalComment($commentId, $postId){

    $commentManager = new CommentManager();
    $commentManager->signalAComment($commentId);
    header('Location:index.php?action=getAPost&id='. $postId . '&page=1');
}

function unsignalComment($commentId){

    $commentManager = new CommentManager();
    $commentManager->unsignalComment($commentId);
    header('Location:index.php?action=moderateComments');
}

function getUserProfil($pseudo){

    $profilManager = new ProfilManager();
    $profilInfo = $profilManager->getMyProfil($pseudo);
    require ('view/view_users/profilView.php');
}

function updateProfil($img, $pseudo){

    $ProfilManager = new ProfilManager();
    $ProfilManager = $ProfilManager->updateProfilPic($img, $pseudo);
    header('Location:index.php?action=getProfil');

}

function addHeading ($newHeading){
    $PostManager = new PostManager();
    $PostManager = $PostManager->addHeading($newHeading);
    header('Location:index.php?action=addHeadingView');

}

function addHeadingView(){
    
    $PostManager = new PostManager();
    $heading = $PostManager->getExistingHeading();
    require ('view/view_users/newHeadingView.php');

}

