<?php
    session_start();
    ?>

<?php
if($_SESSION['upr']!='worker'){
    echo "<script>location.href='./workerpanel.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker</title>
</head>

<body>
    <h1>Worker</h1>
   
<?php
include 'menu.php'
?>





</body>

</html>