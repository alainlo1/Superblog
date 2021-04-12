<?php
    require 'classe/ArticleManager.php';
    require 'config/bdd.php';
    session_start();
    $articleManager = new ArticleManager($bdd);
?>
<?php include('menu.php');?>
<?php
    $articles = $articleManager->getAll();
?>


<div class="col_6">

        <div>
            <?php
                foreach ($articles as $value){

                    echo'<div class="article" >

                            <h2><a href="vuepost.php?id='. $value->id_article() .'" >'.$value->titre().'</a></h2>
                            <p><a href="modif.php?id='.$value->id_article().'">Modifier<a/></p>
                            <p><a href="suppr.php?id='.$value->id_article().'">Supprimer<a/></p>
                            <hr>
                        </div>';
                }
            ?>
        </div>




</div>