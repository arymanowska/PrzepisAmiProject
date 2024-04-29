<?php
    session_start();
    ?>
    
    <!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="index.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body id="body">

<?php
include 'menu.php'
?>

    <form action="index.php" method="GET">
        
 </form>

 <div id="panel">
    <input type="button" onclick="location.href='login.php';" value="zaloguj się" id="login"/>
    <h2>Lub</h2>
    <input type="button" onclick="location.href='rejestracja.php';" value="zarejestruj się" id="login"/>
</div>

</body>

</html>