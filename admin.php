<?php
    session_start();
    ?>

<?php
if($_SESSION['upr']!='admin'){
    echo "<script>location.href='./index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
</head>

<body>
    <h1>Admin</h1>
   
<?php
include 'menu.php'
?>

  



</body>

</html>