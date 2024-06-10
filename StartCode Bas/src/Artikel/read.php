<!--
    Auteur: azfar
    Functie: home page CRUD Artikel
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
                <a href="../klant/read.php"><p class="menuitems">CRUD klant</p></a>
                <a href="../index.html"><p class="menuitems">HomePage</p></a>
                <a href="../verkooporder/read.php"><p class="menuitems">VerkoopOrder</p></a>
            </div>
        </div>
        <p class="midnav">HomePage</p>
    </nav>
    
<?php

// Autoloader classes via composer
require '../../vendor/autoload.php';

use Bas\classes\Artikel;

// Maak een object Artikel
$artikel = new Artikel;

// Start CRUD
$artikel->crudArtikel();

?>

<button><a href="insert.php">Voeg artikel toe</a></button>

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
