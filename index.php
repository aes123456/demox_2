<!doctype html>
<html>

<head>
    <title>Asiakasrekisteri</title>
</head>

<body>
    <h1>My blog</h1>
    <form action="save.php" method="post">
    <div>
            <label>astunnus:</label>
            <input name="astunnus" id="astunnus" type="text" maxlength="6" required/>
        </div>
        <div>
            <label>asnimi:</label>
            <input name="asnimi" id="asnimi" type="text" maxlength="20" required/>
        </div>
        <div>
            <label>yhteyshlo:</label>
            <input name="yhteyshlo" id="yhteyshlo" type="text" maxlength="15" required/>
        </div>
        <div>
            <label>postinro:</label>
            <input name="postinro" id="postinro" type="number" maxlength="5" required/>
        </div>
        <div>
            <label>postitmp:</label>
            <input name="postitmp" id="postitmp" type="text" maxlength="10" required/>
        </div>
        <div>
            <label>asvuosi:</label>
            <input name="asvuosi" id="asvuosi" type="number" maxlength="6" required/>
        </div>
        <input type="submit" value="Add new" />
    </form>
</body>

</html>
<div id="asiakas">
    <?php


$servername = "localhost";
$username = "demoxUser";
$password = "kfQ36jRelo06DJBC";
$dbname = "demox2";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname",$username,$password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $stmt = $conn->prepare("SELECT astunnus, asnimi, yhteyshlo, postinro, postitmp, asvuosi FROM asiakas");
        $stmt->execute();

        // set the resulting array to accociative
        $stmt->setFetchMode(PDO::FETCH_ASSOC);


        // haetaan kaikki SQL:n palauttamat rivit ja tallennetaan ne $result -muuttujaan
        $result = $stmt->fetchAll();

        // foreach on hyvä tulostamaan monta riviä:
        foreach($result as $row) {

            $astunnus = $row['astunnus'];
            $asnimi = $row['asnimi'];
            $yhteyshlo = $row['yhteyshlo'];
            $postinro = $row['postinro'];
            $postitmp = $row['postitmp'];
            $asvuosi = $row['asvuosi'];



            print("<p>");
            print($row['astunnus']);
            print("&nbsp; &nbsp;");
            print($row['asnimi']);
            print("&nbsp; &nbsp;");
            print($row['yhteyshlo']);
            print("&nbsp; &nbsp;");
            print($row['postinro']);
            print("&nbsp; &nbsp;");
            print($row['postitmp']);
            print("&nbsp; &nbsp;");
            print($row['asvuosi']);

            print("&nbsp; | &nbsp;");

            print("<a href='delete.php?astunnus=$astunnus'>Delete</a>");
            print("&nbsp; | &nbsp;");

            print("<a href='update.php?astunnus=$astunnus&asnimi=$asnimi&yhteyshlo=$yhteyshlo&postinro=$postinro&postitmp=$postitmp&asvuosi=$asvuosi'>Update</a>");

            print("</p>");



        }

    } catch (PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    ?>
</div>