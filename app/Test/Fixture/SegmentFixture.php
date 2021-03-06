<?php
/**
 * Segment Fixture
 */
class SegmentFixture extends CakeTestFixture {

/**
 * Fields
 *
 * @var array
 */
	public $fields = array(
		'id' => array('type' => 'integer', 'default' => null, 'unsigned' => false, 'key' => 'primary'),
		'name' => array('type' => 'string', 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'details' => array('type' => 'string', 'default' => null, 'collate' => 'utf8_unicode_ci', 'charset' => 'utf8'),
		'goodtime' => array('type' => 'integer', 'default' => null, 'unsigned' => false),
		'tutorial_id' => array('type' => 'integer', 'default' => null, 'unsigned' => false),
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
			'name' => 'Segment1',
			'details' => 'Test1',
			'goodtime' => 1,
			'tutorial_id' => 1,
			'user_id' => 2,
			'created' => '2015-12-12',
			'modified' => '2015-12-12'
		),
	);

}
