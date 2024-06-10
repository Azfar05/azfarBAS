<!--
    Auteur: azfar
    Functie: home page CRUD InkoopOrder
-->
<!DOCTYPE html>
<html lang="nl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>InkoopOrder</title>
    <link rel="stylesheet" href="../style.css">
</head>

<body>
<nav>
        <ul>
            <li><a href="./index.html">Menu BAS</a></li>
        </ul>
        <ul class="right">
            <li class="dropdown"><a class="dropbtn" href="#jaar2">Info</a>
                <div class="dropdown-content">
                    <a href="../klant/read.php">Crud Klant</a>
                    <a href="../artikel/read.php">Crud Artikel</a>
                </div>
            </li>
            <li class="dropdown"><a class="dropbtn" href="#jaar2">Orders</a>
                <div class="dropdown-content">
                    <a href="">Inkooporders</a>
                    <a href="../Verkooporder/read.php">Verkooporders</a>
                </div>
            </li>
        </ul>
    </nav>
    
<?php

// Autoloader classes via composer
require '../../vendor/autoload.php';

use Bas\classes\InkoopOrder;


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
