<?php
// auteur: Azfar Bholai
// functie: definitie class Artikel
namespace Bas\classes;

use Bas\classes\Database;

include_once "functions.php";

class Artikel extends Database {
    public $artId;
    public $artOmschrijving;
    public $artInkoop;
    public $artVerkoop;
    public $artVoorraad;
    public $artminVoorraad;
    public $artmaxVoorraad;
    public $artLocatie;
    private $table_name = "Artikel";

    // Methods

    /**
     * Summary of crudArtikel
     * @return void
     */
    public function crudArtikel() : void {
        // Haal alle klanten op uit de database mbv de method getArtikelen()
        $lijst = $this->getArtikelen();

        // Print een HTML tabel van de lijst    
        $this->showTable($lijst);
    }

    /**
     * Summary of getArtikelen
     * @return array
     */
    public function getArtikelen() : array {
        $sql = "SELECT artId, artOmschrijving, artInkoop, artVerkoop, artVoorraad, artMinVoorraad, artMaxVoorraad, artLocatie FROM " . $this->table_name;
        $stmt = self::$conn->query($sql);
        $lijst = $stmt->fetchAll(\PDO::FETCH_ASSOC);
        return $lijst;
    }

    /**
     * Summary of getArtikel
     * @param int $artId
     * @return array
     */
    public function getArtikel(int $artId) : array {
        $sql = "SELECT artId, artOmschrijving, artInkoop, artVerkoop, artVoorraad, artMinVoorraad, artMaxVoorraad, artLocatie FROM " . $this->table_name . " WHERE artId = :artId";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':artId', $artId, \PDO::PARAM_INT);
        $stmt->execute();
        $klant = $stmt->fetch(\PDO::FETCH_ASSOC);
        return $klant ? $klant : [];
    }

    public function dropDownArtikel($row_selected = -1) {
        // Haal alle klanten op uit de database mbv de method getKlanten()
        $lijst = $this->getArtikelen();
        
        echo "<label for='Artikel'>Choose a artikel:</label>";
        echo "<select name='artId'>";
        foreach ($lijst as $row) {
            if ($row_selected == $row["artId"]) {
                echo "<option value='{$row["artId"]}' selected='selected'> {$row["artOmschrijving"]} {$row["artVoorraad"]}</option>\n";
            } else {
                echo "<option value='{$row["artId"]}'> {$row["artOmschrijving"]} {$row["artVoorraad"]}</option>\n";
            }
        }
        echo "</select>";
    }

    /**
     * Summary of showTable
     * @param array $lijst
     * @return void
     */
    public function showTable(array $lijst) : void {
        $txt = "<table>";
    
        // Check if the list is not empty
        if (!empty($lijst)) {
            // Voeg de kolomnamen boven de tabel
            $txt.= getTableHeader($lijst[0]);
    
            foreach ($lijst as $row) {
                $txt.= "<tr>";
                $txt.=  "<td>". $row["artId"]. "</td>";
                $txt.=  "<td>". $row["artOmschrijving"]. "</td>";
                $txt.=  "<td>". $row["artInkoop"]. "</td>";
                $txt.=  "<td>". $row["artVerkoop"]. "</td>";
                $txt.=  "<td>". $row["artVoorraad"]. "</td>";
                $txt.=  "<td>". $row["artMinVoorraad"]. "</td>";
                $txt.=  "<td>". $row["artMaxVoorraad"]. "</td>";
                $txt.=  "<td>". $row["artLocatie"]. "</td>";
                
                // Update
                // Wijzig knopje
                $txt.=  "<td>
                <form method='post' action='update.php?artId={$row["artId"]}' >       
                    <button name='update'>Wzg</button>    
                </form> </td>";
    
                // Delete
                $txt.=  "<td>
                <form method='post' action='delete.php?artId={$row["artId"]}' >       
                    <button name='verwijderen'>Verwijderen</button>     
                </form> </td>";    
                $txt.= "</tr>";
            }
        } else {
            $txt.= "<tr><td colspan='9'>No data found</td></tr>";
        }
        $txt.= "</table>";
        echo $txt;
    }

    // Delete klant
    /**
     * Summary of deleteArtikel
     * @param int $artId
     * @return bool
     */
    public function deleteArtikel(int $artId) : bool {
        $sql = "DELETE FROM " . $this->table_name . " WHERE artId = :artId";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':artId', $artId, \PDO::PARAM_INT);
        return $stmt->execute();
    }

    public function updateArtikel($row) : bool {
        $sql = "UPDATE " . $this->table_name . " SET artOmschrijving = :artOmschrijving, artInkoop = :artInkoop, artVerkoop = :artVerkoop, artVoorraad = :artVoorraad, artMinVoorraad = :artMinVoorraad, artMaxVoorraad = :artMaxVoorraad, artLocatie = :artLocatie WHERE artId = :artId";
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':artId', $row['artId'], \PDO::PARAM_INT);
        $stmt->bindParam(':artOmschrijving', $row['artOmschrijving'], \PDO::PARAM_STR);
        $stmt->bindParam(':artInkoop', $row['artInkoop'], \PDO::PARAM_STR);
        $stmt->bindParam(':artVerkoop', $row['artVerkoop'], \PDO::PARAM_STR);
        $stmt->bindParam(':artVoorraad', $row['artVoorraad'], \PDO::PARAM_INT);
        $stmt->bindParam(':artMinVoorraad', $row['artMinVoorraad'], \PDO::PARAM_INT);
        $stmt->bindParam(':artMaxVoorraad', $row['artMaxVoorraad'], \PDO::PARAM_INT);
        $stmt->bindParam(':artLocatie', $row['artLocatie'], \PDO::PARAM_INT);
        return $stmt->execute();
    }

    /**
     * Summary of BepMaxKlantId
     * @return int
     */
    private function BepMaxArtId() : int {
        // Bepaal uniek nummer
        $sql = "SELECT MAX(artId)+1 FROM " . $this->table_name;
        return (int) self::$conn->query($sql)->fetchColumn();
    }

    /**
     * Summary of insertKlant
     * @param array $row
     * @return bool
     */
    public function insertKlant(array $row) : bool {
        // Bepaal een unieke klantId
        $klantId = $this->BepMaxArtId();
        
        // query
        $sql = "INSERT INTO " . $this->table_name . " (artId, artOmschrijving, artInkoop, artVerkoop, artVoorraad, artMinVoorraad, artMaxVoorraad, artLocatie) VALUES (:artId, :artOmschrijving, :artInkoop, :artVerkoop, :artVoorraad, :artMinVoorraad, :artMaxVoorraad, :artLocatie)";
        
        // Prepare
        $stmt = self::$conn->prepare($sql);
        $stmt->bindParam(':artId', $klantId, \PDO::PARAM_INT);
        $stmt->bindParam(':artOmschrijving', $row['artOmschrijving'], \PDO::PARAM_STR);
        $stmt->bindParam(':artInkoop', $row['artInkoop'], \PDO::PARAM_STR);
        $stmt->bindParam(':artVerkoop', $row['artVerkoop'], \PDO::PARAM_STR);
        $stmt->bindParam(':artVoorraad', $row['artVoorraad'], \PDO::PARAM_INT);
        $stmt->bindParam(':artMinVoorraad', $row['artMinVoorraad'], \PDO::PARAM_INT);
        $stmt->bindParam(':artMaxVoorraad', $row['artMaxVoorraad'], \PDO::PARAM_INT);
        $stmt->bindParam(':artLocatie', $row['artLocatie'], \PDO::PARAM_INT);
        
        // Execute
        return $stmt->execute();
    }
}
?>
