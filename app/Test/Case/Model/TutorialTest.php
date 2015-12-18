<?php
App::uses('Tutorial', 'Model');

/**
 * Tutorial Test Case
 *
 */
class TutorialTest extends CakeTestCase {
	
    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.tutorial'
    );

	/**
	 * setUp method
	 *
	 * @return void
	 */
	public function setUp() {
		parent::setUp();
		$this->Tutorial = ClassRegistry::init('Tutorial');
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown() {
		unset($this->Tutorial);

		parent::tearDown();
	}

	/**
	 * testIsOwnedBy method
	 *
	 * @return void
	 */
	public function testIsOwnedBy() {
		$tutoId = 1;
		$userId = 1;
		$isOwned = $this->Tutorial->isOwnedBy($tutoId, $userId);
		
		$this->assertTrue($isOwned);
	}
	
	/**
	 * testIsNotOwnedBy method
	 *
	 * @return void
	 */
	public function testIsNotOwnedBy() {
		$tutoId = 1;
		$userId = 2;
		$isOwned = $this->Tutorial->isOwnedBy($tutoId, $userId);
		
		$this->assertFalse($isOwned);
	}
}