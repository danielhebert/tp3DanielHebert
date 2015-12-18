<?php
App::uses('Time', 'Model');

/**
 * Time Test Case
 *
 */
class TimeTest extends CakeTestCase {
	
    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.time'
    );

	/**
	 * setUp method
	 *
	 * @return void
	 */
	public function setUp() {
		parent::setUp();
		$this->Time = ClassRegistry::init('Time');
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown() {
		unset($this->Time);

		parent::tearDown();
	}

	/**
	 * testIsOwnedBy method
	 *
	 * @return void
	 */
	public function testIsOwnedBy() {
		$timeId = 1;
		$userId = 1;
		$isOwned = $this->Time->isOwnedBy($timeId, $userId);
		
		$this->assertTrue($isOwned);
	}
	
	/**
	 * testIsNotOwnedBy method
	 *
	 * @return void
	 */
	public function testIsNotOwnedBy() {
		$timeId = 1;
		$userId = 2;
		$isOwned = $this->Time->isOwnedBy($timeId, $userId);
		
		$this->assertFalse($isOwned);
	}
}
