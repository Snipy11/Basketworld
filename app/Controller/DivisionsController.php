<?php
App::uses('AppController', 'Controller');
/**
 * Divisions Controller
 *
 * @property Division $Division
 */
class DivisionsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Division->recursive = 0;
		$this->set('divisions', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Division->id = $id;
		if (!$this->Division->exists()) {
			throw new NotFoundException(__('Invalid division'));
		}
		$this->set('division', $this->Division->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Division->create();
			if ($this->Division->save($this->request->data)) {
				$this->Session->setFlash(__('The division has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The division could not be saved. Please, try again.'));
			}
		}
		$countries = $this->Division->Country->find('list');
		$seasons = $this->Division->Season->find('list');
		$this->set(compact('countries', 'seasons'));
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Division->id = $id;
		if (!$this->Division->exists()) {
			throw new NotFoundException(__('Invalid division'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Division->save($this->request->data)) {
				$this->Session->setFlash(__('The division has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The division could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Division->read(null, $id);
		}
		$countries = $this->Division->Country->find('list');
		$seasons = $this->Division->Season->find('list');
		$this->set(compact('countries', 'seasons'));
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
		$this->Division->id = $id;
		if (!$this->Division->exists()) {
			throw new NotFoundException(__('Invalid division'));
		}
		if ($this->Division->delete()) {
			$this->Session->setFlash(__('Division deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Division was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
