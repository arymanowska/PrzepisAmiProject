<?php
    session_start();
    ?>
    
    <!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="zaloguj.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body>

   
<?php
include 'menu.php'
?>

  
    <?php

    $_SESSION['zalogowano'] = false;
    
    $_SESSION['user'] = "";

    $_SESSION['upr'] = "";
    
    echo "zostałeś wylogowany";
    
    
    // echo"
    // <script>
    // setTimeout()( => {
    //    location.href = './index.php';
    // }, 2000');
    // </script>
    // ";

    if (!$_SESSION["zalogowano"] == true){
        header('Location: index.php');
        exit;
    }
    ?>

    
</body>

</html>