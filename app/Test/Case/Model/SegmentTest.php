<?php
App::uses('Segment', 'Model');

/**
 * Segment Test Case
 *
 */
class SegmentTest extends CakeTestCase {
	
    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.segment',
		'app.tutorial',
		'app.user',
		'app.time'
    );

	/**
	 * setUp method
	 *
	 * @return void
	 */
	public function setUp() {
		parent::setUp();
		$this->Segment = ClassRegistry::init('Segment');
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown() {
		unset($this->Segment);

		parent::tearDown();
	}
	
	/**
	 * testTempsValide method
	 *
	 * @return void
	 */
	public function testTempsValide() {
		// Construit l'enregistrement à insérer dans la base de données
		$data = array('Segment' => array(
			'goodtime' => 1500,
		));

		// Tentative de sauvegarder
		$result = $this->Segment->save($data);

		// Vérifie si l'insertion a fonctionné
		$this->assertArrayHasKey('Segment', $result);

		// Compte le nombre d'entrées qui correspondent dans la base de données
		$result = $this->Segment->find('count', array(
			'conditions' => array(
				'goodtime' => 1500,
			),
		));

		// Vérifie si l'enregistrement souhaité est bien dans la base de données
		$this->assertEqual($result, 1);
	}
	
	/**
	 * testTempsInvalide method
	 *
	 * @return void
	 */
	public function testTempsInvalide() {
		// Construit l'enregistrement à insérer dans la base de données
		$data = array('Segment' => array(
			'goodtime' => 'Test',
		));

		// Tentative de sauvegarder
		$result = $this->Segment->save($data);

		// Vérifie que la sauvegarde a échoué
		$this->assertFalse($result);
	}
	
	/**
	 * testIsOwnedBy method
	 *
	 * @return void
	 */
	public function testIsOwnedBy() {
		$segmentId = 1;
		$userId = 2;
		$isOwned = $this->Segment->isOwnedBy($segmentId, $userId);
		
		$this->assertTrue($isOwned);
	}
	
	/**
	 * testIsNotOwnedBy method
	 *
	 * @return void
	 */
	public function testIsNotOwnedBy() {
		$segmentId = 2;
		$userId = 1;
		$isOwned = $this->Segment->isOwnedBy($segmentId, $userId);
		
		$this->assertFalse($isOwned);
	}
}
