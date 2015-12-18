<?php
/**
 * Version Fixture
 */
class VersionFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'game_id' => array('type' => 'integer', 'default' => null, 'unsigned' => false),
		'name' => array('type' => 'string', 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
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
			'game_id' => 1,
			'name' => 'Version1'
		),
		array(
			'id' => 2,
			'game_id' => 2,
			'name' => 'Japan'
		),
		array(
			'id' => 3,
			'game_id' => 2,
			'name' => 'US'
		),
	);

}
