<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="przepis.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body id="body">
    <div id="panel">
        
        
        <?php
$host = "localhost";
$dbuser = "root";
$dbpass = "";
$database = "wypiekami";

$conn = mysqli_connect($host,$dbuser,$dbpass,$database);

if(!$conn){
    echo mysqli_connect_error($conn);   
}

$id = $_POST['przepis'];

$sql="SELECT * FROM `przepisy` WHERE id = '$id'";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){
    
    for($i=0;$i<mysqli_num_rows($result);$i++){
        
        $row = mysqli_fetch_assoc($result);
        echo "<div class='przepis'><h1>" . $row['nazwa_przepisu'] . "!</h1> <h4>potrzebne składniki: </h4>" . $row['skladniki'] . "<h4>przygotowanie:  </h4>" . $row['przygotowanie']."
        
        <form action='' method='post'>
        </form> </div> </br>";
    }
    
}else{
    echo "0 results";
}

?>
</div>    
<input type="button" onclick="location.href='przepisy.php';" value="Powrót na stronę główną" id="button"/>
</body>
</html>