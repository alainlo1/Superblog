<?php
    require 'classe/UserManager.php';
    require 'classe/ArticleManager.php';
    require 'config/bdd.php';
    session_start();
    $id =  $_GET['id'];
    $articleManager = new ArticleManager($bdd);
    $myArticle = $articleManager->get($id);
    

    // print_r($myUser);
    $articleManager->delete($myArticle);
    header('Location:index.php');
?>
