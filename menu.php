<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="menu.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    
    <ul>
        <li hidden = true> <a href='/przepisAmi/'></a> </li>
        <li hidden = true> <a href='/przepisAmi/strona.php'> Strona Główna </a> </li>
        <?php
// if($_SESSION['upr'] == 'admin'){
    //     echo "<li> <a href='/przepisAmi/admin.php'> Admin </a> </li>";
    // }
    ?>

<?php
if(!$_SESSION['zalogowano']){
    echo "<li hidden = true> <a href='/przepisAmi/login.php'> Logowanie </a> </li>";
}else{
    echo "<button id = wyloguj><a href='/przepisAmi/wyloguj.php'> Wyloguj </a></button>";
}
?>
<li hidden = true> <a href='/przepisAmi/rejestracja.php'> Zarejestruj się juz teraz! </a> </li>
<li hidden = true> <a href='/przepisAmi/wyloguj.php'> Wyloguj się </a> </li>

<?php
// if($_SESSION['zalogowano']){
    //     echo "<li> <a href='/WypiekAmi/wyloguj.php'> Wyloguj </a> </li>";
    // }else{
        //     echo "<li hidden = true> <a href='/WypiekAmi/'></a> </li>";
        // }
        ?>
</ul>
</body>
</html>