<?php
$title = "Ecriture de billets";
ob_start();
?>
<section class="container-fluid">
    <form <?php 
        if($_GET['action'] == 'update' ){?>
            action="index.php?action=updatePost&amp;id=<?=$_GET['id']?>" method="post">
<?php   } elseif ($_GET['action'] == 'writeAPost') {?>
            action="index.php?action=publishAPost" method="post">      
<?php   } ?>
        <label for="title" class="">Rubrique de votre billet.</label>
        <input class="col-lg-6 md-6 sm-12" name="Heading" type="text" id="myHeadingTextarea" value="<?php if($_GET['action'] == 'update' ){echo $heading['heading_theme'];}?>" required><br><br>
        <label for="title" class="">Votre titre.</label>
        <input class="col-lg-6 md-6 sm-12" name="Title" type="text" id="myTitleTextarea" value="<?php if($_GET['action'] == 'update' ){echo $post['title'];}?>" required><br><br>
        <label for="title">Votre contenu.</label><br><br>
        <textarea class="col-12 p-4" name="Article" id="myContentTextarea"><?php if($_GET['action'] == 'update' ){echo $post['content'];}?></textarea><br><br>
        <button type="submit" class="btn btn-info">Publier</button>
    </form>

    
</section>
<?php
$content = ob_get_clean();
require 'template.php';
?>    