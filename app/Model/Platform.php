<?php
App::uses('AppModel', 'Model');
/**
 * System Model
 *
 * @property Game $Game
 */
class Platform extends AppModel {

/**
 * Validation rules
 *
 * @var array
 */
	public $validate = array(
		'name' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * hasMany associations
 *
 * @var array
 */
	
	public function getPlatformNames($term = null) {
		if(!empty($term)) {
			$platforms = $this->find('list', array(
				'conditions' => array(
				'name LIKE' => trim($term) . '%'
				)
			));
		
			return $platforms;
		}
		return false;
	}

}
