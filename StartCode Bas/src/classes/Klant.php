<?php
// Auteur: azfar
// Functie: definitie class Klant
namespace Bas\classes;

use PDO;
use PDOException;
use Bas\classes\Database;

include_once "functions.php";

class Klant extends Database {
    private $table_name = "klant"; // Define your table name here

    // Other class properties and methods...

    /**
     * Summary of crudKlant
     * @return void
     */
    public function crudKlant() : void {
        // Haal alle klant op uit de database mbv de method getKlant()
        $lijst = $this->getKlanten();
 
        // Print een HTML tabel van de lijst    
        $this->showTable($lijst);
    }
 
    /**
     * Summary of getKlant
     * @return mixed
     */
    public function getKlanten() : array {
        try {
            // Doe een query: dit is een prepare en execute in 1 zonder placeholders
            $sql = "SELECT * FROM $this->table_name";
            $stmt = self::$conn->query($sql);
            $lijst = $stmt->fetchAll(PDO::FETCH_ASSOC);
           
            return $lijst;
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return [];
        }
    }
 
 /**
  * Summary of getKlant
  * @param int $klantId
  * @return mixed
  */
    public function getKlant(int $klantId) : array {
 
        // Doe een fetch op $klantId
       
        // testdata
        $lijst =
            ['klantId' => 1, 'klantEmail' => 'test1@example.com', 'klantNaam' => 'Test 1', 'klantWoonplaats' => 'City 1']
        ;
 
        return $lijst;
    }
   
    public function dropDownKlant($row_selected = -1){
   
        // Haal alle klanten op uit de database mbv de method getKlanten()
        $lijst = $this->getKlanten();
       
        echo "<label for='Klant'>Choose a klant:</label>";
        echo "<select name='klantId'>";
        foreach ($lijst as $row){
            if($row_selected == $row["klantId"]){
                echo "<option value='$row[klantId]' selected='selected'> $row[klantnaam] $row[klantemail]</option>\n";
            } else {
                echo "<option value='$row[klantId]'> $row[klantnaam] $row[klantemail]</option>\n";
            }
        }
        echo "</select>";
    }
 
 /**
  * Summary of showTable
  * @param mixed $lijst
  * @return void
  */
    public function showTable($lijst) : void {
 
        $txt = "<table>";
 
        // Voeg de kolomnamen boven de tabel
        $txt .= getTableHeader($lijst[0]);
 
        foreach($lijst as $row){
            $txt .= "<tr>";
            $txt .=  "<td>" . $row["klantId"] . "</td>";
            $txt .=  "<td>" . $row["klantNaam"] . "</td>";
            $txt .=  "<td>" . $row["klantEmail"] . "</td>";
            $txt .=  "<td>" . $row["klantWoonplaats"] . "</td>";
           
            //Update
            // Wijzig knopje
            $txt .=  "<td>";
            $txt .= "
            <form method='post' action='update.php?klantId=$row[klantId]' >      
                <button name='update'>Wzg</button>  
            </form> </td>";
 
            //Delete
            $txt .=  "<td>";
            $txt .= "
            <form method='post' action='delete.php?klantId=$row[klantId]' >      
                <button name='verwijderen'>Verwijderen</button>  
            </form> </td>";
            $txt .= "</tr>";
        }
        $txt .= "</table>";
        echo $txt;
    }

    /**
     * Summary of BepMaxKlantId
     * @return int
     */
    private function BepMaxKlantId() : int {
        try {
            // Query to determine the maximum klantId
            $sql = "SELECT MAX(klantId) FROM $this->table_name";
            $stmt = self::$conn->query($sql);
            $maxKlantId = $stmt->fetchColumn();
            
            // If there are no existing records, start with 1
            if ($maxKlantId === false) {
                return 1;
            } else {
                return intval($maxKlantId) + 1;
            }
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
            return -1; // Return -1 if an error occurs
        }
    }

    /**
     * Summary of insertKlant
     * Voeg een nieuwe klant toe aan de database
     * @param mixed $row Array met klantgegevens
     * @return bool True als het invoegen succesvol is, anders False
     */
    public function insertKlant(array $row) : bool {
        try {
            // Begin een transactie
            self::$conn->beginTransaction();

            // Bepaal een unieke klantId
            $klantId = $this->BepMaxKlantId();
            
            // SQL-query voor het invoegen van een nieuwe klant
            $sql = "INSERT INTO $this->table_name (klantId, klantEmail, klantNaam, klantWoonplaats, klantAdres, klantPostcode) 
                    VALUES (:klantId, :klantEmail, :klantNaam, :klantWoonplaats, :klantAdres, :klantPostcode)";
            
            // Bereid de query voor
            $stmt = self::$conn->prepare($sql);
            
            // Bind de parameters
            $stmt->bindParam(':klantId', $klantId, PDO::PARAM_INT);
            $stmt->bindParam(':klantEmail', $row['klantEmail'], PDO::PARAM_STR);
            $stmt->bindParam(':klantNaam', $row['klantNaam'], PDO::PARAM_STR);
            $stmt->bindParam(':klantWoonplaats', $row['klantWoonplaats'], PDO::PARAM_STR);
            $stmt->bindParam(':klantAdres', $row['klantAdres'], PDO::PARAM_STR);
            $stmt->bindParam(':klantPostcode', $row['klantPostcode'], PDO::PARAM_STR);
            
            // Voer de query uit
            $stmt->execute();

            // Commit de transactie
            self::$conn->commit();

            return true; // Succesvol ingevoegd
        } catch(PDOException $e) {
            // Rol de transactie terug bij een fout
            self::$conn->rollBack();
            echo "Error: " . $e->getMessage();
            return false; // Fout bij het invoegen
        }
    }
}
?>



