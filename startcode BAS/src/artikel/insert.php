<?php
// auteur: Azfar bholai
// functie: insert class artikel 

// Autoloader classes via composer
require '../../vendor/autoload.php';
use Bas\classes\Artikel;
use Bas\classes\Database;

$db = new Database();
$db->getConnection();

// Maak een nieuwe klant aan
$klant = new Artikel();


//...

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])) {
    $data = [
        'artId' => $_POST['artId'],
        'artOmschrijving' => $_POST['artOmschrijving'],
        'artInkoop' => $_POST['artInkoop'],
        'artVerkoop' => $_POST['artVerkoop'],
        'artVoorraad' => $_POST['artVoorraad'],
        'artMinVoorraad' => $_POST['artMinVoorraad'],
        'artMaxVoorraad' => $_POST['artMaxVoorraad'],
        'artLocatie' => $_POST['artLocatie'],
    ];
    
    if ($klant->insertKlant($data)) {
        echo "artikel succesvol toegevoegd!";
    } else {
        echo "Er is een fout opgetreden bij het toevoegen van het artikel.";
    }
}
?>


<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>CRUD Artikel</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h1>CRUD Artikel</h1>
    <h1>Toevoegen</h1>
    <form method="post">
    <label for="artId">ArtikelID:</label>
    <input type="text" id="artId" name="artId" placeholder="artId" required/>
    <br>   
    <label for="artOmschrijving">ArtikelOmschrijving:</label>
    <input type="text" id="artOmschrijving" name="artOmschrijving" placeholder="artOmschrijving" required/>
    <br>   
    <label for="artInkoop">ArtikelInkoop:</label>
    <input type="text" id="artInkoop" name="artInkoop" placeholder="artInkoop" required/>
    <br>
    <label for="artVerkoop">ArtikelVerkoop:</label>
    <input type="text" id="artVerkoop" name="artVerkoop" placeholder="artVerkoop" required/>
    <br>
    <label for="artVoorraad">ArtikelVoorraad:</label>
    <input type="text" id="artVoorraad" name="artVoorraad" placeholder="artVoorraad" required/>
    <br>
    <label for="artMinVoorraad">ArtikelMinVoorraad:</label>
    <input type="text" id="artMinVoorraad" name="artMinVoorraad" placeholder="artMinVoorraad" required/>
    <br>
    <label for="artMaxVoorraad">ArtikelMaxVoorraad:</label>
    <input type="text" id="artMaxVoorraad" name="artMaxVoorraad" placeholder="artMaxVoorraad" required/>
    <br>
    <label for="artLocatie">ArtielLocatie:</label>
    <input type="text" id="artLocatie" name="artLocatie" placeholder="artLocatie" required/>
    <br>
    <br>
    <input type='submit' name='insert' value='Toevoegen'>
</form>
	<a href='read.php'>Terug</a>
</body>
</html>