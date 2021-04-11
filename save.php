<?php


$servername = "localhost";
$username = "demoxUser";
$password = "kfQ36jRelo06DJBC";
$dbname = "demox2";


try {

    $astunnus=filter_input(INPUT_POST,'astunnus',FILTER_SANITIZE_STRING);
    $asnimi=filter_input(INPUT_POST,'asnimi',FILTER_SANITIZE_STRING);
    $yhteyshlo=filter_input(INPUT_POST,'yhteyshlo',FILTER_SANITIZE_STRING);
    $postinro=filter_input(INPUT_POST,'postinro',FILTER_SANITIZE_NUMBER_INT);
    $postitmp=filter_input(INPUT_POST,'postitmp',FILTER_SANITIZE_STRING);
    $asvuosi=filter_input(INPUT_POST,'asvuosi',FILTER_SANITIZE_NUMBER_INT);


    $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);

    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


    $stmt = $conn->prepare("INSERT INTO asiakas (astunnus, asnimi, yhteyshlo, postinro, postitmp, asvuosi) "
        . "VALUES (:astunnus, :asnimi, :yhteyshlo, :postinro, :postitmp, :asvuosi)");
        $stmt->bindValue(':astunnus', $astunnus, PDO::PARAM_STR);
        $stmt->bindValue(':asnimi', $asnimi, PDO::PARAM_STR);
        $stmt->bindValue(':yhteyshlo', $yhteyshlo, PDO::PARAM_STR);
        $stmt->bindValue(':postinro', $postinro, PDO::PARAM_INT);
        $stmt->bindValue(':postitmp', $postitmp, PDO::PARAM_STR);
        $stmt->bindValue(':asvuosi', $asvuosi, PDO::PARAM_INT);
        $stmt->execute();




}   catch (PDOException $pdoex) {

    // Rollback
    $conn->rollBack();
    print "Virhe!" . $pdoex->getMessage();
}
?>
