<?php
/**
 * Time Fixture
 */
class TimeFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'time' => array('type' => 'integer', 'default' => null, 'unsigned' => false),
		'commentary' => array('type' => 'string', 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'user_id' => array('type' => 'integer', 'default' => null, 'unsigned' => false),
		'segment_id' => array('type' => 'integer', 'default' => null, 'unsigned' => false),
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
			'time' => 1,
			'commentary' => 'Test1',
			'user_id' => 1,
			'segment_id' => 1,
			'created' => '2015-12-12',
			'modified' => '2015-12-12'
		),
		array(
			'id' => 2,
			'time' => 1,
			'commentary' => 'Test2',
			'user_id' => 2,
			'segment_id' => 1,
			'created' => '2015-12-12',
			'modified' => '2015-12-12'
		),
	);

}
