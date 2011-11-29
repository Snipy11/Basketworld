<?php
App::uses('AppController', 'Controller');
/**
 * Vips Controller
 *
 * @property Vip $Vip
 */
class VipsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Vip->recursive = 0;
		$this->set('vips', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Vip->id = $id;
		if (!$this->Vip->exists()) {
			throw new NotFoundException(__('Invalid vip'));
		}
		$this->set('vip', $this->Vip->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Vip->create();
			if ($this->Vip->save($this->request->data)) {
				$this->Session->setFlash(__('The vip has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vip could not be saved. Please, try again.'));
			}
		}
		$users = $this->Vip->User->find('list');
		$this->set(compact('users'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Vip->id = $id;
		if (!$this->Vip->exists()) {
			throw new NotFoundException(__('Invalid vip'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Vip->save($this->request->data)) {
				$this->Session->setFlash(__('The vip has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The vip could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Vip->read(null, $id);
		}
		$users = $this->Vip->User->find('list');
		$this->set(compact('users'));
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
		$this->Vip->id = $id;
		if (!$this->Vip->exists()) {
			throw new NotFoundException(__('Invalid vip'));
		}
		if ($this->Vip->delete()) {
			$this->Session->setFlash(__('Vip deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Vip was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
