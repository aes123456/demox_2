<?php

$servername = "localhost";
$username = "demoxUser";
$password = "kfQ36jRelo06DJBC";
$dbname = "demox2";

$astunnus = filter_input(INPUT_GET, "astunnus", FILTER_SANITIZE_STRING);



try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $update = $conn->prepare("DELETE FROM asiakas WHERE astunnus=(:astunnus)");
    $update->bindValue(':astunnus', $astunnus,PDO::PARAM_STR);
    $update->execute();


    
    // Avataan lopuksi index.php, eli uudelleen ohjaa
    header("Location: https://localhost/demox_database/index.php");
}  

catch (PDOException $pdoex) {
    print "Virhe!" . $pdoex->getMessage();
}
?>
