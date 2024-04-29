<?php
    session_start();
    ?>
    
    <!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="login.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
</head>

<body id="body">
<div id="panel">
    <h2>Witamy, Zaloguj się!</h2>
    <?php
include 'menu.php'
?>

<form action="" method="post">
    <input type="text" name="login" id="input" placeholder="login">
    <input type="password" name="password" id="input" placeholder="hasło">
    <input type="submit" value="zaloguj" id="button">
</form>  

    <?php

if(isset($_POST["login"]) && isset($_POST["password"]) ){
    
    $login = $_POST["login"];
    $password = $_POST["password"];

    function szyfrowanieMD5($password){
        return md5($password);
    }

    $szyfrowanie = szyfrowanieMD5($password);

    $host = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $database = "wypiekami";

    $conn = mysqli_connect($host,$dbuser,$dbpass,$database);

     if(!$conn){
     echo mysqli_connect_error($conn);   
     }
    
    $sql="SELECT * FROM users WHERE login='$login' AND pass='$szyfrowanie'";

    $result = mysqli_query($conn, $sql);
    

    if(!$conn){

    }

    if(mysqli_num_rows($result) > 0) {
        //zalogowano 
        $_SESSION['zalogowano'] = true;

        $row = mysqli_fetch_assoc($result);

        $_SESSION['user'] = $row['login'];
        
        $_SESSION['upr'] = $row['upr'];
        if($_SESSION['upr'] == "user"){
            header('Location: ./przepisy.php');
        }else if($_SESSION['upr'] == "worker"){
            header('Location: ./workerpanel.php');
        }else if($_SESSION['upr'] == "admin"){
            header('Location: ./adminpanel.php');
        }
      } else {
        //niezalogowano
        $_SESSION['zalogowano'] = false;

        $_SESSION['user'] = "";

        $_SESSION['upr'] = "";

        echo "niezalogowano";
      }

      
}
    


?>


    
    <h2>Lub zarejestruj się</h2>
    <input type="button" onclick="location.href='rejestracja.php';" value="zarejestruj się" id="button"/>
    </div>


</body>

</html>