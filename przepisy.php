<?php
    session_start();
    ?>
    
    <!DOCTYPE html>
    <html lang="en">
        
        <head>
            <link rel="stylesheet" href="przepisyx.css">
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
        </head>
        
        <body id="body">
            <div id="top">
                
                <div id="user">
                    <h4>zalogowano jako:</h4>
                            <?php
                            echo $_SESSION['user'];
                            ?>
                            <?php
                            include 'menu.php'
                            ?>
                
            </div>
            <div id="losuj">
                
                <h3>Nie masz pomysłu na danie?</h3>
                <input type="button" onclick="location.href='losuj.php';" value="wylosuj je tutaj!" id="button"/>
            </div>
            <div id="polecane">
                <h3>Wyszukaj przepis</h3>
                <form action="" method="post">
                    <input type="text" name="nazwa" id="input" placeholder="wyszukaj przepis">
                    <input type="submit" value="szukaj" id="button">
                </form> 
                <?php
            $host = "localhost";
            $dbuser = "root";
            $dbpass = "";
            $database = "wypiekami";
            
            $conn = mysqli_connect($host,$dbuser,$dbpass,$database);
            
            if(!$conn){
                echo mysqli_connect_error($conn);   
            }
            
            @$nazwa = $_POST['nazwa'];
            
            $sql="SELECT nazwa_przepisu, id FROM `przepisy` WHERE nazwa_przepisu LIKE '$nazwa'";
            
            $result = mysqli_query($conn, $sql);
            
            if (mysqli_num_rows($result) > 0){
                
                for($i=0;$i<mysqli_num_rows($result);$i++){
                    
                    $row = mysqli_fetch_assoc($result);
                    echo "<div class='przepis' id='przepisyszukaj''>
                    <form action='przepis.php' method='post'>
                    <input type='hidden' value=".$row['id']." name='przepis'>
                    <input type='submit' value='".$row['nazwa_przepisu']."' id='button'>
                    </form> </div> </br>";
                }
                
            }else{
                echo '';
            }
            
            ?>

<!-- wyszukaj przepis -->
</div>
</div>
<div id="przepis">
    </div>
</div>    
</div>
<div id="bot">
    
    <div id="przepisy">
        
        
        <form action="index.php" method="GET">
            
            </form>
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
        echo "<div class='przepis id='przepis''>
        <form action='przepis.php' method='post'>
        <input type='hidden' value=".$row['id']." name='przepis'>
        <input type='submit' value='".$row['nazwa_przepisu']."' id='buttonprzepis'>
        </form> </div> </br>";
    }
    
}else{
    echo "0 results";
}

?>
</div>
<div id="dodaj">

    <h3>Dodaj przepis</h3>
    <form action="przepisy.php" method="post">
        <input type="text" name="nazwa_przepisu" id="input" placeholder="nazwa dania:">
        <input type="text" name="skladniki" id="input" placeholder="potrzebne składniki:">
        <input type="text" name="przygotowanie" id="input" placeholder="przygotowanie dania:">
        <input type="submit" value="dodaj" id="button">
    </form>  
<?php
if(isset($_POST["nazwa_przepisu"]) && isset($_POST["skladniki"]) && isset($_POST["przygotowanie"])){
    
    $nazwa_przepisu = $_POST["nazwa_przepisu"];
    $skladniki = $_POST["skladniki"];
    $przygotowanie = $_POST["przygotowanie"];
    
    $host = "localhost";
    $dbuser = "root";
    $dbpass = "";
    $database = "wypiekami";
    
    $conn = mysqli_connect($host,$dbuser,$dbpass,$database);
    
    if(!$conn){
        echo mysqli_connect_error($conn);   
    }

    
    $sql="INSERT INTO `przepisy`(`id`,`nazwa_przepisu`, `skladniki`, `przygotowanie`) VALUES ('','$nazwa_przepisu','$skladniki','$przygotowanie')";
    
    
    $query = mysqli_query($conn,$sql);
    
    if (empty($nazwa_przepisu) || empty($skladniki) || empty($przygotowanie)){
        echo 'nie wprowadzono danych';
    }else
        echo "dodano";
    } else {
        mysqli_error($conn);

        
    
    mysqli_close($conn);
}
?>
</div>    
</div>

</body>

</html>