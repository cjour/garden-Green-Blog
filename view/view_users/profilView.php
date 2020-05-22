<?php
$title = "My profil";
ob_start();
?>
<section class="container-fluid">
    <div class="d-flex col-12">

    <?php while($info = $profilInfo->fetch()): ?>

        <div class="d-flex flex-column">
            <img class="img-fluid rounded" src="<?= ($info['img']);?>" />
            <form action="index.php?action=updateProfil" method="POST" enctype="multipart/form-data">
                <input type="file" class="col-lg-6 md-6 sm-12" name="Avatar" id="avatarPicture"><br><br>
                <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                <button type="submit" name="submit" class="btn btn-success">Utiliser cette image</button>
            </form><br><br>
        </div>

    <?php endwhile ?>

    </div>
</section>

<?php
$content = ob_get_clean();
require 'template.php';
?>