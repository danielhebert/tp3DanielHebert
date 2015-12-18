<?php
App::uses('AppModel', 'Model');
/**
 * Game Model
 *
 * @property Tutorial $Tutorial
 */
class Game extends AppModel {

	public $uploadDir = 'uploads';
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
		'platform' => array(
			'notBlank' => array(
				'rule' => array('notBlank'),
				//'message' => 'Your custom message here',
				//'allowEmpty' => false,
				//'required' => false,
				//'last' => false, // Stop validation after this rule
				//'on' => 'create', // Limit validation to 'create' or 'update' operations
			),
		),
		'image' => array(
			// http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::uploadError
			'uploadError' => array(
				'rule' => 'uploadError',
				'message' => 'Something went wrong with the file upload.',
				'required' => FALSE,
				'allowEmpty' => TRUE,
			),
			// http://book.cakephp.org/2.0/en/models/data-validation.html#Validation::mimeType
			'mimeType' => array(
				'rule' => array('mimeType', array('image/gif','image/png','image/jpg','image/jpeg')),
				'message' => 'Invalid file, only images are allowed.',

			),
			'fileSize' => array(
				'rule' => array('fileSize', '<', '1MB'),
				'message' => 'Image must be less than 1MB.',
			),
			// custom callback to deal with the file upload
			'processUpload' => array(
				'rule' => 'processUpload',
				'message' => 'Something went wrong processing your file.',
				'required' => FALSE,
				'allowEmpty' => TRUE,
				'last' => TRUE,
			)
		)
	);

	//The Associations below have been created with all possible keys, those that are not needed can be removed

/**
 * belongsTo associations
 *
 * @var array
 */

	
/**
 * hasMany associations
 *
 * @var array
 */
	public $hasMany = array(
		'Version' => array(
			'className' => 'Version',
			'foreignKey' => 'game_id',
			'dependent' => false,
			'conditions' => '',
			'fields' => '',
			'order' => '',
			'limit' => '',
			'offset' => '',
			'exclusive' => '',
			'finderQuery' => '',
			'counterQuery' => ''
		)
	);
	
	public function processUpload($check=array()) {
		// deal with uploaded file
		
		if (!empty($check['image']['tmp_name'])) {			
			// check file is uploaded
			if (!$this->is_uploaded_file($check['image']['tmp_name'])) {
				return FALSE;
			}

			// build full filename
			$image = WWW_ROOT . 'img' . DS . $this->uploadDir . DS . $check['image']['name'];

			// @todo check for duplicate filename

			// try moving file
			if (!$this->move_uploaded_file($check['image']['tmp_name'], $image)) {
				return FALSE;

			// file successfully uploaded
			} else {
				// save the file path relative from WWW_ROOT e.g. uploads/example_filename.jpg
				$this->data[$this->alias]['filepath'] = $this->uploadDir . '/' . $check['image']['name'];
			}
		}
		
		return TRUE;
	}
	
	public function is_uploaded_file($tmp_name) {
		return is_uploaded_file($tmp_name);
	}

	public function move_uploaded_file($from, $to) {
		return move_uploaded_file($from, $to);
	}
	
    public function beforeSave($options = array()) {
		if (!empty($this->data[$this->alias]['filepath'])) {
			$this->data[$this->alias]['image'] = $this->data[$this->alias]['filepath'];
		}
    }
	
	public function beforeValidate($options = array()) {
		// ignore empty file - causes issues with form validation when file is empty and optional
		if (!empty($this->data[$this->alias]['image']['error']) && $this->data[$this->alias]['image']['error']==4 && $this->data[$this->alias]['image']['size']==0) {
			unset($this->data[$this->alias]['image']);
		}

		//parent::beforeValidate($options);
	}

}
