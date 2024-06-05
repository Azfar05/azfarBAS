<?php
// auteur: azfar bholai
// functie: unitests class Klant

use PHPUnit\Framework\TestCase;
use Bas\classes\Verkooporder;

// Filename moet gelijk zijn aan de classname KlantTest
class VerkooporderTest extends TestCase{
    
	protected $verkooporder;

    protected function setUp(): void {
        $this->verkooporder = new Verkooporder();
    }

	// Methods moeten starten met de naam test....
	public function testgetVerkooporder(){
		$verkooporders = $this->verkooporder->getVerkooporders();
        $this->assertIsArray($verkooporders);
		$this->assertTrue(count($verkooporders) > 0, "Aantal moet groter dan 0 zijn");
	}

	public function testGetKlant(){
		$verkordId = 1; // check of dit ook echt in de database bestaat!
		$verkooporder = $this->verkooporder->getVerkooporder($verkordId);
		$this->assertEquals($verkordId, $verkooporder['verkordId']);
	}
	public function testInsertVerkooporderTrue() {
        $testData = [
            'klantNaam' => 'Test',
            'artNaam' => 'Test',
            'verkOrdDatum' => '1-1-2000',
            'verkOrdBestAanal' => 'Test',
            'verkOrdStatus' => 'Test'
        ];
        
        $result = $this->verkooporder->insertVerkooporder($testData);
        $this->assertTrue($result);
    }
	
}
	
