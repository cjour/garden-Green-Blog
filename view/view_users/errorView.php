<?php $title = "Page d'erreur" ?>
<?php ob_start();?>
        <h1>Oups une erreur s'est produite.</h1>
        <p><?= $errorMessage ?></p>
<?php $content = ob_get_clean();
require 'template.php';
?>