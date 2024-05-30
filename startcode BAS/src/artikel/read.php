<!--
    Auteur: Azfar
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
        <ul>
            <li><a href="./index.html">Menu BAS</a></li>
            <li><a href="#">Artikel</a></li>
        </ul>
        <ul class="right">
            <li class="dropdown"><a class="dropbtn" href="#jaar2">Info</a>
                <div class="dropdown-content">
                    <a href="../klant/read.php">Crud Klant</a>
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

use Bas\classes\Artikel;

// Maak een object Artikel
$artikel = new Artikel;

// Start CRUD
$artikel->crudArtikel();

?>
<a href="insert.php">Toevoegen nieuwe artikel</a>
</body>
</html>