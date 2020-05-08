<?php
if (isset($_SESSION['statut'])){
    if(!empty($_SESSION['statut'])){
        if($_SESSION['statut'] === 1){
        ob_start();
?>            
            <a class="navbar-brand" href="index.php?action=listMyPosts">Bienvenue <?= $_SESSION['pseudo'] ?> </a>               

            <?php $header_h1 = ob_get_clean(); ?>

            <a href="index.php?action=getProfil"><button type="button" class="btn btn-info mr-4">Profil</button></a>
            <a href="index.php?action=logout"><button type="button" class="btn btn-info mr-4">Logout</button></a>
            <?php $header_btn = ob_get_clean(); ?>

<?php } else if ($_SESSION['statut'] === 2) {
        ob_start();
    
    ?>

            <a class="navbar-brand" href="index.php?action=listMyPosts">Dashboard <?= $_SESSION['pseudo'] ?> </a>               
            <?php $header_h1 = ob_get_clean(); ?>

            <a  href="index.php?action=addHeadingView"><button type="button" class="btn btn-info mr-4 mb-2"><i class="fas fa-plus mr-2"></i>Nouvelle rubrique</button></a>    
            <a  href="index.php?action=writeAPost"><button type="button" class="btn btn-info mr-4 mb-2"><i class="fas fa-plus mr-2"></i>Nouvel article</button></a>
            <a  href="index.php?action=moderateComments"><button type="button" class="btn btn-info mr-4 mb-2"><i class="fas fa-comment mr-2"></i>Modérer les commentaires</button></a>
            <a  href="index.php?action=logout"><button type="button" class="btn btn-info mr-4 mb-2">Logout</button></a>

<?php
            $header_btn = ob_get_clean();
        }
    }
} else { 
ob_start();
?>
        
        <a class="navbar-brand" href="index.php?action=listMyPosts"><img src="pics/logo.png" alt="logoGardenGreen"></a>
            <?php $header_h1 = ob_get_clean();?>
                    
            <a class="Btn_link" href="index.php?action=signMeIn"><button class="btn btn-green Btn_link">Sign in</button></a>
            <a class="Btn_link" href="index.php?action=logMeIn"><button class="btn btn-green Btn_link">Log in</button></a>
        
            <?php $header_btn = ob_get_clean();
        
}?>