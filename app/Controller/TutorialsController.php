<?php
App::uses('AppController', 'Controller');
/**
 * Tutorials Controller
 *
 * @property Tutorial $Tutorial
 * @property PaginatorComponent $Paginator
 */
class TutorialsController extends AppController {

/**
 * Components
 *
 * @var array
 */
	public $components = array('Paginator');
	public $helpers = array('Js');
	//public $uses=array('Tutorial', 'Game');

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Tutorial->recursive = 2;
		$this->set('tutorials', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Tutorial->recursive = 2;
		if (!$this->Tutorial->exists($id)) {
			throw new NotFoundException(__('Invalid tutorial'));
		}
		$options = array('conditions' => array('Tutorial.' . $this->Tutorial->primaryKey => $id));
		$this->set('tutorial', $this->Tutorial->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Tutorial->create();
			$this->request->data['Tutorial']['user_id'] = $this->Auth->user('id');
			if ($this->Tutorial->save($this->request->data)) {
				$this->Session->setFlash(__('The tutorial has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tutorial could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$gamesRaw = $this->Tutorial->Version->Game->find('all');
		
		$games = array();
		foreach($gamesRaw as $game) {
			if (!empty($game['Version'])) {
				$games[$game['Game']['id']] = $game['Game']['name'];
			}
		}
		
        $versions = array('Choisir une version');
		
		$users = $this->Tutorial->User->find('list');
		$exploits = $this->Tutorial->Exploit->find('list');
		$this->set(compact('games', 'users', 'exploits', 'versions'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Tutorial->id = $id;
		if (!$this->Tutorial->exists($id)) {
			throw new NotFoundException(__('Invalid tutorial'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Tutorial->save($this->request->data)) {
				$this->Session->setFlash(__('The tutorial has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The tutorial could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Tutorial.' . $this->Tutorial->primaryKey => $id));
			$this->request->data = $this->Tutorial->find('first', $options);
		}
	
		$gamesRaw = $this->Tutorial->Version->Game->find('all');
		
		$games = array();
		foreach($gamesRaw as $game) {
			if (!empty($game['Version'])) {
				$games[$game['Game']['id']] = $game['Game']['name'];
			}
		}
		
		$versions = $this->Tutorial->Version->find('list', array('conditions' => array('Version.game_id' => $this->request->data['Version']['game_id'])));
	
		$users = $this->Tutorial->User->find('list');
		$exploits = $this->Tutorial->Exploit->find('list');
		$this->set(compact('games', 'users', 'exploits', 'versions'));
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
		$this->Tutorial->id = $id;
		if (!$this->Tutorial->exists()) {
			throw new NotFoundException(__('Invalid tutorial'));
		}
		if ($this->Tutorial->delete()) {
			$this->Session->setFlash(__('Tutorial deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Tutorial was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
	
	public function isAuthorized($user) {
		if ($this->action === 'add' && $this->Session->read('Auth.User.active') === '1') {
			return true;
		}

		if (in_array($this->action, array('edit', 'delete'))) {
			$tutoId = (int) $this->request->params['pass'][0];
			if ($this->Tutorial->isOwnedBy($tutoId, $user['id'])) {
				return true;
			}
		}

		return parent::isAuthorized($user);
	}
}
