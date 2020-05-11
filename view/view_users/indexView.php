<?php ob_start();
$title = "Garden'Green";
if (isset($_SESSION['statut'])){
    if(!empty($_SESSION['statut'])){
        if($_SESSION['statut'] === 1){ ?>   
        <section class="container-fluid mt-15">
            <div class="row justify-content-around d-flex">
                
                <div id="weather_info_encart" class="col-lg-3 col-md-4 col-sm-12 d-flex-column">
                    <label for="city-select">Où habitez-vous ?</label>
                    <select name="city" id="city-select">
                        <option value="">--Sélectionnez une ville--</option>
                        <option value="Paris">Paris</option>
                        <option value="Londres">Londres</option>
                        <option value="Washington DC">Washington DC</option>
                    </select>
                    <div class="d-flex-column">
                        <div class="d-flex">
                            
                            <h2 id="city_name"></h2>
                            <img src="" alt="" id="weather_icon">
                        </div>
                        <p id="weather_description"></p>
                        <p id="weather_temperature_max"></p>
                    </div>
                </div>

                <nav class="container-fluid">
                    <ul class="d-flex justify-content-center">
                        <?php while($heading = $headings->fetch()){?>
                            <li class="mr-2"><a href="index.php?action=getPostsWithDefinedHeading&amp;rubrique=<?=$heading['id']?>"><button class="btn btn-success mb-2"><?= $heading['heading_theme'] ?></button></a></li>
                        <?php } ?>
                    </ul>
                </nav>
            </div>
        </section>

        <section class="container-fluid mt-15 "> 
        <div class="row justify-content-around">
        <?php if($_GET['action'] == 'getPostsWithDefinedHeading') { 
            while ($dataFiltered = $posts->fetch()) { ?>
                <div class="encart col-lg-3 col-md-4 col-sm-12">
                <h2>
                    <?= ($dataFiltered['title']) ?><br>
                    <em><i class="fas fa-calendar-alt mr-2"></i><?= "le " . $dataFiltered['publication_date'] ?></em>
                </h2><br>
                <p>
                    <?= nl2br(substr($dataFiltered['content'], 0, 444)). "..."  ?>
                    <br><br>
                    
                    <a class="Btn_link" href="index.php?action=getAPost&amp;id=<?=$dataFiltered['id']?>&amp;page=<?=1?>"><button class="btn btn-info"><i class="fas fa-eye mr-2"></i>Lire la suite</button></a>
                </p>
            </div>

            <?php } ?>
            
        <?php } else { while ($data = $posts->fetch()) {?>


            <div class="encart col-lg-3 col-md-4 col-sm-12">
                <h2>
                    <?= ($data['title']) ?><br>
                    <em><i class="fas fa-calendar-alt mr-2"></i><?= "le " . $data['publication_date'] ?></em>
                </h2><br>
                <p>
                    <?= nl2br(substr($data['content'], 0, 444)). "..."  ?>
                    <br><br>
                    
                    <a class="Btn_link" href="index.php?action=getAPost&amp;id=<?=$data['id']?>&amp;page=<?=1?>"><button class="btn btn-info"><i class="fas fa-eye mr-2"></i>Lire la suite</button></a>
                </p>
            </div>
        

            <?php }
        }
            $posts->closeCursor();
            ?>
            </div>
            </section>
            
            <?php $content = ob_get_clean(); ?>
        

<?php 
        } else if ($_SESSION['statut'] === 2) { 
            ob_start();
            ?>
            <nav class="container-fluid">
                <ul class="d-flex justify-content-center">
                    <?php while($heading = $headings->fetch()){?>
                        <li class="mr-2"><a href="index.php?action=getPostsWithDefinedHeading&amp;rubrique=<?=$heading['id']?>"><button class="btn btn-success mb-2"><?= $heading['heading_theme'] ?></button></a></li>
                    <?php } ?>
                </ul>
            </nav>

             <section class="container-fluid mt-15"> 
            <div class="row justify-content-around">    
            <?php while ($data = $posts->fetch())
                {
            ?>
                <div class="encart col-lg-6 col-md-12 col-sm-12">
                    <h2>
                        <?= ($data['title']) ?><br>
                        <em><i class="fas fa-calendar-alt mr-2"></i><?= "le " . $data['publication_date'] ?></em>
                    </h2><br>

                    <p>
                        <?= nl2br(substr($data['content'], 0, 444)). "..."  ?>
                        <br><br>
                        <a id="btn_test" class="Btn_link" href="index.php?action=getAPost&amp;id=<?=$data['id']?>&amp;page=<?=1?>"><button class="btn btn-info mb-2"><i class="fas fa-eye mr-2"></i>Lire la suite</button></a>
                        <a class="Btn_link" href="index.php?action=update&amp;id=<?=$data['id']?>"><button class="btn btn-info mb-2"><i class="fas fa-pencil-alt mr-2"></i>Modifier le billet</button></a>
                        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#signaledBackdrop<?=$data['id']?>">Supprimer</button>          
                    
                    </p>
                </div>
                <div class="modal fade" id="signaledBackdrop<?=$data['id']?>" data-backdrop="static" tabindex="-1" role="dialog" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="staticBackdropLabel"></h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                Voulez vous supprimer cette publication ?
                            </div>
                            <div class="modal-footer">
                
                            <a class="Btn_link" href="index.php?action=deleteAPost&amp;id=<?=$data['id']?>&amp;page=<?=1?>"><button type="button" class="btn btn-primary">Confirmer</button></a>
                            
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>

                            </div>
                        </div>
                    </div>
                </div>
            <?php
            } 
            $posts->closeCursor();
            ?>
            </div>
            </section>
            
            <?php    
            $content = ob_get_clean(); 
        }
    }
} else {

    ob_start();
    $title = "Billet simple pour l'Alaska.";
    ?>
    <section class="container-fluid mt-15"> 
        <div class="row d-flex">
            <div class="d-flex container-fluid justify-content-center">
                <p id="welcome_message"> Bienvenue sur Garden'Green, un site dédié à la pousse et la cuisine de vos légumes.</p>
            </div>
            <nav class="container-fluid">
                <ul class="d-flex justify-content-center">
                    <?php while($heading = $headings->fetch()){?>
                        <li class="mr-2"><a href="index.php?action=getPostsWithDefinedHeading&amp;rubrique=<?=$heading['id']?>"><button class="btn btn-success mb-2"><?= $heading['heading_theme'] ?></button></a></li>
                    <?php } ?>
                </ul>
            </nav>
            
    
            
         
                
                <div class="row d-flex justify-content-around no-margin">
                    <?php while ($data = $posts->fetch()) {?>
            
                    <div class="encart col-lg-4 col-md-6 col-sm-12">
                        <h2>
                            <?= ($data['title']) ?><br>
                            <em><i class="fas fa-calendar-alt mr-2"></i><?= "le " . $data['publication_date'] ?></em>
                        </h2><br>
                        <p>
                            <?= nl2br(substr($data['content'], 0, 300)) . "..." ?>
                            <br><br>
                            <a class="Btn_link" href="index.php?action=getAPost&amp;id=<?=$data['id']?>&amp;page=<?=1?>"><button class="btn btn-success mb-2"><i class="fas fa-eye mr-2"></i>Lire la suite</button></a>
                        </p>
                    </div>
            <?php }
            $posts->closeCursor();
            ?>
                
            </div>
            
        </div>
    </section>
    <?php $content = ob_get_clean();
}
require 'template.php';
?>