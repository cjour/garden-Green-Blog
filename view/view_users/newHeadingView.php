<?php ob_start(); ?>
<section class="d-flex justify-content-center">
    <form action="index.php?action=addHeading" method="post">
        <input type="text" class="input-rounded" name="newHeading" id="" required>
        <input type="submit" class="btn-rounded" value="Ajouter">
    </form>
</section>
<section class="fluid-container d-flex flex-column align-items-center">
    <p>Vos rubriques actuelles: </p>
    <div class="d-flex flex-column ">
<?php while($headingRow = $heading->fetch()){ ?>
    
    <div class="col-12 d-flex justify-content-center encart_heading mb-2">
        <?= $headingRow['heading_theme'] ?>
    </div>
        
<?php } ?>
    </div>
</section>

<?php $content = ob_get_clean();
require 'template.php';?>