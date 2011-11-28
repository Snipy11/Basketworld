<?php
App::uses('AppController', 'Controller');
/**
 * Rumors Controller
 *
 * @property Rumor $Rumor
 */
class RumorsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Rumor->recursive = 0;
		$this->set('rumors', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Rumor->id = $id;
		if (!$this->Rumor->exists()) {
			throw new NotFoundException(__('Invalid rumor'));
		}
		$this->set('rumor', $this->Rumor->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Rumor->create();
			if ($this->Rumor->save($this->request->data)) {
				$this->Session->setFlash(__('The rumor has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rumor could not be saved. Please, try again.'));
			}
		}
		$divisions = $this->Rumor->Division->find('list');
		$users = $this->Rumor->User->find('list');
		$this->set(compact('divisions', 'users'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Rumor->id = $id;
		if (!$this->Rumor->exists()) {
			throw new NotFoundException(__('Invalid rumor'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Rumor->save($this->request->data)) {
				$this->Session->setFlash(__('The rumor has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The rumor could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Rumor->read(null, $id);
		}
		$divisions = $this->Rumor->Division->find('list');
		$users = $this->Rumor->User->find('list');
		$this->set(compact('divisions', 'users'));
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
		$this->Rumor->id = $id;
		if (!$this->Rumor->exists()) {
			throw new NotFoundException(__('Invalid rumor'));
		}
		if ($this->Rumor->delete()) {
			$this->Session->setFlash(__('Rumor deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Rumor was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
