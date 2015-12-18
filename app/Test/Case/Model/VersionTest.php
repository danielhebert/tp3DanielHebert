<?php
App::uses('Version', 'Model');

/**
 * Version Test Case
 *
 */
class VersionTest extends CakeTestCase {
	
    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.version'
    );

	/**
	 * setUp method
	 *
	 * @return void
	 */
	public function setUp() {
		parent::setUp();
		$this->Version = ClassRegistry::init('Version');
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown() {
		unset($this->Version);

		parent::tearDown();
	}
	
    /**
     * testGetVersionsByGameAvecParamValide method
     *
     * @return void
     */
    public function testGetVersionsByGameAvecParamValide() {
        $result = $this->Version->getVersionsByGame(2);
		
        $expected = array(
            (int) 2 => 'Japan',
            (int) 3 => 'US'
        );
		
        $this->assertEquals($expected, $result);
    }
	
    /**
     * testGetVersionsByGameAvecParamInvalide method
     *
     * @return void
     */
    public function testGetVersionsByGameAvecParamInvalide() {
        $result = $this->Version->getVersionsByGame('a');
		
        $expected = array();
		
        $this->assertEquals($expected, $result);
    }
}