<?php
if (isset($_SESSION['statut'])):
    if(!empty($_SESSION['statut'])):
        if($_SESSION['statut'] === 1):
        ob_start();
?>            
            <a class="navbar-brand" href="index.php?action=listMyPosts">Bienvenue <?= $_SESSION['pseudo'] ?> </a>               

            <?php $header_h1 = ob_get_clean(); ?>

            <li class="nav-item">
                <a href="index.php?action=getProfil"><button type="button" class="btn btn-success mr-4 mb-2">Profil</button></a>
            </li>
            <li class="nav-item">
                <a href="index.php?action=logout"><button type="button" class="btn btn-success mr-4 mb-2">Logout</button></a>
            </li>

            <?php $header_btn = ob_get_clean(); ?>

<?php   
        elseif ($_SESSION['statut'] === 2):
        ob_start();
?>

            <a class="navbar-brand" href="index.php?action=listMyPosts">Dashboard <?= $_SESSION['pseudo'] ?> </a>               
            <?php $header_h1 = ob_get_clean(); ?>

            <li class="nav-item"><a  href="index.php?action=addHeadingView"><button type="button" class="btn btn-success mr-4 mb-2"><i class="fas fa-plus mr-2"></i>Nouvelle rubrique</button></a></li>
            <li class="nav-item"><a  href="index.php?action=writeAPost"><button type="button" class="btn btn-success mr-4 mb-2"><i class="fas fa-plus mr-2"></i>Nouvel article</button></a></li>
            <li class="nav-item"><a  href="index.php?action=moderateComments&amp;page=<?=1?>"><button type="button" class="btn btn-success mr-4 mb-2"><i class="fas fa-comment mr-2"></i>Modérer les commentaires</button></a></li>
            <li class="nav-item"><a  href="index.php?action=logout"><button type="button" class="btn btn-success mr-4 mb-2">Logout</button></a></li>

<?php
            $header_btn = ob_get_clean();
        endif;
    endif;
else:
ob_start();
?>
        
        <a class="navbar-brand" href="index.php?action=listMyPosts"><img id="logo" src="pics/logo.png" alt="logoGardenGreen"></a>
            <?php $header_h1 = ob_get_clean();?>
                    
            <li class="nav-item"><a class="Btn_link" href="index.php?action=signMeIn"><button class="btn btn-success Btn_link mr-2 mb-2">Sign in</button></a></li>
            <li class="nav-item"><a class="Btn_link" href="index.php?action=logMeIn"><button class="btn btn-success Btn_link mr-2 mb-2">Log in</button></a></li>
        
            <?php $header_btn = ob_get_clean();
        
endif;?>