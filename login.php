<?php
    require 'classe/UserManager.php';
    require 'config/bdd.php';
    session_start();
    $userManager = new UserManager($bdd);
?>

<?php include('menu.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Shiiine</h1>
        <a href="index.php">Acceuil</a>

    <div class="col-6">
        <form action="login.php" method="post">
            <label for="">pseudo</label>
            <input type="text" name="pseudo"> </input> 
            <label for="">mdp</label>
            <input type="text" name="password"> </input>
            <button type="submit" name="submit">wewewe</button>
        </form>


        <?php
            if(isset($_POST['submit']) && isset($_POST['pseudo'])){
                $user = $userManager->login($_POST['pseudo']);
                if(!$user){
                    echo 'Mauvais Identifiant';
                }else{
                    if($user && $user->password() == $_POST['password']){
                        $_SESSION['pseudo'] = $user->pseudo();
                        header('Location:index.php');
                    }else {
                        echo 'Mauvais password';
                    }
                }
            }

        ?>
    </div>




    
</body>
</html>