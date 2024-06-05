<?php
// auteur: azfar bholai
// functie: insert class Klant

// Autoloader classes via composer
require '../../vendor/autoload.php';
use Bas\classes\VerkoopOrder;
use Bas\classes\Database;

$db = new Database();
$db->getConnection();

// Maak een nieuwe VerkoopOrder aan
$klant = new VerkoopOrder();

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['insert'])) {
    $data = [
        'verkOrdId' => $_POST['verkOrdId'],
        'klantNaam' => $_POST['klantNaam'],
        'artId' => $_POST['artId'],
        'verkOrdDatum' => $_POST['verkOrdDatum'],
        'verkOrdBestAantal' => $_POST['verkOrdBestAantal'],
        'verkOrdStatus' => $_POST['verkOrdStatus']
    ];
    
    if ($verkoopOrder->insertVerkooporder($data)) {
        echo "Uw bestelling is succesvol toegevoegd!";
    } else {
        echo "Er is een fout opgetreden bij het toevoegen van uw bestelling.";
    }
}

$sql = "SELECT Klant.klantNaam FROM Klant INNER JOIN VerkoopOrder ON Klant.klantNaam = Klant.klantNaam";
$result = $conn->query($sql);


?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <title>CRUD VerkoopOrder</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <h1>CRUD VerkoopOrder</h1>
    <h1>Toevoegen</h1>
    <form method="post">
        <label for="voi">verkOrdId:</label>
        <input type="hidden" id="voi" name="VerkoopOrderId" placeholder="VerkoopOrderId" required/>
        <br>   
        <label for="ki">KlantId:</label>
        <input type="hidden" id="ki" name="klantemail" placeholder="Klantemail" required/>
        <br>   
        <label for="ai">artId:</label>
        <input type="hidden" id="ai" name="artid" placeholder="artid" required/>
        <br>
        <label for="vdatum">verkOrdDatum:</label>
        <input type="date" id="vdatum" name="verkorddatum" placeholder="verkorddatum" required/>
        <br>
        <label for="vbestelaantal">verkOrdBestAantal:</label>
        <input type="int" id="vbestaantal" name="verkoopbestelaantal" placeholder="verkoopbestelaantal" required/>
        <br>
        <label for="vordstat">verkOrdStatus:</label>
        <input type="text" id="vordstat" name="verkooporderstatus" placeholder="verkooporderstatus" required/>
        <br><br>
        <input type='submit' name='insert' value='Toevoegen'>
    </form>
	<a href='read.php'>Terug</a>
</body>
</html>