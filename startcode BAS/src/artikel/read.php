<!--
	Auteur: azfar bholai
	Function: home page CRUD Artikel
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
	
		<nav id="navartikelfix">
			
		<div class="dropdown">
            <li>
                <a href=""><h2 class="menubutton">Menu Bas</h2></a>
            </li>
            <div class="dropdown-content">
                <a href="../index.html">Home<p class="menuitems"></p></a>
                <a href="artikelen/read.php">CRUD Artikel</a>
                <a href=""></a>
				
            </div>
        </div>
			<p class="midnav">CRUD Artikel</p>
		</nav>

		<button>
			<a href='insert.php'>Toevoegen nieuw artikel</a> <br><br>
		</button>
			
	<?php
			// Autoloader classes via composer
			require '../../vendor/autoload.php';

			use Bas\classes\Artikel;

			// Maak een object Artikel
			$klant = new Artikel;

			// Start CRUD
			$klant->crudArtikel();

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