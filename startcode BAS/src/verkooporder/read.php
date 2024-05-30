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
        <ul>
            <li><a href="/index.html">Menu BAS</a></li>
        </ul>
        <ul class="right">
            <li class="dropdown"><a class="dropbtn" href="#jaar2">Info</a>
                <div class="dropdown-content">
                    <a href="klant/read.php">Crud Klant</a>
                    <a href="artikel/read.php">Crud Artikel</a>
                </div>
            </li>
            <li class="dropdown"><a class="dropbtn" href="#jaar2">Orders</a>
                <div class="dropdown-content">
                    <a href="#">Inkooporders</a>
                    <a href="./classes/verkooporder.php">Verkooporders</a>
                </div>
            </li>
        </ul>
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
</body>
</html>