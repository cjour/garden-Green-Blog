<?php ob_start(); ?>
<section class="d-flex justify-content-center">
    <form action="index.php?action=addHeading" method="post">
        <input type="text" name="newHeading" id="">
        <input type="submit">
    </form>
</section>
<section class="fluid-container">
    <div class="row">
<?php while($headingRow = $heading->fetch()){ ?>
    
    <div class="col-lg-3 md-4 sm-6 d-flex justify-content-around">
        <?= $headingRow['heading_theme'] ?>
    </div>
        
<?php } ?>
</div>
</section>

<?php $content = ob_get_clean();
require 'template.php';?>