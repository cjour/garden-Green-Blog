
<?php
$title = ($post['title']);
ob_start();
?>

<section class="container-fluid">
    <div class="row d-flex flex-column align-items-center">
        <div class="news col-lg-6 md-6 sm-6 p-4 mb-4">
            <h2>
                <?= ($post['title']) ?><br>
                <em><i class="fas fa-calendar-alt mr-2"></i><?= "le " . $post['publication_date'] ?></em>
            </h2><br>

            <p>
                <?= nl2br(($post['content'])) ?>
            </p>
        </div>
    </div>
    <div class="row d-flex flex-column align-items-center">
        <?php
        if (isset($_SESSION['statut'])):
            if($_SESSION['statut'] == 1):
        ?>

        <div class="comment_encart col-lg-6 md-6 sm-6 p-4 mb-4">
            <h3><i class="fas fa-comment mr-4"></i>Commentaires</h3>
            <form action="index.php?action=addComment&amp;id=<?=$post['id']?>" method = "post">
                <textarea class="col-12" name="commentaire" id="text_area_commentaire" rows="1"></textarea><br><br>
                <button  type="submit" class="btn btn-success">Publier</button>       
            </form>
        </div>

        <?php
            endif;
        endif;
        while ($comment = $commentaires->fetch()):
        ?>

        <div class="comment_encart col-lg-6 md-6 sm-6 p-4 mb-4">
            <div class="d-flex justify-content-between">
                <div class="d-flex flex-column mb-4">
                    <strong><span class="mb-2"><?=($comment['pseudo'])?></span></strong>

                    <?php if(isset($comment['img'])):?>

                    <img src="<?= $comment['img']?>" alt="user_pic" class="thumbnailPic">

                    <?php else: ?>

                    <i class="fas fa-user mr-2"></i>

                    <?php endif; ?>   
                    
                </div>
                <?= $comment['comment_date']?>
                    </div>
            <p><?= nl2br(($comment['comment'])) ?></p>
            <?php if($comment['signaled_comments'] == 1):?>

                <span class="badge badge-pill badge-danger">commentaire signalé</span>

            <?php endif; ?>

    <?php   if (isset($_SESSION['statut'])): ?>

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

                            <?php if($_SESSION['statut'] == 1): ?>
                            
                            Voulez vous signaler ce commentaire ?
                            
                            <?php elseif ($_SESSION['statut'] == 2): ?>

                            Voulez vous supprimer ce commentaire ?

                            <?php endif; ?>

                        </div>
                        <div class="modal-footer">
                        <?php if($_SESSION['statut'] == 1): ?>

                            <a class="Btn_link" href="index.php?action=signalComment&amp;id=<?=$comment['id']?>&amp;idpost=<?=$post['id']?>"><button type="button" class="btn btn-primary">Confirmer</button></a>
                        
                        <?php elseif ($_SESSION['statut'] == 2): ?>
                        
                            <a class="Btn_link" href="index.php?action=deleteComment&amp;idComment=<?=$comment['id']?>&amp;idPost=<?=$post['id']?>"><button class="btn btn-success">Confirmer</button></a>
                        
                        <?php endif; ?>
                        
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>

                        </div>
                    </div>
                </div>
            </div>
            <?php 
                if($_SESSION['statut'] == 1): 
                    if($comment['signaled_comments'] == 0):
            ?>

                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#signaledBackdrop<?=$comment['id']?>">Signaler le commentaire</button>          

            <?php 
                    endif;
                elseif ($_SESSION['statut'] == 2): ?>

            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#signaledBackdrop<?=$comment['id']?>">Supprimer le commentaire</button>


<?php           
                endif;
            endif; 
            ?>
        </div>
                <?php endwhile; ?>
        <nav>
            <ul class="pagination">
            <?php for($i=1;$i<=ceil($totalNumberOfComments/$commentManager->_limit);$i++):?>
            
                
                    <?php if($i == $commentManager->_currentPage): ?>
                    <li class="page-item"><a class="page-link" href=""><?= $i?></a></li>
                    <?php else: ?>
                    <li class="page-item"><a class="page-link" href="index.php?action=getAPost&id=<?=$_GET['id']?>&page=<?=$i?>"><?=$i?></a></li>
                
                    <?php endif;
                    endfor ?>
            </ul>
        </nav>
    </div>
</section>        
<?php
$content = ob_get_clean();
require 'template.php';
?>