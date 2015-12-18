<?php
App::uses('Platform', 'Model');

/**
 * Platform Test Case
 *
 */
class PlatformTest extends CakeTestCase {
	
    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.platform'
    );

	/**
	 * setUp method
	 *
	 * @return void
	 */
	public function setUp() {
		parent::setUp();
		$this->Platform = ClassRegistry::init('Platform');
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown() {
		unset($this->Platform);

		parent::tearDown();
	}

	/**
	 * testGetPlatformNamesAvecUneLettreExistante method
	 *
	 * @return void
	 */
	public function testGetPlatformNamesAvecUneLettreExistante() {
		$testPlatformNames = $this->Platform->getPlatformNames("P");
		$this->assertEqual($testPlatformNames, array("2" => "PlayStation"));
	}

	/**
	 * testGetPlatformNamesAvecUneLettreInexistante method
	 *
	 * @return void
	 */	
	public function testGetPlatformNamesAvecUneLettreInexistante() {
		$testPlatformNames = $this->Platform->getPlatformNames("Z");
		
		$this->assertEqual($testPlatformNames, array());
	}
	
	/**
	 * testGetPlatformNamesAvecDeuxLettresExistantes method
	 *
	 * @return void
	 */	
	public function testGetPlatformNamesAvecDeuxLettresExistantes() {
		$testPlatformNames = $this->Platform->getPlatformNames("Ga");
		
		$this->assertEqual($testPlatformNames, array("3" => "Gameboy"));
	}
	
	/**
	 * testGetPlatformNamesAvecChaineVide method
	 *
	 * @return void
	 */	
	public function testGetPlatformNamesAvecChaineVide() {
		$testPlatformNames = $this->Platform->getPlatformNames("");
		
		$this->assertEqual($testPlatformNames, null);
	}
}
