<?php ob_start();
$title = "Billet simple pour l'Alaska.";
if (isset($_SESSION['statut'])){
    if(!empty($_SESSION['statut'])){
        if($_SESSION['statut'] === 1){ ?>   
        <section class="container-fluid mt-15">
            <div class="row justify-content-around d-flex">
                
                <div id="weather_info_encart" class="encart col-lg-3 col-md-4 col-sm-12">
                    <label for="city-select">Où habitez-vous ?</label>
                    <select name="city" id="city-select">
                        <option value="">--Sélectionnez une ville--</option>
                        <option value="Paris">Paris</option>
                        <option value="Londres">Londres</option>
                        <option value="Washington DC">Washington DC</option>
                    </select>
                    <div>
                        <img src="" alt="" id="weather_icon">
                        <h2 id="city_name"></h2> 
                    </div>
                    <p id="weather_description"></p>
                    <div>
                        <p id="weather_temperature_min"></p>
                        <p id="weather_temperature_max"></p>
                    </div>
                </div>

                <nav>
                    <ul>
                        <?php while($heading = $headings->fetch()){?>
                            <li><a href="index.php?action=getPostsWithDefinedHeading&amp;rubrique=<?=$heading['id']?>"><button><?= $heading['heading_theme'] ?></button></a></li>
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
        

    <?php } else if ($_SESSION['statut'] === 2) { 
            ob_start();
            ?>
            <nav>
                <ul>
                    <?php while($heading = $headings->fetch()){?>
                        <li><a href="index.php?action=getPostsWithDefinedHeading&amp;rubrique=<?=$heading['id']?>"><button><?= $heading['heading_theme'] ?></button></a></li>
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
                            <a class="Btn_link" href="index.php?action=deleteAPost&amp;id=<?=$data['id']?>&amp;page=<?=1?>"><button id="delete_Btn" class="btn btn-info mb-2"><i class="fas fa-trash mr-2"></i>Supprimer le billet</button></a>                      
                        </p>
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
        <div class="row d-flex flex-column">
        <nav>
            <ul>
                <?php while($heading = $headings->fetch()){?>
                    <li><a href="index.php?action=getPostsWithDefinedHeading&amp;rubrique=<?=$heading['id']?>"><button><?= $heading['heading_theme'] ?></button></a></li>
                <?php } ?>
            </ul>
        </nav>
            <div class="d-flex justify-content-center">
                <p> Bienvenue sur Garden'Green, un site dédié à la pousse et la cuisine de vos légumes.</p>
            </div>    
        <div class="d-flex">
                <?php while ($data = $posts->fetch()) {?>

            <div class="encart col-lg-3 col-md-6 col-sm-12">
                <h2>
                    <?= ($data['title']) ?><br>
                    <em><i class="fas fa-calendar-alt mr-2"></i><?= "le " . $data['publication_date'] ?></em>
                </h2><br>
                <p>
                    <?= nl2br(substr($data['content'], 0, 300)) . "..." ?>
                    <br><br>
                    <a class="Btn_link" href="index.php?action=getAPost&amp;id=<?=$data['id']?>&amp;page=<?=1?>"><button class="btn btn-info"><i class="fas fa-eye mr-2"></i>Lire la suite</button></a>
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