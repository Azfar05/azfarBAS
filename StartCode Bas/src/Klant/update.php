<?php
// Auteur: azfar
// Functie: Update klantgegevens




// Autoloader classes via composer
require '../../vendor/autoload.php';

use Bas\classes\Klant;

// Maak een object Klant
$klant = new Klant();

// Check if form is submitted
if (isset($_POST['update'])) {
    // Get klant data from POST
    $klantId = $_POST['klantId'];
    $klantEmail = $_POST['klantEmail'];
    $klantNaam = $_POST['klantNaam'];
    $klantWoonplaats = $_POST['klantWoonplaats'];
    $klantAdres = $_POST['klantAdres'];
    $klantPostcode = $_POST['klantPostcode'];
    $klantWachtwoord = $_POST['klantWachtwoord'];

    // Prepare data array
    $klantData = [
        'klantId' => $klantId,
        'klantEmail' => $klantEmail,
        'klantNaam' => $klantNaam,
        'klantWoonplaats' => $klantWoonplaats,
        'klantAdres' => $klantAdres,
        'klantPostcode' => $klantPostcode,
        'klantWachtwoord' => $klantWachtwoord
    ];

    // Update klant data in the database
    $updateSuccess = $klant->updateKlant($klantData);

    // Show success or error message
    if ($updateSuccess) {
        echo "Klantgegevens succesvol bijgewerkt.";
    } else {
        echo "Fout bij het bijwerken van klantgegevens.";
    }
} else {
    // Get klantId from GET parameters
    $klantId = $_GET['klantId'];

    // Fetch klant details
    $klantDetails = $klant->getKlant($klantId);
}
?>

<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Klant</title>
    <link rel="stylesheet" href="../style.css">
</head>
<body>
    <nav>
        <div class="dropdown">
            <li>
                <a href=""><h2 class="menubutton">Menu Bas</h2></a>
            </li>
            <div class="dropdown-content">
                <a href="../index.html"><p class="menuitems">HomePage</p></a>
                <a href="../artikel/read.php"><p class="menuitems">CRUD artikel</p></a>
                <a href="../verkooporder/read.php"><p class="menuitems">VerkoopOrder</p></a>
            </div>
        </div>
        <p class="midnav">HomePage</p>
    </nav>

    <h2>Update Klant</h2>

    <form method="post">
        <input type="hidden" name="klantId" value="<?php echo htmlspecialchars($klantDetails['klantId']); ?>">
        <label for="klantEmail">Email:</label>
        <input type="email" name="klantEmail" id="klantEmail" value="<?php echo htmlspecialchars($klantDetails['klantEmail']); ?>" required>
        <br>
        <label for="klantNaam">Naam:</label>
        <input type="text" name="klantNaam" id="klantNaam" value="<?php echo htmlspecialchars($klantDetails['klantNaam']); ?>" required>
        <br>
        <label for="klantWoonplaats">Woonplaats:</label>
        <input type="text" name="klantWoonplaats" id="klantWoonplaats" value="<?php echo htmlspecialchars($klantDetails['klantWoonplaats']); ?>" required>
        <br>
        <label for="klantAdres">Adres:</label>
        <input type="text" name="klantAdres" id="klantAdres" value="<?php echo htmlspecialchars($klantDetails['klantAdres']); ?>" required>
        <br>
        <label for="klantPostcode">Postcode:</label>
        <input type="text" name="klantPostcode" id="klantPostcode" value="<?php echo htmlspecialchars($klantDetails['klantPostcode']); ?>" required>
        <br>
        <label for="klantWachtwoord">Wachtwoord:</label>
        <input type="text" name="klantWachtwoord" id="klantWachtwoord" value="<?php echo htmlspecialchars($klantDetails['klantWachtwoord']); ?>" required>
        <br><br>
        <input type="submit" name="update" value="Bijwerken">
    </form>

    <footer>
        <h2 class="fcontact">Contact</h2>
        <p class="ftelnr">
            TelefoonNummer <br>
            0800-1111 216 <br>
            LET OP: Dit nummer kan alleen gebeld worden vanuit Nederland!
        </p>
    </footer>
</body>
</html>
