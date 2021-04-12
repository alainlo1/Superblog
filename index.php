<?php
    session_start();
    require 'config/bdd.php';
    require 'classe/ArticleManager.php';
    $articleManager = new ArticleManager($bdd); 
?>

<?php
    $articles = $articleManager->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include('menu.php');?>
    <div>
        <h1>Derniers articles</h1>

        <div>
            <?php
                foreach ($articles as $value){

                    echo'<div class="card_art">
                            <div class="article" >
                                <h2><a href="vuepost.php?id='. $value->id_article() .'" >'.$value->titre().'</a></h2>
                                <img src='.$value->image_a().' >
                            </div>
                        </div>';
                }
            ?>
        </div>
    </div>
    



    
    
</body>
</html>