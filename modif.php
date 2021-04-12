<?php
    require 'classe/ArticleManager.php';
    require 'config/bdd.php';
    session_start();
    $id = $_GET['id'];
    $articleManager = new ArticleManager($bdd);
    $myArticle = $articleManager->get($id);
?>


<div class="col-6">
<a href="index.php">Acceuil</a>
<h1>Modifier</h1>
        <form action="" method="post">
            <input type="hidden" value="<?php echo $myArticle->id_article(); ?>">
            <label for="">Titre</label>
            <input id="titre" name="titre" type="text" value="<?php echo $myArticle->titre(); ?>" > 
            <label for="">contenu</label>
            <input id="contenu_a" name="contenu_a" type="text" value="<?php echo $myArticle->contenu_a(); ?>" > 
            <label for="">Lien</label>
            <input id="image_a" name="image_a" type="text" value="<?php echo $myArticle->image_a(); ?>" > 
            <button type="submit" name="submit">wewewe</button>
        </form>
        
        <?php
            if(isset($_POST['submit'])){
                if(empty($_POST['password']) || ($_POST['password'] == $_POST['verifPassword'])){
                    print_r($myArticle);
                    $myArticle->setPassword($_POST['password']);
                    $myArticle->setPseudo($_POST['titre']);
                    $myArticle->setMail($_POST['contenu_a']);
                    $myArticle->setMail($_POST['image_a']);
                    $userManager->update($myArticle);
                     header('Location: index.php');
                }else{
                    echo 'les mots de passe ne coreojoj ';
                }
            }
        ?>


    </div>


