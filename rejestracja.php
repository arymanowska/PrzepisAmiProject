<?php
    session_start();
    ?>
    
    <!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="rejestracja.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body id="body"> 
<div id="panel">
<h2>Załóż darmowe konto już teraz!</h2>
<?php
include 'menu.php'
?>

<form action="" method="post">
    <input type="text" name="login" id="input" placeholder="login">
    <input type="password" name="password" id="input" placeholder="hasło">
    <input type="submit" value="zarejestruj" id="button">
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
    
    $sql="INSERT INTO `users`(`login`, `pass`, `upr`) VALUES ('$login','$szyfrowanie','user')";
    
    
    $query = mysqli_query($conn,$sql);

    if(!$conn){

    }

    if ($query) {
        echo "dodano";
        header('Location: login.php');
      } else {
        mysqli_error($conn);
      }

      mysqli_close($conn);
}


?>
    <h2>Lub zaloguj się</h2>
    <input type="button" onclick="location.href='login.php';" value="zaloguj się" id="button"/>
    </div>
</body>

</html>