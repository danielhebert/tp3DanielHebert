<?php
App::uses('AppController', 'Controller');
/**
 * Users Controller
 *
 * @property User $User
 * @property PaginatorComponent $Paginator
 */
class UsersController extends AppController {

/**
 * Components
 *
 * @var array
 */
	//public $helpers = array('Html');
	public $components = array('Paginator');
	
	public function beforeFilter() {
		parent::beforeFilter();
		if (!$this->Session->check('Auth.User') || $this->Session->read('Auth.User.Role.name') == "admin") {
			$this->Auth->allow('add');
		}
		
		if ($this->action === 'login') {
			if ($this->Session->check('Auth.User')) {
				return $this->redirect($this->Auth->redirectUrl());
			}			
		}
		
		if ($this->Session->check('Auth.User')) {
			$this->Auth->allow('resendLink');
		}
		
		$this->Auth->allow('logout', 'activate');
	}

	public function login() {
		if ($this->request->is('post')) {
			if ($this->Auth->login()) {
				if ($this->Session->read('Auth.User.active') === '0') {
					$link = array('controller' => 'users', 'action' => 'resendLink');
					$this->Session->setFlash(__('Account not activated. You won\'t be able to submit anything other than times.'), 'resendLink', array("link" => $link, "urlMessage" => __('Resend confirmation e-mail')));
				} else {
					debug($this->Auth->User);
				}

				return $this->redirect($this->Auth->redirectUrl());
			} else {
                $this->Session->setFlash(__('Invalid username or password, try again'), 'flash/info');
            }
		}
	}

	public function logout() {
		return $this->redirect($this->Auth->logout());
	}

/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->User->recursive = 0;
		$this->set('users', $this->paginate());
	}

/**
 * view method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
		$this->set('user', $this->User->find('first', $options));
	}

	public function activate($token) {
		$token = explode('-', $token);		
		$user = $this->User->find('first', array('conditions' => array('User.id' => $token[0])));//, 'MD5(User.password)' => $token[1])));

		if (md5($user['User']['password']) === $token[1]) {
			if ($user['User']['active'] === '0') {
				$this->User->id = $user['User']['id'];
				$this->User->Role->id = $user['User']['role_id'];
				$this->User->saveField('active', 1);
				if ($this->Session->check('Auth.User')) {
					$this->Session->write('Auth.User.active', '1');
				}
				$this->Session->setFlash(__('Your account is now activated.'), 'flash/success');
			} else {
				$this->Session->setFlash(__('This account is already activated.'), 'flash/error');
			}
		} else {
			$this->Session->setFlash(__('This activation link is not valid.'), 'flash/error');	
		}
		
		$this->redirect('/');
	}
/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->User->create();
			if ($this->Session->read('Auth.User.Role.name') != 'admin') {
				$this->request->data['User']['role_id'] = 2;
			}
			if ($this->User->save($this->request->data)) {
				$d = $this->request->data;
				$user = $this->User->find('first', array('conditions' => array('User.username' => $d['User']['username'])));
                $token = $user['User']['password'];
				$id = $user['User']['id'];
				
                $this->send_mail($d['User']['email'], $d['User']['username'], $id, $token);
				$this->Session->setFlash(__('The user has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
			}
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
	}

/**
 * edit method
 *
 * @throws NotFoundException
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
        $this->User->id = $id;
		if (!$this->User->exists($id)) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->User->save($this->request->data)) {
				$this->Session->setFlash(__('The user has been saved'), 'flash/success');
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The user could not be saved. Please, try again.'), 'flash/error');
			}
		} else {
			$options = array('conditions' => array('User.' . $this->User->primaryKey => $id));
			$this->request->data = $this->User->find('first', $options);
		}
		$roles = $this->User->Role->find('list');
		$this->set(compact('roles'));
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
		$this->User->id = $id;
		if (!$this->User->exists()) {
			throw new NotFoundException(__('Invalid user'));
		}
		if ($this->User->delete()) {
			$this->Session->setFlash(__('User deleted'), 'flash/success');
			$this->redirect(array('action' => 'index'));
		}
		$this->Session->setFlash(__('User was not deleted'), 'flash/error');
		$this->redirect(array('action' => 'index'));
	}
	
    public function send_mail($receiver = null, $name = null, $id = null, $token = null) {
        //$link = "http://" . $_SERVER['HTTP_HOST'] . $this->webroot . "users/login/";
        $link = array('controller'=>'users', 'action'=>'activate', $id . '-' . md5($token));
        $message = 'Hi,' . $name;
        App::uses('CakeEmail', 'Network/Email');
        $email = new CakeEmail('gmail');
        $email->from('aut2014.267@gmail.com');
        $email->to($receiver);
        $email->subject('Mail Confirmation');
		$email->emailFormat('html');
		$email->template('signup');
		$email->viewVars(array('username'=>$name, 'link'=>$link));
        $email->send();
		//$this->Html->link("Activate my account", $link)
    }
	
	public function resendLink() {
		if ($this->Session->read('Auth.User.active') === '0') {
			$user = $this->User->find('first', array('conditions' => array('User.id' => $this->Session->read('Auth.User.id'))));
			$this->send_mail($user['User']['email'], $user['User']['username'], $user['User']['id'], $user['User']['password']);
			$this->Session->setFlash(__('Confirmation email was correctly sent.'), 'flash/success');
			$this->redirect(array('controller' => 'games', 'action' => 'index'));
		} else {
			$this->Session->setFlash(__('This account is already activated.'), 'flash/error');
			$this->redirect(array('controller' => 'games', 'action' => 'index'));
		}
	}
}
