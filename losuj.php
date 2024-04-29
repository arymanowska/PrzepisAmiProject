<?php
    session_start();
    ?>

    <!DOCTYPE html>
<html lang="en">

<head>
    <link rel="stylesheet" href="losuj.css">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>

<body id="body">
<div id="panel">


<!-- <form action="index.php" method="GET"> -->
    
    <?php
$host = "localhost";
$dbuser = "root";
$dbpass = "";
$database = "wypiekami";

$conn = mysqli_connect($host,$dbuser,$dbpass,$database);

if(!$conn){
    echo mysqli_connect_error($conn);   
}

$sql="SELECT * FROM `przepisy` ORDER BY RAND() LIMIT 1;";

$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0){
    
    for($i=0;$i<mysqli_num_rows($result);$i++){
        
        $row = mysqli_fetch_assoc($result);
        echo "<div class='przepis' id='przepis'>" . $row['nazwa_przepisu'] . "</div>     
        <form action='' method='post'>
        <input type='submit' value='Wylosuj przepis' id='buttonlosuj'>
        </form> </br>";
    }
    
}else{
    echo "0 results";
}

?>

</div>
<p></p>


</div>
<input type="button" onclick="location.href='przepisy.php';" value="Powrót na stronę główną" id="button" />

</body>

</html>