
<!-- users -->
<?php
session_start();

$id = $_POST['users'];

$host = "localhost";
$dbuser = "root";
$dbpass = "";
$database = "wypiekami";

$conn = mysqli_connect($host, $dbuser, $dbpass, $database);

if(!$conn){
  die("Connection failed: " . mysqli_connect_error());
}

$sql = "DELETE FROM users WHERE id='$id'";

if (mysqli_query($conn, $sql)) {
    header('Location: adminpanel.php');
} else {
  echo mysqli_error($conn);
}

mysqli_close($conn);
?>
