<?php
$title = "Administration des commentaires";
ob_start();
?>      
    <section class="row d-flex flex-column align-items-center">
    <?php
    while ($comment = $comments->fetch())
    {
    ?>
        <div class="comment_encart col-lg-6 md-6 sm-6 p-4 mb-4">
            <p><strong><?= ($comment['pseudo']) ?></strong> le <?= $comment['comment_date'] ?></p>
            <p><?= nl2br(($comment['comment'])) ?></p>
            <a class="Btn_link" href="index.php?action=deleteComment&amp;id=<?=$comment['id']?>"><button class="btn btn-info">Supprimer le commentaire</button></a>
            <a class="Btn_link" href="index.php?action=unsignalComment&amp;id=<?=$comment['id']?>"><button class="btn btn-info">Enlever le signalement</button></a>
        </div>  
    </section>
    <?php
    }
    $comments -> closeCursor();

$content = ob_get_clean();
require ('template.php');
?>