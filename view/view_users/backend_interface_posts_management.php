<?php
$title = "Ecriture de billets";
ob_start();
?>
<section class="container-fluid">
    <form

<?php   if($_GET['action'] == 'update' ):?>
            action="index.php?action=updatePost&amp;id=<?=$_GET['id']?>"
<?php   elseif ($_GET['action'] == 'writeAPost'):?>
            action="index.php?action=publishAPost"       
<?php   endif; ?>

    method="post">
        <select class="input-rounded" name="Heading" id="title">
        <?php while ($list = $headings->fetch()):?>
            <option value="<?= $list['heading_theme'] ?>"><?= $list['heading_theme'] ?></option>
        <?php endwhile;?> 
        </select>
        <label for="title" class="btn-rounded">Rubrique de votre billet.</label><br><br>
        <input class="col-6 input-rounded" name="Title" type="text" id="myTitleTextarea" value="<?php if($_GET['action'] == 'update' ):echo $post['title'];endif;?>" required>
        <label for="title" class="btn-rounded ">Votre titre.</label><br><br>
        <textarea class="col-12 p-4" name="Article" id="myContentTextarea"><?php if($_GET['action'] == 'update' ):echo $post['content'];endif;?></textarea><br><br>
        <button type="submit" class="btn btn-success">Publier</button>
    </form>
</section>

<?php
$content = ob_get_clean();
require 'template.php';
?>    