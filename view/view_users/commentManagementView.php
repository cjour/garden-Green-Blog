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
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#signaledBackdrop<?=$comment['id']?>">Supprimer le commentaire</button>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#signaledBackdropS<?=$comment['id']?>">Enlever le signalement</button>
        </div>

        <div class="modal fade" id="signaledBackdrop<?=$comment['id']?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Voulez vous supprimer ce commentaire ?
                    </div>
                    <div class="modal-footer">
                    <a class="Btn_link" href="index.php?action=deleteCommentFromDashboard&amp;id=<?=$comment['id']?>"><button class="btn btn-info">Confirmer</button></a>
                    
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>

                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="signaledBackdropS<?=$comment['id']?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel"></h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Voulez vous enlever le signalement de ce commentaire ?
                    </div>
                    <div class="modal-footer">
                    <a class="Btn_link" href="index.php?action=unsignalComment&amp;id=<?=$comment['id']?>"><button class="btn btn-info">Confirmer</button></a>
                    
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
    }
    $comments -> closeCursor();

$content = ob_get_clean();
require ('template.php');
?>