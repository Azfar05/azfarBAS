<!--
	Auteur: azfar bholai
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
	
		<nav id="navklantfix">
			
		<div class="dropdown">
            <li>
                <a href=""><h2 class="menubutton">Menu Bas</h2></a>
            </li>
            <div class="dropdown-content">
                <a href="../index.html">Home<p class="menuitems"></p></a>
                <a href=""></a>
                <a href=""></a>
				
            </div>
        </div>
			<p class="midnav">CRUD Klant</p>
		</nav>

		<button>
			<a href='insert.php'>Toevoegen nieuwe klant</a> <br><br>
		</button>
			
	<?php
			// Autoloader classes via composer
			require '../../vendor/autoload.php';

			use Bas\classes\Klant;

			// Maak een object Klant
			$klant = new Klant;

			// Start CRUD
			$klant->crudKlant();

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