<?php
    // auteur: azfar
    // functie: update class Klant

    // Autoloader classes via composer
    require '../../vendor/autoload.php';
    use Bas\classes\Klant;
    
    $klant = new Klant;

    if(isset($_POST["update"]) && $_POST["update"] == "Wijzigen"){
        // get $ en post het
        $klantId = $_POST["klantId"]; 
        $klantNaam = $_POST["klantNaam"];
        $klantEmail = $_POST["klantEmail"];
        $klantAdres = $_POST["klantAdres"]; 
        $klantPostcode = $_POST["klantPostcode"];
        $klantWoonplaats = $_POST["klantWoonplaats"];
        $klantWachtwoord = $_POST["klantWachtwoord"]; 

        $row = array(
            "klantId" => $klantId,
            "klantNaam" => $klantNaam,
            "klantEmail" => $klantEmail,
            "klantAdres" => $klantAdres, 
            "klantPostcode" => $klantPostcode,
            "klantWoonplaats" => $klantWoonplaats,
            "klantWachtwoord" => $klantWachtwoord  // Include password in the array
        );

        // Code voor een update
        $success = $klant->updateKlant($row); 
        
        if ($success) {
            echo "Klantgegevens succesvol bijgewerkt.";
        } else {
            echo "Fout bij het bijwerken van klantgegevens.";
        }
    }

    if (isset($_GET['klantId'])){
        $row = $klant->getKlant($_GET['klantId']);

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
<h1>CRUD Klant</h1>
<h2>Wijzigen</h2>	
<form method="post">
<input type="hidden" name="klantId" value="<?php if(isset($row)) { echo $row['klantId']; } ?>">
<input type="text" name="klantNaam" required value="<?php if(isset($row)) {echo $row['klantNaam']; }?>"> *</br>
<input type="email" name="klantEmail" required value="<?php if(isset($row)) {echo $row["klantEmail"]; }?>"> *</br> 
<input type="text" name="klantAdres" required value="<?php if(isset($row)) {echo $row["klantAdres"]; }?>"> *</br>
<input type="text" name="klantPostcode" required value="<?php if(isset($row)) {echo $row["klantPostcode"]; }?>"> *</br>
<input type="text" name="klantWoonplaats" required value="<?php if(isset($row)) {echo $row["klantWoonplaats"]; }?>"> *</br> 
<input type="password" name="klantWachtwoord" placeholder="Nieuw wachtwoord (optioneel)"> </br> 
<input type="submit" name="update" value="Wijzigen">
</form></br>

<a href="read.php">Terug</a>

</body>
</html>

<?php
    } else {
        echo "Geen klantId opgegeven<br>";
    }
?>