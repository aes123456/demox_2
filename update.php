<?php

$astunnus=filter_input(INPUT_GET,'astunnus',FILTER_SANITIZE_STRING);
$asnimi=filter_input(INPUT_GET,'asnimi',FILTER_SANITIZE_STRING);
$yhteyshlo=filter_input(INPUT_GET,'yhteyshlo',FILTER_SANITIZE_STRING);
$postinro=filter_input(INPUT_GET,'postinro',FILTER_SANITIZE_NUMBER_INT);
$postitmp=filter_input(INPUT_GET,'postitmp',FILTER_SANITIZE_STRING);
$asvuosi=filter_input(INPUT_GET,'asvuosi',FILTER_SANITIZE_NUMBER_INT);

?>

<form action="saveUpdate.php" method="POST">
<div>
            <label>astunnus:</label>
            <input name="astunnus" id="astunnus" type="text" maxlength="6" required value="<?php print($astunnus); ?>"/>
        </div>
        <div>
            <label>asnimi:</label>
            <input name="asnimi" id="asnimi" type="text" maxlength="20" required value="<?php print($asnimi); ?>"/>
        </div>
        <div>
            <label>yhteyshlo:</label>
            <input name="yhteyshlo" id="yhteyshlo" type="text" maxlength="15" required value="<?php print($yhteyshlo); ?>"/>
        </div>
        <div>
            <label>postinro:</label>
            <input name="postinro" id="postinro" type="number" maxlength="5" required value="<?php print($postinro); ?>"/>
        </div>
        <div>
            <label>postitmp:</label>
            <input name="postitmp" id="postitmp" type="text" maxlength="10" required value="<?php print($postitmp); ?>"/>
        </div>
        <div>
            <label>asvuosi:</label>
            <input name="asvuosi" id="asvuosi" type="number" maxlength="6" required value="<?php print($asvuosi); ?>"/>
        </div>
    <input type="submit" value="Update" />
</form>