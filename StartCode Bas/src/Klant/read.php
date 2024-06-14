<!--
	Auteur: azfar
	Function: home page CRUD Klant
-->
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crud</title>
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
	
    <form method="post">
        <label for="klantNaam">Zoek op klantnaam:</label>
        <input type="text" name="klantNaam" id="klantNaam">
        <input type="submit" name="search" value="Zoeken">
    </form>

<?php

// Autoloader classes via composer
require '../../vendor/autoload.php';

use Bas\classes\Klant;

// Maak een object Klant
$klant = new Klant;

// Start CRUD
$klant->crudKlant();

?>

<button><a href="./insert.php">Toevoegen nieuwe klant</a></button>

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