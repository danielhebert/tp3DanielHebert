<?php
App::uses('AppController', 'Controller');
/**
 * Segments Controller
 *
 * @property Segment $Segment
 * @property PaginatorComponent $Paginator
 */
class SegmentsController extends AppController {

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
		$this->Segment->recursive = 0;
		$this->set('segments', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->Segment->exists($id)) {
			throw new NotFoundException(__('Invalid segment'));
		}
		$options = array('conditions' => array('Segment.' . $this->Segment->primaryKey => $id));
		$this->set('segment', $this->Segment->find('first', $options));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Segment->create();
			$this->request->data['Segment']['user_id'] = $this->Auth->user('id');
			if ($this->Segment->save($this->request->data)) {
				$this->Session->setFlash(__('The segment has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The segment could not be saved. Please, try again.'), 'flash/error');
			}
		}
		if ($this->Session->read('Auth.User.Role.name') == 'admin') {
			$tutorials = $this->Segment->Tutorial->find('list');		
		} else {
			$tutorials = $this->Segment->Tutorial->find('list', array(
			'conditions' => array('Tutorial.user_id' => $this->Auth->user('id'))));			
		}
		$users = $this->Segment->User->find('list');
		$this->set(compact('tutorials', 'users'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->Segment->id = $id;
		if (!$this->Segment->exists($id)) {
			throw new NotFoundException(__('Invalid segment'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Segment->save($this->request->data)) {
				$this->Session->setFlash(__('The segment has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The segment could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('Segment.' . $this->Segment->primaryKey => $id));
			$this->request->data = $this->Segment->find('first', $options);
		}
		$tutorials = $this->Segment->Tutorial->find('list', array(
		'conditions' => array('Tutorial.user_id' => $this->Auth->user('id'))));
		$users = $this->Segment->User->find('list');
		$this->set(compact('tutorials', 'users'));
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
		$this->Segment->id = $id;
		if (!$this->Segment->exists()) {
			throw new NotFoundException(__('Invalid segment'));
		}
		if ($this->Segment->delete()) {
			$this->Session->setFlash(__('Segment deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('Segment was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
	
	public function isAuthorized($user) {
		if ($this->action === 'add' && $this->Session->read('Auth.User.active') === '1') {
			return true;
		}

		if (in_array($this->action, array('edit', 'delete'))) {
			$segmentId = (int) $this->request->params['pass'][0];
			if ($this->Segment->isOwnedBy($segmentId, $user['id'])) {
				return true;
			}
		}

		return parent::isAuthorized($user);
	}
}
