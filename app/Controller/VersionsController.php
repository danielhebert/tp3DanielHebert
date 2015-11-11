<?php
App::uses('AppController', 'Controller');
/**
 * Versions Controller
 *
 * @property Version $Version
 * @property PaginatorComponent $Paginator
 */
class VersionsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Version->recursive = 0;
		$this->set('versions', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Version->exists($id)) {
			throw new NotFoundException(__('Invalid version'));
		}
		$options = array('conditions' => array('Version.' . $this->Version->primaryKey => $id));
		$this->set('version', $this->Version->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Version->create();
			if ($this->Version->save($this->request->data)) {
				$this->Session->setFlash(__('The version has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The version could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$games = $this->Version->Game->find('list');
		$this->set(compact('games'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Version->id = $id;
		if (!$this->Version->exists($id)) {
			throw new NotFoundException(__('Invalid version'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Version->save($this->request->data)) {
				$this->Session->setFlash(__('The version has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The version could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Version.' . $this->Version->primaryKey => $id));
			$this->request->data = $this->Version->find('first', $options);
		}
		$games = $this->Version->Game->find('list');
		$this->set(compact('games'));
	}

/**
 * delete method
 *
 * @throws NotFoundException
 * @throws MethodNotAllowedException
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Version->id = $id;
		if (!$this->Version->exists()) {
			throw new NotFoundException(__('Invalid version'));
		}
		if ($this->Version->delete()) {
			$this->Session->setFlash(__('Version deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Version was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
	
	public function getByGame() {
		$game_id = $this->request->data['Version']['game_id'];
		 
		$versions = $this->Version->find('list', array(
			'conditions' => array('Version.game_id' => $game_id),
			'recursive' => -1
		));
		
		$this->set('versions', $versions);
		$this->layout = 'ajax';
	}
	
	public function beforeFilter() {
		parent::beforeFilter();
		$this->Auth->allow('getByGame');
	}
}
