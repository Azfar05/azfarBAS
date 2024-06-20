<?php
    // auteur: azfar
    // functie: update class Artikel

    // Autoloader classes via composer
    require '../../vendor/autoload.php';
    use Bas\classes\Artikel;
    
    $artikel = new Artikel;

    if(isset($_POST["update"]) && $_POST["update"] == "Wijzigen"){

        // Code voor een update
        $artId = $_POST["artId"]; // Get ID van input
        $artOmschrijving = $_POST["artOmschrijving"]; 
        $artInkoop = $_POST["artInkoop"]; 
        $artVerkoop = $_POST["artVerkoop"]; 
        $artMinVoorraad = $_POST["artMinVoorraad"];
        $artMaxVoorraad = $_POST["artMaxVoorraad"];
        $artLocatie = $_POST["artLocatie"]; // Get password if provided 
        
        $row = array(
            "artId" => $artId,
            "artOmschrijving" => $artOmschrijving,
            "artInkoop" => $artInkoop,
            "artVerkoop" => $artVerkoop, 
            "artMinVoorraad" => $artMinVoorraad,
            "artMaxVoorraad" => $artMaxVoorraad,
            "artLocatie" => $artLocatie  // Include password in the array
        );
        
        $success = $artikel->updateArtikel($row); 
        
        if ($success) {
            echo "Artikelgegevens succesvol bijgewerkt.";
        } else {
            echo "Fout bij het bijwerken van Artikelgegevens.";
        }
    }

    if (isset($_GET['artId'])){
        $row = $artikel->getArtikel($_GET['artId']);


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
<h1>CRUD artikel</h1>
<h2>Wijzigen</h2>	
<form method="post">
<input type="hidden" name="artId" value="<?php if(isset($row)) { echo $row['artId']; } ?>">
<input type="text" name="artOmschrijving" placeholder="artOmschrijving" required value="<?php if(isset($row)) {echo $row['artOmschrijving']; }?>"> *</br>
<input type="int" name="artInkoop" placeholder="artInkoop" required value="<?php if(isset($row)) {echo $row["artInkoop"]; }?>"> *</br> 
<input type="int" name="artVerkoop" placeholder="artVerkoop" required value="<?php if(isset($row)) {echo $row["artVerkoop"]; }?>"> *</br>
<input type="int" name="artVoorraad" placeholder="artVoorraad" required value="<?php if(isset($row)) {echo $row["artVoorraad"]; }?>"> *</br>
<input type="int" name="artMinVoorraad" placeholder="artMinVoorraad" required value="<?php if(isset($row)) {echo $row["artMinVoorraad"]; }?>"> *</br> 
<input type="int" name="artMaxVoorraad" placeholder="artMaxVoorraad" required value="<?php if(isset($row)) {echo $row["artMaxVoorraad"]; }?>"> *</br> 
<input type="int" name="artLocatie" placeholder="artLocatie"> </br> 
<input type="submit" name="update" value="Wijzigen">
</form></br>

<a href="read.php">Terug</a>

</body>
</html>

<?php
    } else {
        echo "Geen artId opgegeven<br>";
    }
?>