<?php
    session_start();
    ?>

<?php

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="adminpanel.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin panel</title>
</head>

<body id="body">
  <div id="top">

    <h1>Admin Panel</h1>
<div id="wyloguj">

  <?php
include 'menu.php'
?>
</div>    
</div>
<div id="bot">

  <div id="users">
    <h2>Usuń użytkownika:</h2>
    <?php
$host = "localhost";
$dbuser = "root";
$dbpass = "";
$database = "wypiekami";

$conn = mysqli_connect($host,$dbuser,$dbpass,$database);

if(!$conn){
  echo mysqli_connect_error($conn);   
}

$sql="SELECT * FROM `users` WHERE login !='Admin'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){
  
  for($i=0;$i<mysqli_num_rows($result);$i++){
    
    $row = mysqli_fetch_assoc($result);
    $upr = $row['upr'];
    $login = $row['login'];
    echo "<div class='users'>username: '" . $row['login'] . "' uprawnienia: '" . $row['upr'] . "'
    
    <form action='usun.php' method='post'>
    <input type='hidden' value=".$row['id']." name='users'>
    <input type='submit' value='usuń użytkownika' id='delete'>
    </form> </div>";
    
    if($upr=="user"){
      echo '<form action="uprworker.php" method="post">
      <input type="hidden" value="'.$login.'" name="login">
      <input type="submit" value="zmień na pracownika" id="upruser">
      </form>';
    }else if($upr=="worker"){
      echo '<form action="upruser.php" method="post">
      <input type="hidden" value="'.$login.'" name="login">
      <input type="submit" value="zmień na użytkownika" id="uprworker">
      </form>';
    };
    
  }
  
}else{
  echo "0 results";
}

?>  
</div>
</div>



</body>

</html>