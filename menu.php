<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
     <script src="https://use.fontawesome.com/releases/v5.15.2/js/all.js" data-auto-replace-svg="nest"></script>
     <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
    <title>Document</title>
</head>
<body>
                                                   <!-- ▄︻デ═══一 -->
    <nav>
        <ul>
            <li><a class="logo" href="index.php"><h1>Superforum</h1></a></li>
            <li>   
                <?php
                    if(!isset($_SESSION['pseudo'])){
                        echo '
                            <a href="login.php">se co</a>
                            ';
                    }else{
                        echo ' <div classe="adminbar">
                                    <a href="ajoute.php">Ajouter Article</a>
                                    <a href="liste.php">Modifier Article</a>
                                    <a href="deconnexion.php">Déco</a>
                                </div>';
                         echo   '<strong>Bienvenue '.$_SESSION['pseudo'].'</strong>';           
                    }                    

                    // <a href="./pages/register.php">se register</a> 
                ?>
            </li>
        </ul>
    </nav>
</body>
</html>
