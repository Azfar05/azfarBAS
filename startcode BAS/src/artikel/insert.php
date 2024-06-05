<?php
// Auteur: Azfar
// Functie: Insert artikelgegevens


require '../../vendor/autoload.php';
use Bas\classes\Artikel;
use Bas\classes\Database;

$db = new Database();
$conn = $db -> getConnection();

if(isset($_POST["insert"]) && $_POST["insert"] == "Toevoegen") {
    // Assuming you have a database connection established, you can proceed with inserting the data into the database
 
    // Retrieve the form data
    $artOmschrijving = $_POST['artOmschrijving'];
    $artInkoop = $_POST['artInkoop'];
    $artVerkoop = $_POST['artVerkoop'];
    $artVoorraad = $_POST['artVoorraad'];
    $artMinVoorraad = $_POST['artMinVoorraad'];
    $artMaxVoorraad = $_POST['artMaxVoorraad'];
    $artLocatie = $_POST['artLocatie'];
 
    // Create a new Klant object
    $artikel = new Artikel();
 
    // Insert the new customer into the database
    if($artikel->insertArtikel($_POST, $conn)) {
        echo " Klant toegevoegd successfully.";
    } else {
    echo " Error adding klant.";
    }
}

?>


<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Toevoegen Artikel</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>

    <h1>CRUD Artikel</h1>
    <h2>Toevoegen</h2>
    <form method="post">
    <label for="oms">Artikelomschrijving:</label>
    <input type="text" id="oms" name="artOmschrijving" placeholder="Artikelomschrijving" required/>
    <br>   
    <label for="ink">Inkoopprijs:</label>
    <input type="text" id="ink" name="artInkoop" placeholder="Inkoopprijs" required/>
    <br>
    <label for="ver">Verkoopprijs:</label>
    <input type="text" id="ver" name="artVerkoop" placeholder="Verkoopprijs" required/>
    <br>
    <label for="voo">Voorraad:</label>
    <input type="text" id="voo" name="artVoorraad" placeholder="Voorraad" required/>
    <br>
    <label for="min">Minimum voorraad:</label>
    <input type="text" id="min" name="artMinVoorraad" placeholder="Minimum voorraad" required/>
    <br>
    <label for="max">Maximum voorraad:</label>
    <input type="text" id="max" name="artMaxVoorraad" placeholder="Maximum voorraad" required/>
    <br>
    <label for="loc">Locatie:</label>
    <input type="text" id="loc" name="artLocatie" placeholder="Locatie" required/>
    <br><br>
    <input type='submit' name='insert' value='Toevoegen'>
    </form></br>

    <a href='read.php'>Terug</a>

</body>
</html>