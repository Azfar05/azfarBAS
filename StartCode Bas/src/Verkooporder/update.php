<?php
    // auteur: azfar
    // functie: update class VerkoopOrder

    // Autoloader classes via composer
    require '../../vendor/autoload.php';
    use Bas\classes\VerkoopOrder;
    use Bas\classes\Klant;
    use Bas\classes\Artikel;

    $verkoopOrder = new VerkoopOrder;
    $klant = new Klant;
    $artikel = new Artikel;

    // Code voor een update
    if(isset($_POST["update"]) && $_POST["update"] == "Wijzigen"){
        $verkOrdId = $_POST["verkOrdId"]; // Get ID van input
        $klantId = $_POST["klantId"]; 
        $artId = $_POST["artId"]; 
        $verkOrdDatum = $_POST["verkOrdDatum"]; 
        $verkOrdBestAantal = $_POST["verkOrdBestAantal"];
        $verkOrdStatus = $_POST["verkOrdStatus"];

        $row = array(
            "verkOrdId" => $verkOrdId,
            "klantId" => $klantId,
            "artId" => $artId,
            "verkOrdDatum" => $verkOrdDatum,
            "verkOrdBestAantal" => $verkOrdBestAantal,
            "verkOrdStatus" => $verkOrdStatus
        );
        
        $success = $verkoopOrder->updateVerkoopOrder($row); 
        
        if ($success) {
            echo "Verkooporder succesvol bijgewerkt.";
        } else {
            echo "Fout bij het bijwerken van verkooporder.";
        }
    }

    if (isset($_GET['verkOrdId'])){
        $row = $verkoopOrder->getVerkoopOrder($_GET['verkOrdId']);
        $klanten = $klant->getKlanten(); // Assuming this method exists
        $artikelen = $artikel->getArtikelen(); // Assuming this method exists
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
<h1>CRUD VerkoopOrder</h1>
<h2>Wijzigen</h2>    
<form method="post">
<input type="hidden" name="verkOrdId" value="<?php echo isset($row['verkOrdId']) ? $row['verkOrdId'] : ''; ?>">

<label for="klantId">Klant:</label>
<select name="klantId" required>
    <?php
        foreach ($klanten as $klant) {
            $selected = $klant['klantId'] == $row['klantId'] ? 'selected' : '';
            echo "<option value='{$klant['klantId']}' $selected>{$klant['klantNaam']}</option>";
        }
    ?>
</select> *</br>

<label for="artId">Artikel:</label>
<select name="artId" required>
    <?php
        foreach ($artikelen as $artikel) {
            $selected = $artikel['artId'] == $row['artId'] ? 'selected' : '';
            echo "<option value='{$artikel['artId']}' $selected>{$artikel['artOmschrijving']}</option>";
        }
    ?>
</select> *</br>

<label for="verkOrdDatum">Datum:</label>
<input type="text" name="verkOrdDatum" required value="<?php echo isset($row['verkOrdDatum']) ? $row['verkOrdDatum'] : ''; ?>"> *</br>

<label for="verkOrdBestAantal">Bestel Aantal:</label>
<input type="text" name="verkOrdBestAantal" required value="<?php echo isset($row['verkOrdBestAantal']) ? $row['verkOrdBestAantal'] : ''; ?>"> *</br>

<label for="verkOrdStatus">Status:</label>
<input type="text" name="verkOrdStatus" required value="<?php echo isset($row['verkOrdStatus']) ? $row['verkOrdStatus'] : ''; ?>"> *</br>

<input type="submit" name="update" value="Wijzigen">
</form></br>

<a href="read.php">Terug</a>

</body>
</html>

<?php
    } else {
        echo "Geen verkOrdId opgegeven<br>";
    }
?>
