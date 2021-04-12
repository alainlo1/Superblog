<?php
    require 'classe/ArticleManager.php';
    require 'config/bdd.php';
    session_start();
    $articleManager = new ArticleManager($bdd);
?>

<?php include('menu.php');?>
<h1>Ajouter Article</h1>
    <div class="">
        <form action="" method="post">
            <label for="">Titre</label>
            <input type="text" name="titre"> </input> 
            <label for="">Contenu</label>
            <input type="text" name="contenu_a"> </input> 
            <label for="">Lien image</label>
            <input type="text" name="image_a"> </input> 
            <button type="submit" name="submit">Envoyer</button>
        </form>

        <?php
            if(isset($_POST['submit'])){
                    $post = [
                        'titre' => $_POST['titre'],
                        'contenu_a' => $_POST['contenu_a'],
                        'image_a' => $_POST['image_a'],
                    ];
                    $article = new Article();
                    $article->hydrate($post);
                    $articleManager->add($article);
                 header("Location:index.php");
                }
 

        ?>
    </div>
