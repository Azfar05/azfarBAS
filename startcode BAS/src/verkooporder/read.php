<!--
    Auteur: azfar
    Functie: home page CRUD VerkoopOrder
-->
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VerkoopOrder</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>

<nav>
        <div class="dropdown">
            <li>
                <a href=""><h2 class="menubutton">Menu Bas</h2></a>
            </li>
            <div class="dropdown-content">
                <a href="../index.html">Home<p class="menuitems"></p></a>
            </div>
        </div>
        <p class="midnav">VerkoopOrders</p>
    </nav>
    
    
<?php

// Autoloader classes via composer
require '../../vendor/autoload.php';

use Bas\classes\VerkoopOrder;

// Maak een object VerkoopOrder
$verkoopOrder = new VerkoopOrder;

// Start CRUD
$verkoopOrder->crudVerkoopOrder();

?>

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