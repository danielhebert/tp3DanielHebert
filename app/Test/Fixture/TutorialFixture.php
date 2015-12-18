<?php
/**
 * Tutorial Fixture
 */
class TutorialFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'name' => array('type' => 'string', 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'rules' => array('type' => 'string', 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'version_id' => array('type' => 'integer', 'default' => '1', 'unsigned' => false),
		'user_id' => array('type' => 'integer', 'default' => null, 'unsigned' => false),
		'created' => array('type' => 'date', 'default' => null),
		'modified' => array('type' => 'date', 'default' => null),
		'indexes' => array(
			'PRIMARY' => array('column' => 'id', 'unique' => 1)
		),
		'tableParameters' => array('charset' => 'utf8', 'collate' => 'utf8_unicode_ci', 'engine' => 'InnoDB')
	);

/**
 * Records
 *
 * @var array
 */
	public $records = array(
		array(
			'id' => 1,
			'name' => 'TutorielTest',
			'rules' => 'Test',
			'version_id' => 1,
			'user_id' => 1,
			'created' => '2015-12-12',
			'modified' => '2015-12-12'
		),
	);

}
