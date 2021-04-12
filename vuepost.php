<?php
    require 'classe/ArticleManager.php';
    require 'classe/CommentaireManager.php';
    require 'config/bdd.php';
    session_start();
    $id =  $_GET['id'];
    $articleManager = new ArticleManager($bdd);
    $myArticle = $articleManager->get($id); 
    
    $commentaireManager = new CommentaireManager($bdd);

?>
<?php
    $commentaires = $commentaireManager->getByArticle($id);
?>


<?php include('menu.php');?>

<div class="col-6">
        <div class='vue_article'>
            <img src="<?php echo  $myArticle->image_a(); ?>">
            <h2><?php echo $myArticle->titre(); ?></h2>
            <p><?php echo $myArticle->contenu_a(); ?></p>
            <hr>
        </div>


        <h2>Commentaires</h2>
    <div class="com_input">
        <form action="" method="post">
            <label for="">pseudo</label>
            <input type="text" name="com_p"> </input> 
            <label for="">commentaire</label>
            <input type="text" name="contenu_c"> </input> 
            <input type="hidden" name="id_article" value="<?php echo $myArticle->id_article();   ?>">
            <button type="submit" name="submit">Envoyer</button>
        </form>

        <?php
            if(isset($_POST['submit'])){
                $post = [
                    'id_article' => $_POST[ 'id_article' ],
                    'com_p' => $_POST['com_p'],
                    'contenu_c' => $_POST['contenu_c'],
                ];
                $commentaire = new commentaire();
                $commentaire->hydrate($post);
                $commentaireManager->add($commentaire);
                //    echo'<pre>';
                //     print_r($commentaire);
                //     echo'</pre>';
                $commentaires = $commentaireManager->getByArticle($id);
            }
        ?>
    </div>


        <div>
            <?php
                foreach ($commentaires as $value){

                    echo'<div class="card_com" style="width: 70%;" >
                            <div class="com_tt">
                                <img src="img/avatar.png" alt="">
                                <h4>'.$value->com_p(). ' - ' .$value->date_pub().'</h4>
                            </div>
                            <p>'.$value->contenu_c().'</p>
                            <hr>
                        </div>';
                }
            ?>
        </div>




