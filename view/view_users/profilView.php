<?php
$title = "My profil";
ob_start();
?>
<section class="container-fluid">
    <div class="d-flex col-12">

    <?php while($info = $profilInfo->fetch()) { ?>
        <div class="d-flex flex-column col-lg-6 md-6 sm-6 p-4 mb-4">
            <img class="img-responsive " src="<?= ($info['img']);?>" />
            <form action="index.php?action=updateProfil" method="POST" enctype="multipart/form-data">
                <input type="file" class="col-lg-6 md-6 sm-12" name="Avatar" id="avatarPicture"><br><br>
                <input type="hidden" name="MAX_FILE_SIZE" value="100000">
                <button class="btn btn-info"><input type="submit" name="submit" value="Utiliser cette image"></button>
            </form><br><br>
        </div>
        <div class="col-lg-6 md-6 sm-6 p-4 mb-4">
            <label for="pseudo">Pseudo :</label>
            <input type="text" name="pseudo" value="<?= $info['pseudo'] ?>"><br><br>
            <label for="email">Email :</label>
            <input type="text" name="email" value="<?= $info['email'] ?>">
        </div>
    <?php } ?>

    </div>
</section>
<?php

$content = ob_get_clean();
require 'template.php';
?>