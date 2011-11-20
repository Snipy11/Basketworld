<?php
App::uses('AppController', 'Controller');
/**
 * Seasons Controller
 *
 * @property Season $Season
 */
class SeasonsController extends AppController {


/**
 * index method
 *
 * @return void
 */
	public function index() {
		$this->Season->recursive = 0;
		$this->set('seasons', $this->paginate());
	}

/**
 * view method
 *
 * @param string $id
 * @return void
 */
	public function view($id = null) {
		$this->Season->id = $id;
		if (!$this->Season->exists()) {
			throw new NotFoundException(__('Invalid season'));
		}
		$this->set('season', $this->Season->read(null, $id));
	}

/**
 * add method
 *
 * @return void
 */
	public function add() {
		if ($this->request->is('post')) {
			$this->Season->create();
			if ($this->Season->save($this->request->data)) {
				$this->Session->setFlash(__('The season has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The season could not be saved. Please, try again.'));
			}
		}
	}

/**
 * edit method
 *
 * @param string $id
 * @return void
 */
	public function edit($id = null) {
		$this->Season->id = $id;
		if (!$this->Season->exists()) {
			throw new NotFoundException(__('Invalid season'));
		}
		if ($this->request->is('post') || $this->request->is('put')) {
			if ($this->Season->save($this->request->data)) {
				$this->Session->setFlash(__('The season has been saved'));
				$this->redirect(array('action' => 'index'));
			} else {
				$this->Session->setFlash(__('The season could not be saved. Please, try again.'));
			}
		} else {
			$this->request->data = $this->Season->read(null, $id);
		}
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
		$this->Season->id = $id;
		if (!$this->Season->exists()) {
			throw new NotFoundException(__('Invalid season'));
		}
		if ($this->Season->delete()) {
			$this->Session->setFlash(__('Season deleted'));
			$this->redirect(array('action'=>'index'));
		}
		$this->Session->setFlash(__('Season was not deleted'));
		$this->redirect(array('action' => 'index'));
	}
}
