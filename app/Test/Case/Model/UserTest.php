<?php
App::uses('User', 'Model');

/**
 * User Test Case
 *
 */
class UserTest extends CakeTestCase {
	
    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.user',
		'app.tutorial',
		'app.role'
    );

	/**
	 * setUp method
	 *
	 * @return void
	 */
	public function setUp() {
		parent::setUp();
		$this->User = ClassRegistry::init('User');
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown() {
		unset($this->User);

		parent::tearDown();
	}

	/**
	 * testEmailEtNomUtilisateurValides method
	 *
	 * @return void
	 */
	public function testEmailEtNomUtilisateurValides() {
		// Construit l'enregistrement à insérer dans la base de données
		$data = array('User' => array(
			'username' => 'Test',
			'email' => 'ba@ba.ba',
		));

		// Tentative de sauvegarder
		$result = $this->User->save($data);

		// Vérifie si l'insertion a fonctionné
		$this->assertArrayHasKey('User', $result);

		// Compte le nombre d'entrées qui correspondent dans la base de données
		$result = $this->User->find('count', array(
			'conditions' => array(
				'User.username' => 'Test',
				'User.email' => 'ba@ba.ba',
			),
		));

		// Vérifie si l'enregistrement souhaité est bien dans la base de données
		$this->assertEqual($result, 1);
	}
	
	/**
	 * testEmailInvalide method
	 *
	 * @return void
	 */
	public function testEmailInvalide() {
		// Construit l'enregistrement à insérer dans la base de données
		$data = array('User' => array(
			'username' => 'Test',
			'email' => 'ba.ba.ba',
		));

		// Tentative de sauvegarder
		$result = $this->User->save($data);

		// Vérifie que la sauvegarde a échoué
		$this->assertFalse($result);
	}
	
	/**
	 * testNomUtilisateurValide method
	 *
	 * @return void
	 */
	public function testNomUtilisateurInvalide() {
		// Construit l'enregistrement à insérer dans la base de données
		$data = array('User' => array(
			'username' => '...test',
			'email' => 'ba@ba.ba',
		));

		// Tentative de sauvegarder
		$result = $this->User->save($data);

		// Vérifie que la sauvegarde a échoué
		$this->assertFalse($result);
	}
}