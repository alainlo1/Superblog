<?php
    require 'classe/UserManager.php';
    require 'config/bdd.php';
    session_start();
    $userManager = new UserManager($bdd);
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
    <h1>S'enseristrer</h1>
        <a href="index.php">Acceuil</a>

    <div class="col-6">
        <form action="" method="post">
            <label for="">pseudo</label>
            <input type="text" name="pseudo"> </input> 
            <label for="">mail</label>
            <input type="text" name="mail"> </input> 
            <label for="">mdp</label>
            <input type="password" name="password"> </input>
            <label for="">REtape mdp</label>
            <input type="password" name="verifPassword"> </input>
            <button type="submit" name="submit">Envoyer</button>
        </form>

        <?php
            if(isset($_POST['submit'])){
                if($_POST['password'] == $_POST['verifPassword']){
                    $post = [
                        'pseudo' => $_POST['pseudo'],
                        'mail' => $_POST['mail'],
                        'password' => $_POST['password']
                    ];
                    $user = new User();
                    $user->hydrate($post);
                    $userManager->add($user);
                    $_SESSION['pseudo'] = $user->pseudo();
                 header("Location:../index.php");
                }else{
                    echo 'lEs password ne coigiug';
                }
            }

        ?>

    </div>




    
</body>
</html>