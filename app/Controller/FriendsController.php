<?php
App::uses('AppController', 'Controller');
/**
 * Friends Controller
 *
 * @property Friend $Friend
 */
class FriendsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Friend->recursive = 0;
		$this->set('friends', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Friend->id = $id;
		if (!$this->Friend->exists()) {
			throw new NotFoundException(__('Invalid friend'));
		}
		$this->set('friend', $this->Friend->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Friend->create();
			if ($this->Friend->save($this->request->data)) {
				$this->Session->setFlash(__('The friend has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The friend could not be saved. Please, try again.'));
			}
		}
		$userFroms = $this->Friend->UserFrom->find('list');
		$userTos = $this->Friend->UserTo->find('list');
		$this->set(compact('userFroms', 'userTos'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Friend->id = $id;
		if (!$this->Friend->exists()) {
			throw new NotFoundException(__('Invalid friend'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Friend->save($this->request->data)) {
				$this->Session->setFlash(__('The friend has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The friend could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Friend->read(null, $id);
		}
		$userFroms = $this->Friend->UserFrom->find('list');
		$userTos = $this->Friend->UserTo->find('list');
		$this->set(compact('userFroms', 'userTos'));
	}

/**
 * delete method
 *
 * @param string $id
 * @return void
 */
	public function delete($id = null) {
		if (!$this->request->is('post')) {
			throw new MethodNotAllowedException();
		}
		$this->Friend->id = $id;
		if (!$this->Friend->exists()) {
			throw new NotFoundException(__('Invalid friend'));
		}
		if ($this->Friend->delete()) {
			$this->Session->setFlash(__('Friend deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Friend was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
