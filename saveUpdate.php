<?php


$astunnus=filter_input(INPUT_POST,'astunnus',FILTER_SANITIZE_STRING);
$asnimi=filter_input(INPUT_POST,'asnimi',FILTER_SANITIZE_STRING);
$yhteyshlo=filter_input(INPUT_POST,'yhteyshlo',FILTER_SANITIZE_STRING);
$postinro=filter_input(INPUT_POST,'postinro',FILTER_SANITIZE_NUMBER_INT);
$postitmp=filter_input(INPUT_POST,'postitmp',FILTER_SANITIZE_STRING);
$asvuosi=filter_input(INPUT_POST,'asvuosi',FILTER_SANITIZE_NUMBER_INT);


$servername = "localhost";
$username = "demoxUser";
$password = "kfQ36jRelo06DJBC";
$dbname = "demox2";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
    // set the PDO error mode to exception
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $update = $conn->prepare("UPDATE asiakas SET astunnus = :astunnus, asnimi = :asnimi, yhteyshlo = :yhteyshlo, postinro = :postinro, postitmp = :postitmp, asvuosi = :asvuosi WHERE astunnus = :astunnus ");
    $update->bindValue(':astunnus', $astunnus, PDO::PARAM_STR);
    $update->bindValue(':asnimi', $asnimi, PDO::PARAM_STR);
    $update->bindValue(':yhteyshlo', $yhteyshlo, PDO::PARAM_STR);
    $update->bindValue(':postinro', $postinro, PDO::PARAM_INT);
    $update->bindValue(':postitmp', $postitmp, PDO::PARAM_STR);
    $update->bindValue(':asvuosi', $asvuosi, PDO::PARAM_INT);
    $update->execute();



    

}catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>