<?php
App::uses('Game', 'Model');

/**
 * Game Test Case
 *
 */
class GameTest extends CakeTestCase {
	
    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = array(
        'app.game',
		'app.version'
    );

	/**
	 * setUp method
	 *
	 * @return void
	 */
	public function setUp() {
		parent::setUp();
		$this->Game = ClassRegistry::init('Game');
	}

	/**
	 * tearDown method
	 *
	 * @return void
	 */
	public function tearDown() {
		unset($this->Game);
		
		// Supprimer le fichier chargé
		@unlink(WWW_ROOT.'img'.DS.'uploads'.DS.'TestFile.png');

		parent::tearDown();
	}

	/**
	 * testFormAvecFichierVide method
	 *
	 * @return void
	 */
	public function testFormAvecFichierVide() {
		// Construit l'enregistrement à insérer dans la base de données
		$data = array('Game' => array(
			'name' => 'Test',
			'image' => array(
				'name' => '',
				'type' => '',
				'tmp_name' => '',
				'error' => 4,
				'size' => 0,
			)
		));

		// Tentative de sauvegarder
		$result = $this->Game->save($data);

		// Vérifie si l'insertion a fonctionné
		$this->assertArrayHasKey('Game', $result);

		// Compte le nombre d'entrées qui correspondent dans la base de données
		$result = $this->Game->find('count', array(
			'conditions' => array(
				'name' => 'Test',
			),
		));

		// Vérifie si l'enregistrement souhaité est bien dans la base de données
		$this->assertEqual($result, 1);
	}
	
	/**
	 * testFormAvecFichierValide method
	 *
	 * @return void
	 */
	public function testFormAvecFichierValide() {
		// Créé un stub pour le modèle de Game
		$stub = $this->getMockForModel('Game', array('is_uploaded_file','move_uploaded_file'));

		// Retourne toujours TRUE pour la fonction 'is_uploaded_file'
		$stub->expects($this->any())
			->method('is_uploaded_file')
			->will($this->returnValue(TRUE));
		// Copie le fichier au lieu d'éxécuter 'move_uploaded_file' pour tester
		$stub->expects($this->any())
			->method('move_uploaded_file')
			->will($this->returnCallback('copy'));

		// Construit l'enregistrement à insérer dans la base de données
		$data = array('Game' => array(
			'name' => 'TestImageValide',
			'image' => array(
				'name' => 'TestFile.png',
				'type' => 'image/png',
				'tmp_name' => ROOT.DS.APP_DIR.DS.'Test'.DS.'Case'.DS.'Model'.DS.'TestFile.png',
				'error' => 0,
				'size' => 75570,
			)
		));

		// Tentative de sauvegarder
		$result = $stub->save($data);

		// Vérifie si l'insertion a fonctionné
		$this->assertArrayHasKey('Game', $result);

		// Compte le nombre d'entrées qui correspondent dans la base de données
		$result = $this->Game->find('count', array(
			'conditions' => array(
				'Game.name' => 'TestImageValide',
				'Game.image' => 'uploads/TestFile.png'
			),
		));

		// Vérifie si l'enregistrement souhaité est bien dans la base de données
		$this->assertEqual($result, 1);

		// Vérifie si le fichier existe
		$this->assertFileExists(WWW_ROOT.'img'.DS.'uploads'.DS.'TestFile.png');
	}
	
	/**
	 * testFormAvecFichierInvalide method
	 *
	 * @return void
	 */	
	public function testFormAvecFichierInvalide() {
		// Créé un stub pour le modèle de Game
		$stub = $this->getMockForModel('Game', array('is_uploaded_file','move_uploaded_file'));

		// Retourne toujours TRUE pour la fonction 'is_uploaded_file'
		$stub->expects($this->any())
			->method('is_uploaded_file')
			->will($this->returnValue(TRUE));
		// Copie le fichier au lieu d'éxécuter 'move_uploaded_file' pour tester
		$stub->expects($this->any())
			->method('move_uploaded_file')
			->will($this->returnCallback('copy'));

		// Construit l'enregistrement à insérer dans la base de données
		$data = array('Game' => array(
			'name' => 'Test',
			'image' => array(
				'name' => 'TestFile.txt',
				'type' => 'text/plain',
				'tmp_name' => ROOT.DS.APP_DIR.DS.'Test'.DS.'Case'.DS.'Model'.DS.'TestFile.txt',
				'error' => 0,
				'size' => 14,
			)
		));

		// Tentative de sauvegarder
		$result = $stub->save($data);

		// Vérifie que la sauvegarde a échoué
		$this->assertFalse($result);

		// Vérifie que le fichier n'existe pas
		$this->assertFileNotExists(WWW_ROOT.'img'.DS.'uploads'.DS.'TestFile.txt');
	}
}