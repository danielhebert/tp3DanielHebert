<?php
App::uses('AppController', 'Controller');
/**
 * Times Controller
 *
 * @property Time $Time
 * @property PaginatorComponent $Paginator
 */
class TimesController extends AppController {

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
		$this->Time->recursive = 0;
		$this->set('times', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Time->exists($id)) {
			throw new NotFoundException(__('Invalid time'));
		}
		$options = array('conditions' => array('Time.' . $this->Time->primaryKey => $id));
		$this->set('time', $this->Time->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Time->create();
			$this->request->data['Time']['user_id'] = $this->Auth->user('id');
			if ($this->Time->save($this->request->data)) {
				$this->Session->setFlash(__('The time has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The time could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$users = $this->Time->User->find('list');
		$segments = $this->Time->Segment->find('list');
		$this->set(compact('users', 'segments'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Time->id = $id;
		if (!$this->Time->exists($id)) {
			throw new NotFoundException(__('Invalid time'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Time->save($this->request->data)) {
				$this->Session->setFlash(__('The time has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The time could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Time.' . $this->Time->primaryKey => $id));
			$this->request->data = $this->Time->find('first', $options);
		}
		$users = $this->Time->User->find('list');
		$segments = $this->Time->Segment->find('list');
		$this->set(compact('users', 'segments'));
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
		$this->Time->id = $id;
		if (!$this->Time->exists()) {
			throw new NotFoundException(__('Invalid time'));
		}
		if ($this->Time->delete()) {
			$this->Session->setFlash(__('Time deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Time was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
	
	public function isAuthorized($user) {
		if ($this->action === 'add') {
			return true;
		}

		if (in_array($this->action, array('edit', 'delete'))) {
			$timeId = (int) $this->request->params['pass'][0];
			if ($this->Time->isOwnedBy($timeId, $user['id'])) {
				return true;
			}
		}

		return parent::isAuthorized($user);
	}
}
