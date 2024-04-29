<?php
    session_start();
    ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="workerpanelx.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Worker Panel</title>
</head>

<body>
<?php
include 'menu.php';
?>
    <h1>Worker  Panel</h1>
<div id="przepis">
<?php

  ?>
</div>
<div id="usun">

  <h2>Usuń Przepis:</h2>
  <?php
$host = "localhost";
$dbuser = "root";
$dbpass = "";
$database = "wypiekami";

$conn = mysqli_connect($host,$dbuser,$dbpass,$database);

if(!$conn){
  echo mysqli_connect_error($conn);   
}

$sql="SELECT * FROM `przepisy`";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){
  
  for($i=0;$i<mysqli_num_rows($result);$i++){
    
    $row = mysqli_fetch_assoc($result);
    echo "<div class='przepisyworker' id='przepisy'>" . $row['nazwa_przepisu'] . "
    
    <form action='usunprzepis.php' method='post'>
    <input type='hidden' value=".$row['id']." name='przepis'>
    <input type='submit' value='usuń przepis' id='button'>
    </form> </div> </br>";
   }
   
  }else{
    echo "0 results";
  }
  
  ?>



</div>
</body>

</html>